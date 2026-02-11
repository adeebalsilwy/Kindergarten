<?php

namespace App\Services\Finance;

use App\Models\AccountingEntry;
use App\Models\Children;
use App\Models\Expense;
use App\Models\Payment;
use Carbon\Carbon;

class FinancialReportService
{
    public function getRevenueSummary($startDate = null, $endDate = null)
    {
        $query = Payment::where('status', 'completed');

        if ($startDate) {
            $query = $query->where('payment_date', '>=', $startDate);
        }

        if ($endDate) {
            $query = $query->where('payment_date', '<=', $endDate);
        }

        $payments = $query->get();

        $totalRevenue = $payments->sum('amount');
        $paymentMethods = $payments->groupBy('payment_method')->map->count();
        $dailyRevenue = $payments->groupBy(function ($item) {
            return $item->payment_date->format('Y-m-d');
        })->map->sum('amount');

        return [
            'total_revenue' => $totalRevenue,
            'payment_methods' => $paymentMethods,
            'daily_revenue' => $dailyRevenue,
            'total_transactions' => $payments->count(),
        ];
    }

    public function getExpenseSummary($startDate = null, $endDate = null)
    {
        $query = Expense::where('status', 'paid');

        if ($startDate) {
            $query = $query->where('expense_date', '>=', $startDate);
        }

        if ($endDate) {
            $query = $query->where('expense_date', '<=', $endDate);
        }

        $expenses = $query->get();

        $totalExpenses = $expenses->sum('amount');
        $expensesByCategory = $expenses->groupBy('category')->map->sum('amount');
        $dailyExpenses = $expenses->groupBy(function ($item) {
            return $item->expense_date->format('Y-m-d');
        })->map->sum('amount');

        return [
            'total_expenses' => $totalExpenses,
            'by_category' => $expensesByCategory,
            'daily_expenses' => $dailyExpenses,
            'total_expenses_count' => $expenses->count(),
        ];
    }

    public function getProfitLoss($startDate = null, $endDate = null)
    {
        $revenue = $this->getRevenueSummary($startDate, $endDate)['total_revenue'];
        $expenses = $this->getExpenseSummary($startDate, $endDate)['total_expenses'];

        $profit = $revenue - $expenses;

        return [
            'revenue' => $revenue,
            'expenses' => $expenses,
            'profit' => $profit,
            'profit_margin' => $revenue > 0 ? ($profit / $revenue) * 100 : 0,
        ];
    }

    public function getOutstandingBalances()
    {
        $children = Children::with('payments', 'parent')->get();

        $outstanding = [];
        $totalOutstanding = 0;

        foreach ($children as $child) {
            $totalFees = $child->fees_required;
            $totalPaid = $child->payments()->where('status', 'completed')->sum('amount');
            $balance = $totalFees - $totalPaid;

            if ($balance > 0) {
                $outstanding[] = [
                    'child_name' => $child->name,
                    'total_fees' => $totalFees,
                    'total_paid' => $totalPaid,
                    'balance' => $balance,
                    'parent_name' => optional($child->parent)->name ?? 'N/A',
                ];
                $totalOutstanding += $balance;
            }
        }

        return [
            'details' => $outstanding,
            'total_outstanding' => $totalOutstanding,
            'count' => count($outstanding),
        ];
    }

    public function getMonthlyReport($year = null, $month = null)
    {
        $year = $year ?: Carbon::now()->year;
        $month = $month ?: Carbon::now()->month;

        $startDate = Carbon::create($year, $month, 1)->startOfMonth();
        $endDate = Carbon::create($year, $month, 1)->endOfMonth();

        $revenue = $this->getRevenueSummary($startDate, $endDate);
        $expenses = $this->getExpenseSummary($startDate, $endDate);
        $profitLoss = $this->getProfitLoss($startDate, $endDate);

        return [
            'period' => [
                'year' => $year,
                'month' => $month,
                'formatted' => $startDate->format('F Y'),
            ],
            'revenue' => $revenue,
            'expenses' => $expenses,
            'profit_loss' => $profitLoss,
        ];
    }

    public function getAnnualReport($year = null)
    {
        $year = $year ?: Carbon::now()->year;

        $monthlyReports = [];
        $totalAnnualRevenue = 0;
        $totalAnnualExpenses = 0;

        for ($month = 1; $month <= 12; $month++) {
            $report = $this->getMonthlyReport($year, $month);
            $monthlyReports[] = $report;
            $totalAnnualRevenue += $report['revenue']['total_revenue'];
            $totalAnnualExpenses += $report['expenses']['total_expenses'];
        }

        return [
            'year' => $year,
            'monthly_reports' => $monthlyReports,
            'annual_totals' => [
                'revenue' => $totalAnnualRevenue,
                'expenses' => $totalAnnualExpenses,
                'profit' => $totalAnnualRevenue - $totalAnnualExpenses,
            ],
        ];
    }

    public function getCashFlow($startDate = null, $endDate = null)
    {
        $revenue = $this->getRevenueSummary($startDate, $endDate);
        $expenses = $this->getExpenseSummary($startDate, $endDate);

        $allDates = collect()
            ->merge($revenue['daily_revenue']->keys())
            ->merge($expenses['daily_expenses']->keys())
            ->unique()
            ->sort();

        $dailyCashFlow = collect($allDates)->mapWithKeys(function ($date) use ($revenue, $expenses) {
            $dailyRevenue = $revenue['daily_revenue'][$date] ?? 0;
            $dailyExpenses = $expenses['daily_expenses'][$date] ?? 0;
            $netCashFlow = $dailyRevenue - $dailyExpenses;

            return [$date => [
                'revenue' => $dailyRevenue,
                'expenses' => $dailyExpenses,
                'net_cash_flow' => $netCashFlow,
            ]];
        });

        return [
            'daily_cash_flow' => $dailyCashFlow,
            'total_net_cash_flow' => $revenue['total_revenue'] - $expenses['total_expenses'],
            'average_daily_cash_flow' => $dailyCashFlow->count() > 0
                ? $dailyCashFlow->avg('net_cash_flow')
                : 0,
        ];
    }

    public function getTrialBalance($startDate = null, $endDate = null)
    {
        $query = AccountingEntry::query();

        if ($startDate) {
            $query = $query->where('entry_date', '>=', $startDate);
        }

        if ($endDate) {
            $query = $query->where('entry_date', '<=', $endDate);
        }

        $entries = $query->get();

        $trialBalance = [];
        $accounts = $entries->groupBy('account_type');

        foreach ($accounts as $accountType => $accountEntries) {
            $debits = $accountEntries->sum('debit');
            $credits = $accountEntries->sum('credit');
            $balance = $debits - $credits;

            $trialBalance[] = [
                'account_name' => $accountType,
                'debits' => $debits,
                'credits' => $credits,
                'balance' => $balance,
                'type' => $balance >= 0 ? 'debit' : 'credit',
                'category' => $accountType,
                'entries_count' => $accountEntries->count(),
                'last_activity' => $accountEntries->sortByDesc('entry_date')->first()->entry_date ?? null,
            ];
        }

        usort($trialBalance, function ($a, $b) {
            if ($a['category'] !== $b['category']) {
                return strcmp($a['category'], $b['category']);
            }

            return strcmp($a['account_name'], $b['account_name']);
        });

        $totalDebits = array_sum(array_column($trialBalance, 'debits'));
        $totalCredits = array_sum(array_column($trialBalance, 'credits'));
        $totalBalance = $totalDebits - $totalCredits;

        return [
            'entries' => $trialBalance,
            'totals' => [
                'total_debits' => $totalDebits,
                'total_credits' => $totalCredits,
                'difference' => $totalBalance,
            ],
            'summary' => [
                'total_accounts' => count($trialBalance),
                'categories' => array_count_values(array_column($trialBalance, 'category')),
            ],
        ];
    }

    public function getGeneralLedger($accountName, $startDate = null, $endDate = null)
    {
        $query = AccountingEntry::where('account_type', $accountName);

        if ($startDate) {
            $query = $query->where('entry_date', '>=', $startDate);
        }

        if ($endDate) {
            $query = $query->where('entry_date', '<=', $endDate);
        }

        $entries = $query->orderBy('entry_date')->get();

        $runningBalance = 0;
        $ledgerEntries = [];

        foreach ($entries as $entry) {
            $runningBalance += ($entry->debit - $entry->credit);

            $ledgerEntries[] = [
                'date' => Carbon::parse($entry->entry_date),
                'description' => $entry->description,
                'debit' => $entry->debit,
                'credit' => $entry->credit,
                'balance' => $runningBalance,
            ];
        }

        return [
            'account_name' => $accountName,
            'entries' => $ledgerEntries,
            'final_balance' => $runningBalance,
        ];
    }
}
