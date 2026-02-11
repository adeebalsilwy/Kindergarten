<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use App\Services\Exports\FinancialExportService;
use App\Services\Finance\FinancialReportService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $financialReportService;

    protected $financialExportService;

    public function __construct(FinancialReportService $financialReportService, FinancialExportService $financialExportService)
    {
        $this->financialReportService = $financialReportService;
        $this->financialExportService = $financialExportService;
    }

    /**
     * Show the dashboard with key financial metrics
     */
    public function dashboard()
    {
        $currentMonth = $this->financialReportService->getMonthlyReport();
        $outstandingBalances = $this->financialReportService->getOutstandingBalances();

        $dashboardService = new DashboardService;
        $enhancedMetrics = $dashboardService->getGeneralMetrics();
        $attendanceStats = $dashboardService->getAttendanceStats();
        $financialStats = $dashboardService->getFinancialStats();
        $enrollmentStats = $dashboardService->getEnrollmentStats();
        $classStats = $dashboardService->getClassStats();
        $academicStats = $dashboardService->getAcademicStats();
        $teacherStats = $dashboardService->getTeacherStats();
        $recentActivities = $dashboardService->getRecentActivities();
        $chartData = $dashboardService->getChartData();

        return view('pages.finance.dashboard', compact(
            'currentMonth',
            'outstandingBalances',
            'enhancedMetrics',
            'attendanceStats',
            'financialStats',
            'enrollmentStats',
            'classStats',
            'academicStats',
            'teacherStats',
            'recentActivities',
            'chartData'
        ));
    }

    public function attendanceReport(Request $request)
    {
        $this->authorize('view_attendances');
        $month = $request->get('month', date('m'));
        $year = $request->get('year', date('Y'));
        $class_id = $request->get('class_id');

        $query = \App\Models\Attendance::with('child.class')
            ->whereMonth('date', $month)
            ->whereYear('date', $year);

        if ($class_id) {
            $query->whereHas('child', function ($q) use ($class_id) {
                $q->where('class_id', $class_id);
            });
        }

        $attendances = $query->get();
        $classes = \App\Models\Classes::all();

        $stats = [
            'present' => $attendances->where('status', 'present')->count(),
            'absent' => $attendances->where('status', 'absent')->count(),
            'late' => $attendances->where('status', 'late')->count(),
            'excused' => $attendances->where('status', 'excused')->count(),
        ];

        return view('pages.finance.reports.attendance', compact('attendances', 'classes', 'stats', 'month', 'year', 'class_id'));
    }

    /**
     * Show revenue report
     */
    public function revenue(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $revenueSummary = $this->financialReportService->getRevenueSummary($startDate, $endDate);

        return view('pages.finance.revenue', compact('revenueSummary', 'startDate', 'endDate'));
    }

    /**
     * Show expense report
     */
    public function expenses(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $expenseSummary = $this->financialReportService->getExpenseSummary($startDate, $endDate);

        return view('pages.finance.expenses', compact('expenseSummary', 'startDate', 'endDate'));
    }

    /**
     * Show profit/loss report
     */
    public function profitLoss(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $profitLoss = $this->financialReportService->getProfitLoss($startDate, $endDate);

        return view('pages.finance.profit-loss', compact('profitLoss', 'startDate', 'endDate'));
    }

    /**
     * Show outstanding balances report
     */
    public function outstandingBalances()
    {
        $outstandingBalances = $this->financialReportService->getOutstandingBalances();

        return view('pages.finance.outstanding-balances', compact('outstandingBalances'));
    }

    /**
     * Show monthly report
     */
    public function monthlyReport(Request $request)
    {
        $year = $request->input('year') ?: date('Y');
        $month = $request->input('month') ?: date('n');

        $monthlyReport = $this->financialReportService->getMonthlyReport($year, $month);

        return view('pages.finance.monthly', compact('monthlyReport', 'year', 'month'));
    }

    /**
     * Show annual report
     */
    public function annualReport(Request $request)
    {
        $year = $request->input('year') ?: date('Y');

        $annualReport = $this->financialReportService->getAnnualReport($year);

        return view('pages.finance.annual', compact('annualReport', 'year'));
    }

    /**
     * Show cash flow report
     */
    public function cashFlow(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $cashFlow = $this->financialReportService->getCashFlow($startDate, $endDate);

        return view('pages.finance.cash-flow', compact('cashFlow', 'startDate', 'endDate'));
    }

    /**
     * Export report to PDF
     */
    public function exportPdf(Request $request)
    {
        $reportType = $request->input('report_type');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        switch ($reportType) {
            case 'trial-balance':
                $trialBalance = $this->financialReportService->getTrialBalance($startDate, $endDate);

                return $this->financialExportService->exportTrialBalanceToPdf($trialBalance, $startDate, $endDate);

            case 'general-ledger':
                $accountName = $request->input('account_name');
                $generalLedger = $this->financialReportService->getGeneralLedger($accountName, $startDate, $endDate);

                return $this->financialExportService->exportGeneralLedgerToPdf($generalLedger, $startDate, $endDate);

            case 'profit-loss':
                $profitLoss = $this->financialReportService->getProfitLoss($startDate, $endDate);

                return $this->financialExportService->exportProfitLossToPdf($profitLoss, $startDate, $endDate);

            case 'monthly':
                $year = $request->input('year') ?: date('Y');
                $month = $request->input('month') ?: date('n');
                $report = $this->financialReportService->getMonthlyReport($year, $month);

                return $this->financialExportService->exportMonthlyToPdf($report, $year, $month);

            default:
                $profitLoss = $this->financialReportService->getProfitLoss($startDate, $endDate);

                return $this->financialExportService->exportProfitLossToPdf($profitLoss, $startDate, $endDate);

        }
    }

    /**
     * Show trial balance report
     */
    public function trialBalance(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $trialBalance = $this->financialReportService->getTrialBalance($startDate, $endDate);

        return view('pages.finance.trial-balance', compact('trialBalance', 'startDate', 'endDate'));
    }

    /**
     * Show general ledger report
     */
    public function generalLedger(Request $request)
    {
        $accountName = $request->input('account_name');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if ($accountName) {
            $generalLedger = $this->financialReportService->getGeneralLedger($accountName, $startDate, $endDate);
        } else {
            // If no specific account is selected, show a list of all accounts
            $generalLedger = null;
        }

        // Get list of all accounts for the dropdown
        $accounts = \App\Models\AccountingEntry::select('account_type')->distinct()->pluck('account_type');

        return view('pages.finance.general-ledger', compact('generalLedger', 'accounts', 'startDate', 'endDate', 'accountName'));
    }

    /**
     * Export report to Excel
     */
    public function exportExcel(Request $request)
    {
        $reportType = $request->input('report_type');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        switch ($reportType) {
            case 'trial-balance':
                $trialBalance = $this->financialReportService->getTrialBalance($startDate, $endDate);

                return $this->financialExportService->exportTrialBalanceToExcel($trialBalance, $startDate, $endDate);

            case 'general-ledger':
                $accountName = $request->input('account_name');
                $generalLedger = $this->financialReportService->getGeneralLedger($accountName, $startDate, $endDate);

                return $this->financialExportService->exportGeneralLedgerToExcel($generalLedger, $startDate, $endDate);

            case 'monthly':
                $year = $request->input('year') ?: date('Y');
                $month = $request->input('month') ?: date('n');
                $monthlyReport = $this->financialReportService->getMonthlyReport($year, $month);

                return $this->financialExportService->exportMonthlyToExcel($monthlyReport, $year, $month);

            case 'profit-loss':
                $profitLoss = $this->financialReportService->getProfitLoss($startDate, $endDate);

                return $this->financialExportService->exportProfitLossToExcel($profitLoss, $startDate, $endDate);

            default:
                $profitLoss = $this->financialReportService->getProfitLoss($startDate, $endDate);

                return $this->financialExportService->exportProfitLossToExcel($profitLoss, $startDate, $endDate);

        }
    }
}
