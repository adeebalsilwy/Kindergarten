<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Services\PaymentService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PaymentController extends Controller
{
    protected $service;

    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    public function __construct(PaymentService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $this->authorize('view_payments');
        $query = $this->service->query()->with(['child', 'fee']);

        if (method_exists($query->getModel(), 'scopeFilter')) {
            $query->filter($request);
        }

        // Handle export functionality
        if ($request->has('export')) {
            return $this->export($request->get('export'), $query);
        }

        $payments = $query->paginate(15)->withQueryString();

        return view('pages.payments.index', compact('payments'));
    }

    /**
     * Export data to different formats
     */
    protected function export($format, $query)
    {
        $this->authorize('export_payments');
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
        $pdf = Pdf::loadView('pages.payments.export-pdf', ['data' => $data]);

        return $pdf->download('Payment_export_'.date('Y-m-d_H-i-s').'.pdf');
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
        $sheet->setTitle(__('payments.title'));
        $sheet->setCellValue('A1', __('payments.title'));
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Prepare headers
        $headers = [];
        if ($data->count() > 0) {
            $firstItem = $data->first();
            foreach ($firstItem->getAttributes() as $key => $value) {
                if (! in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                    $headers[] = __('payments.fields.'.$key);
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
        $fileName = 'Payment_export_'.date('Y-m-d_H-i-s').'.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }

    public function create()
    {
        $this->authorize('create_payments');

        $payment = new \App\Models\Payment();
        $children = \App\Models\Children::select('id', 'name')->orderBy('name')->get();
        $fees = \App\Models\Fee::select('id', 'name')->orderBy('name')->get();

        return view('pages.payments.create', compact('payment', 'children', 'fees'));
    }

    public function store(StorePaymentRequest $request)
    {
        $this->authorize('create_payments');
        $this->service->create($request->validated());

        return redirect()->route('payments.index')->with('success', __('payments.messages.created'));
    }

    public function show($id)
    {
        $this->authorize('view_payments');
        $payment = $this->service->find($id);

        return view('pages.payments.show', compact('payment'));
    }

    public function edit($id)
    {
        $this->authorize('edit_payments');
        $payment = $this->service->find($id);
        $children = \App\Models\Children::select('id', 'name')->orderBy('name')->get();
        $fees = \App\Models\Fee::select('id', 'name')->orderBy('name')->get();

        return view('pages.payments.edit', compact('payment', 'children', 'fees'));
    }

    public function update(UpdatePaymentRequest $request, $id)
    {
        $this->authorize('edit_payments');
        $this->service->update($id, $request->validated());

        return redirect()->route('payments.index')->with('success', __('payments.messages.updated'));
    }

    public function destroy($id)
    {
        $this->authorize('delete_payments');
        $this->service->delete($id);

        return redirect()->route('payments.index')->with('success', __('payments.messages.deleted'));
    }
}
