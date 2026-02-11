<?php

namespace App\Services\Exports;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class FinancialExportService
{
    /**
     * Export trial balance to PDF
     */
    public function exportTrialBalanceToPdf($trialBalance, $startDate = null, $endDate = null)
    {
        $data = [
            'trialBalance' => $trialBalance,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'companyName' => config('app.name'),
            'reportDate' => now()->format('Y-m-d'),
            'locale' => App::getLocale(),
        ];

        $pdf = Pdf::loadView('pages.finance.exports.trial-balance-pdf', $data)
            ->setPaper('a4', 'landscape')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'sans-serif',
            ]);

        $filename = 'trial-balance-'.date('Y-m-d-H-i-s').'.pdf';

        return $pdf->download($filename);
    }

    /**
     * Export general ledger to PDF
     */
    public function exportGeneralLedgerToPdf($generalLedger, $startDate = null, $endDate = null)
    {
        $data = [
            'generalLedger' => $generalLedger,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'companyName' => config('app.name'),
            'reportDate' => now()->format('Y-m-d'),
            'locale' => App::getLocale(),
        ];

        $pdf = Pdf::loadView('pages.finance.exports.general-ledger-pdf', $data)
            ->setPaper('a4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'sans-serif',
            ]);

        $filename = 'general-ledger-'.date('Y-m-d-H-i-s').'.pdf';

        return $pdf->download($filename);
    }

    /**
     * Export trial balance to Excel
     */
    public function exportTrialBalanceToExcel($trialBalance, $startDate = null, $endDate = null)
    {
        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();

        // Set document properties
        $spreadsheet->getProperties()
            ->setCreator(config('app.name'))
            ->setTitle(__('global.trial_balance'))
            ->setDescription(__('global.trial_balance_report'));

        // Set RTL if Arabic locale
        $isRtl = App::getLocale() === 'ar';
        if ($isRtl) {
            $sheet->setRightToLeft(true);
        }

        // Title row
        $sheet->setCellValue('A1', __('global.company_name'))
            ->setCellValue('A2', __('global.report_title').': '.__('global.trial_balance'))
            ->setCellValue('A3', __('global.report_date').': '.now()->format('Y-m-d'))
            ->setCellValue('A4', __('global.period').': '.($startDate ?? __('global.from_beginning')).' - '.($endDate ?? __('global.to_now')));

        // Add some styling to title rows
        $sheet->getStyle('A1:A4')->getFont()->setBold(true);

        // Add spacing
        $row = 6;

        // Headers
        $headers = [
            __('global.account_name'),
            __('global.debits'),
            __('global.credits'),
            __('global.balance'),
            __('global.type'),
        ];

        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col.$row, $header);
            $sheet->getStyle($col.$row)->getFont()->setBold(true);
            $sheet->getStyle($col.$row)->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()->setRGB('E2E8F0');

            if ($col === 'A') {
                $sheet->getColumnDimension($col)->setWidth(30);
            } else {
                $sheet->getColumnDimension($col)->setWidth(15);
            }

            $col++;
        }

        $row++;

        // Data rows
        foreach ($trialBalance['entries'] as $entry) {
            $col = 'A';
            $sheet->setCellValue($col++.$row, $entry['account_name']);
            $sheet->setCellValue($col++.$row, $entry['debits']);
            $sheet->setCellValue($col++.$row, $entry['credits']);
            $sheet->setCellValue($col++.$row, $entry['balance']);
            $sheet->setCellValue($col.$row, __('global.'.$entry['type']));

            // Style the row
            $sheet->getStyle('A'.$row.':'.$col.$row)->getBorders()->getAllBorders()
                ->setBorderStyle(Border::BORDER_THIN);

            $row++;
        }

        // Totals row
        $sheet->setCellValue('A'.$row, __('global.total'));
        $sheet->setCellValue('B'.$row, $trialBalance['totals']['total_debits']);
        $sheet->setCellValue('C'.$row, $trialBalance['totals']['total_credits']);
        $sheet->setCellValue('D'.$row, $trialBalance['totals']['difference']);

        $sheet->getStyle('A'.$row.':'.$col.$row)->getFont()->setBold(true);
        $sheet->getStyle('A'.$row.':'.$col.$row)->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()->setRGB('F0F9FF');

        // Set alignment
        $lastRow = $row;
        $sheet->getStyle('B6:'.$col.$lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyle('A6:A'.$lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

        // Page setup
        $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageMargins()->setTop(0.75);
        $sheet->getPageMargins()->setRight(0.7);
        $sheet->getPageMargins()->setLeft(0.7);
        $sheet->getPageMargins()->setBottom(0.75);

        // Create writer and save to stream
        $writer = new Xlsx($spreadsheet);
        $filename = 'trial-balance-'.date('Y-m-d-H-i-s').'.xlsx';

        ob_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    /**
     * Export general ledger to Excel
     */
    public function exportGeneralLedgerToExcel($generalLedger, $startDate = null, $endDate = null)
    {
        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();

        // Set document properties
        $spreadsheet->getProperties()
            ->setCreator(config('app.name'))
            ->setTitle(__('global.general_ledger').' - '.$generalLedger['account_name'])
            ->setDescription(__('global.general_ledger_report_for').' '.$generalLedger['account_name']);

        // Set RTL if Arabic locale
        $isRtl = App::getLocale() === 'ar';
        if ($isRtl) {
            $sheet->setRightToLeft(true);
        }

        // Title row
        $sheet->setCellValue('A1', __('global.company_name'))
            ->setCellValue('A2', __('global.report_title').': '.__('global.general_ledger'))
            ->setCellValue('A3', __('global.account_name').': '.$generalLedger['account_name'])
            ->setCellValue('A4', __('global.report_date').': '.now()->format('Y-m-d'))
            ->setCellValue('A5', __('global.period').': '.($startDate ?? __('global.from_beginning')).' - '.($endDate ?? __('global.to_now')));

        // Add some styling to title rows
        $sheet->getStyle('A1:A5')->getFont()->setBold(true);

        // Add spacing
        $row = 7;

        // Headers
        $headers = [
            __('global.date'),
            __('global.description'),
            __('global.debit'),
            __('global.credit'),
            __('global.balance'),
        ];

        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col.$row, $header);
            $sheet->getStyle($col.$row)->getFont()->setBold(true);
            $sheet->getStyle($col.$row)->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()->setRGB('E2E8F0');

            if ($col === 'B') {
                $sheet->getColumnDimension($col)->setWidth(30);
            } elseif ($col === 'A') {
                $sheet->getColumnDimension($col)->setWidth(12);
            } else {
                $sheet->getColumnDimension($col)->setWidth(15);
            }

            $col++;
        }

        $row++;

        // Data rows
        foreach ($generalLedger['entries'] as $entry) {
            $col = 'A';
            $sheet->setCellValue($col++.$row, $entry['date']->format('Y-m-d'));
            $sheet->setCellValue($col++.$row, $entry['description']);
            $sheet->setCellValue($col++.$row, $entry['debit']);
            $sheet->setCellValue($col++.$row, $entry['credit']);
            $sheet->setCellValue($col.$row, $entry['balance']);

            // Style the row
            $sheet->getStyle('A'.$row.':'.$col.$row)->getBorders()->getAllBorders()
                ->setBorderStyle(Border::BORDER_THIN);

            $row++;
        }

        // Final balance row
        $sheet->setCellValue('A'.$row, __('global.total'));
        $totalDebits = array_sum(array_column($generalLedger['entries'], 'debit'));
        $totalCredits = array_sum(array_column($generalLedger['entries'], 'credit'));
        $sheet->setCellValue('C'.$row, $totalDebits);
        $sheet->setCellValue('D'.$row, $totalCredits);
        $sheet->setCellValue('E'.$row, $generalLedger['final_balance']);

        $sheet->getStyle('A'.$row.':'.$col.$row)->getFont()->setBold(true);
        $sheet->getStyle('A'.$row.':'.$col.$row)->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()->setRGB('F0F9FF');

        // Set alignment
        $lastRow = $row;
        $sheet->getStyle('C7:'.$col.$lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyle('A7:B'.$lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

        // Page setup
        $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_PORTRAIT);
        $sheet->getPageMargins()->setTop(0.75);
        $sheet->getPageMargins()->setRight(0.7);
        $sheet->getPageMargins()->setLeft(0.7);
        $sheet->getPageMargins()->setBottom(0.75);

        // Create writer and save to stream
        $writer = new Xlsx($spreadsheet);
        $filename = 'general-ledger-'.$generalLedger['account_name'].'-'.date('Y-m-d-H-i-s').'.xlsx';

        ob_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    /**
     * Export profit/loss to PDF
     */
    public function exportProfitLossToPdf($profitLoss, $startDate = null, $endDate = null)
    {
        $data = [
            'profitLoss' => $profitLoss,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'companyName' => config('app.name'),
            'reportDate' => now()->format('Y-m-d'),
            'locale' => App::getLocale(),
        ];

        $pdf = Pdf::loadView('pages.finance.exports.profit-loss-pdf', $data)
            ->setPaper('a4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'sans-serif',
            ]);

        $filename = 'profit-loss-'.date('Y-m-d-H-i-s').'.pdf';

        return $pdf->download($filename);
    }

    /**
     * Export profit/loss to Excel
     */
    public function exportProfitLossToExcel($profitLoss, $startDate = null, $endDate = null)
    {
        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();

        // Set document properties
        $spreadsheet->getProperties()
            ->setCreator(config('app.name'))
            ->setTitle(__('global.profit_loss_statement'))
            ->setDescription(__('global.profit_loss_statement_description'));

        // Set RTL if Arabic locale
        $isRtl = App::getLocale() === 'ar';
        if ($isRtl) {
            $sheet->setRightToLeft(true);
        }

        // Title row
        $sheet->setCellValue('A1', __('global.company_name'))
            ->setCellValue('A2', __('global.report_title').': '.__('global.profit_loss_statement'))
            ->setCellValue('A3', __('global.report_date').': '.now()->format('Y-m-d'))
            ->setCellValue('A4', __('global.period').': '.($startDate ?? __('global.from_beginning')).' - '.($endDate ?? __('global.to_now')));

        // Add some styling to title rows
        $sheet->getStyle('A1:A4')->getFont()->setBold(true);

        // Add spacing
        $row = 6;

        // Revenue section
        $sheet->setCellValue('A'.$row, __('global.revenue'))->getStyle('A'.$row)->getFont()->setBold(true);
        $row++;
        $sheet->setCellValue('A'.$row, __('global.total_revenue'))->getStyle('A'.$row)->getAlignment()->setIndent(1);
        $sheet->setCellValue('B'.$row, $profitLoss['revenue']);
        $row++;

        // Expenses section
        $sheet->setCellValue('A'.$row, __('global.expenses'))->getStyle('A'.$row)->getFont()->setBold(true);
        $row++;
        $sheet->setCellValue('A'.$row, __('global.total_expenses'))->getStyle('A'.$row)->getAlignment()->setIndent(1);
        $sheet->setCellValue('B'.$row, $profitLoss['expenses']);
        $row++;

        // Profit/Loss
        $sheet->setCellValue('A'.$row, __('global.profit_loss'))->getStyle('A'.$row)->getFont()->setBold(true);
        $sheet->setCellValue('B'.$row, $profitLoss['profit']);
        $sheet->getStyle('A'.$row.':B'.$row)->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()->setRGB($profitLoss['profit'] >= 0 ? 'F0F9FF' : 'FEF2F2');

        // Page setup
        $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_PORTRAIT);
        $sheet->getPageMargins()->setTop(0.75);
        $sheet->getPageMargins()->setRight(0.7);
        $sheet->getPageMargins()->setLeft(0.7);
        $sheet->getPageMargins()->setBottom(0.75);

        // Create writer and save to stream
        $writer = new Xlsx($spreadsheet);
        $filename = 'profit-loss-'.date('Y-m-d-H-i-s').'.xlsx';

        ob_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    public function exportMonthlyToExcel($monthlyReport, $year = null, $month = null)
    {
        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();

        $spreadsheet->getProperties()
            ->setCreator(config('app.name'))
            ->setTitle(__('global.monthly_report'))
            ->setDescription(__('global.report_title').': '.__('global.monthly_report'));

        $isRtl = App::getLocale() === 'ar';
        if ($isRtl) {
            $sheet->setRightToLeft(true);
        }

        $sheet->setCellValue('A1', __('global.company_name'))
            ->setCellValue('A2', __('global.report_title').': '.__('global.monthly_report'))
            ->setCellValue('A3', __('global.report_date').': '.now()->format('Y-m-d'))
            ->setCellValue('A4', __('global.period').': '.($monthlyReport['period']['formatted'] ?? ($year.'-'.$month)));

        $sheet->getStyle('A1:A4')->getFont()->setBold(true);

        $row = 6;

        $sheet->setCellValue('A'.$row, __('global.revenue'))->getStyle('A'.$row)->getFont()->setBold(true);
        $sheet->setCellValue('B'.$row, $monthlyReport['revenue']['total_revenue'] ?? 0);
        $row++;

        $sheet->setCellValue('A'.$row, __('global.expenses'))->getStyle('A'.$row)->getFont()->setBold(true);
        $sheet->setCellValue('B'.$row, $monthlyReport['expenses']['total_expenses'] ?? 0);
        $row++;

        $sheet->setCellValue('A'.$row, __('global.profit_loss'))->getStyle('A'.$row)->getFont()->setBold(true);
        $sheet->setCellValue('B'.$row, $monthlyReport['profit_loss']['profit'] ?? 0);
        $row++;

        $sheet->setCellValue('A'.$row, __('global.profit_margin'))->getStyle('A'.$row)->getFont()->setBold(true);
        $sheet->setCellValue('B'.$row, $monthlyReport['profit_loss']['profit_margin'] ?? 0);
        $row += 2;

        $sheet->setCellValue('A'.$row, __('global.total_revenue'));
        $sheet->setCellValue('B'.$row, $monthlyReport['revenue']['total_revenue'] ?? 0);
        $row++;
        $sheet->setCellValue('A'.$row, __('global.total_transactions'));
        $sheet->setCellValue('B'.$row, $monthlyReport['revenue']['total_transactions'] ?? 0);
        $row++;
        $sheet->setCellValue('A'.$row, __('global.average_transaction'));
        $avgTxn = 0;
        if (($monthlyReport['revenue']['total_transactions'] ?? 0) > 0) {
            $avgTxn = ($monthlyReport['revenue']['total_revenue'] ?? 0) / ($monthlyReport['revenue']['total_transactions'] ?? 1);
        }
        $sheet->setCellValue('B'.$row, $avgTxn);
        $row += 2;

        $sheet->setCellValue('A'.$row, __('global.total_expenses'));
        $sheet->setCellValue('B'.$row, $monthlyReport['expenses']['total_expenses'] ?? 0);
        $row++;
        $sheet->setCellValue('A'.$row, __('global.total_expenses_count'));
        $sheet->setCellValue('B'.$row, $monthlyReport['expenses']['total_expenses_count'] ?? 0);
        $row++;
        $sheet->setCellValue('A'.$row, __('global.average_expense'));
        $avgExp = 0;
        if (($monthlyReport['expenses']['total_expenses_count'] ?? 0) > 0) {
            $avgExp = ($monthlyReport['expenses']['total_expenses'] ?? 0) / ($monthlyReport['expenses']['total_expenses_count'] ?? 1);
        }
        $sheet->setCellValue('B'.$row, $avgExp);

        foreach (range('A', 'B') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_PORTRAIT);
        $sheet->getPageMargins()->setTop(0.75);
        $sheet->getPageMargins()->setRight(0.7);
        $sheet->getPageMargins()->setLeft(0.7);
        $sheet->getPageMargins()->setBottom(0.75);

        $writer = new Xlsx($spreadsheet);
        $filename = 'monthly-report-'.date('Y-m-d-H-i-s').'.xlsx';

        ob_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    public function exportMonthlyToPdf($report, $year = null, $month = null)
    {
        $data = [
            'report' => $report,
            'year' => $year,
            'month' => $month,
            'companyName' => config('app.name'),
            'reportDate' => now()->format('Y-m-d'),
            'locale' => App::getLocale(),
        ];

        $pdf = Pdf::loadView('pages.finance.exports.monthly-pdf', $data)
            ->setPaper('a4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'sans-serif',
            ]);

        $filename = 'monthly-'.date('Y-m-d-H-i-s').'.pdf';

        return $pdf->download($filename);
    }
}
