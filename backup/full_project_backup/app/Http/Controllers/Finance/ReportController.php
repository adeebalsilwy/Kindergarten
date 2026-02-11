<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Services\Exports\FinancialExportService;
use App\Services\Finance\FinancialReportService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

        $stats = [
            'total_students' => \App\Models\Children::count(),
            'total_teachers' => \App\Models\Teacher::count(),
            'total_classes' => \App\Models\Classes::count(),
            'recent_attendance' => \App\Models\Attendance::with('child.class')->latest()->limit(5)->get(),
        ];

        return view('pages.finance.dashboard', compact('currentMonth', 'outstandingBalances', 'stats'));
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

        // This would typically use a PDF library like barryvdh/laravel-dompdf
        // For now, we'll return a view that can be converted to PDF

        switch ($reportType) {
            case 'profit-loss':
                $report = $this->financialReportService->getProfitLoss($startDate, $endDate);
                $view = 'pages.finance.exports.profit-loss-pdf';
                break;
            case 'monthly':
                $year = $request->input('year') ?: date('Y');
                $month = $request->input('month') ?: date('n');
                $report = $this->financialReportService->getMonthlyReport($year, $month);
                $view = 'pages.finance.exports.monthly-pdf';
                break;
            case 'trial-balance':
                $report = $this->financialReportService->getTrialBalance($startDate, $endDate);
                $view = 'pages.finance.exports.trial-balance-pdf';
                break;
            case 'general-ledger':
                $accountName = $request->input('account_name');
                $report = $this->financialReportService->getGeneralLedger($accountName, $startDate, $endDate);
                $view = 'pages.finance.exports.general-ledger-pdf';
                break;
            default:
                $report = $this->financialReportService->getProfitLoss($startDate, $endDate);
                $view = 'pages.finance.exports.profit-loss-pdf';
        }

        $data = [
            'report' => $report,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ];

        // Return view for PDF generation
        $pdf = Pdf::loadView($view, $data);

        return $pdf->download($reportType.'_'.date('Y-m-d').'.pdf');
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

        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();

        // Set Right-to-Left for Arabic support if the app locale is Arabic
        if (App::getLocale() == 'ar') {
            $sheet->setRightToLeft(true);
        }

        switch ($reportType) {
            case 'trial-balance':
                $trialBalance = $this->financialReportService->getTrialBalance($startDate, $endDate);

                $sheet->setTitle(__('global.trial_balance'));
                $sheet->setCellValue('A1', __('global.trial_balance'));
                $sheet->mergeCells('A1:E1');
                $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
                $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $headers = [__('global.account_name'), __('global.debits'), __('global.credits'), __('global.balance'), __('global.type')];
                $sheet->fromArray($headers, null, 'A3');
                $sheet->getStyle('A3:E3')->getFont()->setBold(true)->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFEEEEEE');

                $row = 4;
                foreach ($trialBalance['entries'] as $entry) {
                    $sheet->setCellValue('A'.$row, $entry['account_name']);
                    $sheet->setCellValue('B'.$row, $entry['debits']);
                    $sheet->setCellValue('C'.$row, $entry['credits']);
                    $sheet->setCellValue('D'.$row, $entry['balance']);
                    $sheet->setCellValue('E'.$row, __('global.'.$entry['type'])); // Translate type
                    $row++;
                }

                // Totals
                $sheet->setCellValue('A'.$row, __('global.total'));
                $sheet->setCellValue('B'.$row, $trialBalance['totals']['total_debits']);
                $sheet->setCellValue('C'.$row, $trialBalance['totals']['total_credits']);
                $sheet->setCellValue('D'.$row, $trialBalance['totals']['difference']);
                $sheet->getStyle('A'.$row.':E'.$row)->getFont()->setBold(true)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                break;

            case 'general-ledger':
                $accountName = $request->input('account_name');
                if ($accountName) {
                    $generalLedger = $this->financialReportService->getGeneralLedger($accountName, $startDate, $endDate);

                    $sheet->setTitle(__('global.general_ledger'));
                    $sheet->setCellValue('A1', __('global.general_ledger').' - '.$generalLedger['account_name']);
                    $sheet->mergeCells('A1:E1');
                    $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
                    $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                    $headers = [__('global.date'), __('global.description'), __('global.debit'), __('global.credit'), __('global.balance')];
                    $sheet->fromArray($headers, null, 'A3');
                    $sheet->getStyle('A3:E3')->getFont()->setBold(true)->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFEEEEEE');

                    $row = 4;
                    foreach ($generalLedger['entries'] as $entry) {
                        $sheet->setCellValue('A'.$row, $entry['date']->format('Y-m-d'));
                        $sheet->setCellValue('B'.$row, $entry['description']);
                        $sheet->setCellValue('C'.$row, $entry['debit']);
                        $sheet->setCellValue('D'.$row, $entry['credit']);
                        $sheet->setCellValue('E'.$row, $entry['balance']);
                        $row++;
                    }

                    $sheet->setCellValue('A'.$row, __('global.final_balance'));
                    $sheet->setCellValue('E'.$row, $generalLedger['final_balance']);
                    $sheet->getStyle('A'.$row.':E'.$row)->getFont()->setBold(true)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                } else {
                    $sheet->setCellValue('A1', __('global.select_account'));
                }
                break;

            default:
                $sheet->setCellValue('A1', 'Report Type: '.$reportType);
                // Basic dump for other types
                $row = 3;
                if ($reportType == 'profit-loss') {
                    $report = $this->financialReportService->getProfitLoss($startDate, $endDate);
                    $sheet->setCellValue('A'.$row, __('global.revenue'));
                    $sheet->setCellValue('B'.$row, $report['revenue']);
                    $row++;
                    $sheet->setCellValue('A'.$row, __('global.expenses'));
                    $sheet->setCellValue('B'.$row, $report['expenses']);
                    $row++;
                    $sheet->setCellValue('A'.$row, __('global.profit'));
                    $sheet->setCellValue('B'.$row, $report['profit']);
                    $row++;
                }
        }

        // Auto size columns
        foreach (range('A', 'E') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = $reportType.'_'.date('Y-m-d_H-i-s').'.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }
}
