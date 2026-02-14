<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeeRequest;
use App\Http\Requests\UpdateFeeRequest;
use App\Services\FeeService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class FeeController extends Controller
{
    protected $service;
    protected $dashboardService;

    public function __construct(FeeService $service, \App\Services\DashboardService $dashboardService)
    {
        $this->service = $service;
        $this->dashboardService = $dashboardService;
    }

    public function index(Request $request)
    {
        $this->authorize('view_fees');
        $query = $this->service->query()->with(['payments']);

        if (method_exists($query->getModel(), 'scopeFilter')) {
            $query->filter($request);
        }

        // Handle export functionality
        if ($request->has('export')) {
            return $this->export($request->get('export'), $query);
        }

        $fees = $query->paginate(15)->withQueryString();
        $stats = $this->dashboardService->getFinancialStats();

        return view('pages.fees.index', compact('fees', 'stats'));
    }

    /**
     * Export data to different formats
     */
    protected function export($format, $query)
    {
        $this->authorize('export_fees');
        $data = $query->get();

        switch ($format) {
            case 'pdf':
                return $this->exportToPdf($data);
            case 'excel':
                return $this->exportToExcel($data);
            default:
                return redirect()->back()->with('error', 'Unsupported export format');
        }
    }

    /**
     * Export to PDF
     */
    protected function exportToPdf($data)
    {
        $pdf = Pdf::loadView('pages.fees.export-pdf', ['data' => $data]);

        return $pdf->download('Fee_export_'.date('Y-m-d_H-i-s').'.pdf');
    }

    /**
     * Export to Excel
     */
    protected function exportToExcel($data)
    {
        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();

        // Set Right-to-Left for Arabic support if the app locale is Arabic
        if (App::getLocale() == 'ar') {
            $sheet->setRightToLeft(true);
        }

        // Set the title
        $sheet->setTitle(__('fees.title'));
        $sheet->setCellValue('A1', __('fees.title'));
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Prepare headers
        $headers = [];
        if ($data->count() > 0) {
            $firstItem = $data->first();
            foreach ($firstItem->getAttributes() as $key => $value) {
                if (! in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                    $headers[] = __('fees.fields.'.$key);
                }
            }
        }

        // Add headers to sheet
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col.'3', $header);
            $col++;
        }

        // Style header row
        $headerRange = 'A3:'.chr(ord('A') + count($headers) - 1).'3';
        $sheet->getStyle($headerRange)->getFont()->setBold(true)
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFEEEEEE');

        // Add data rows
        $row = 4;
        foreach ($data as $item) {
            $col = 'A';
            foreach ($item->getAttributes() as $key => $value) {
                if (! in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                    if (is_a($value, 'Carbon\Carbon')) {
                        $sheet->setCellValue($col.$row, $value->format('Y-m-d H:i:s'));
                    } else {
                        $sheet->setCellValue($col.$row, $value);
                    }
                    $col++;
                }
            }
            $row++;
        }

        // Auto size columns
        foreach (range('A', 'Z') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Fee_export_'.date('Y-m-d_H-i-s').'.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }

    public function create()
    {
        $this->authorize('create_fees');
        $fee = new \App\Models\Fee();

        return view('pages.fees.create', compact('fee'));
    }

    public function store(StoreFeeRequest $request)
    {
        $this->authorize('create_fees');
        $this->service->create($request->validated());

        return redirect()->route('fees.index')->with('success', __('fees.messages.created'));
    }

    public function show($id)
    {
        $this->authorize('view_fees');
        $fee = $this->service->find($id);

        return view('pages.fees.show', compact('fee'));
    }

    public function edit($id)
    {
        $this->authorize('edit_fees');
        $fee = $this->service->find($id);

        return view('pages.fees.edit', compact('fee'));
    }

    public function update(UpdateFeeRequest $request, $id)
    {
        $this->authorize('edit_fees');
        $this->service->update($id, $request->validated());

        return redirect()->route('fees.index')->with('success', __('fees.messages.updated'));
    }

    public function destroy($id)
    {
        $this->authorize('delete_fees');
        $this->service->delete($id);

        return redirect()->route('fees.index')->with('success', __('fees.messages.deleted'));
    }
}
