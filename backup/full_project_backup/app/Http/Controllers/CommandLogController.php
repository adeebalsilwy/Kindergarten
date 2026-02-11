<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommandLogRequest;
use App\Http\Requests\UpdateCommandLogRequest;
use App\Services\CommandLogService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CommandLogController extends Controller
{
    protected $service;

    public function __construct(CommandLogService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $this->authorize('view_command_logs');
        $query = $this->service->query();

        // Handle export functionality
        if ($request->has('export')) {
            return $this->export($request->get('export'), $query);
        }

        $commandLogs = $query->paginate(15);

        return view('pages.command_logs.index', compact('commandLogs'));
    }

    /**
     * Export data to different formats
     */
    protected function export($format, $query)
    {
        $this->authorize('export_command_logs');
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
        $pdf = Pdf::loadView('pages.command_logs.export-pdf', ['data' => $data]);

        return $pdf->download('CommandLog_export_'.date('Y-m-d_H-i-s').'.pdf');
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
        $sheet->setTitle(__('command_logs.title'));
        $sheet->setCellValue('A1', __('command_logs.title'));
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Prepare headers
        $headers = [];
        if ($data->count() > 0) {
            $firstItem = $data->first();
            foreach ($firstItem->getAttributes() as $key => $value) {
                if (! in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                    $headers[] = __('command_logs.fields.'.$key);
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
        $fileName = 'CommandLog_export_'.date('Y-m-d_H-i-s').'.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }

    public function create()
    {
        $this->authorize('create_command_logs');

        return view('pages.command_logs.create', get_defined_vars());
    }

    public function store(StoreCommandLogRequest $request)
    {
        $this->authorize('create_command_logs');
        $this->service->create($request->validated());

        return redirect()->route('command_logs.index')->with('success', __('command_logs.messages.created'));
    }

    public function show($id)
    {
        $this->authorize('view_command_logs');
        $commandLogs = $this->service->find($id);

        return view('pages.command_logs.show', compact('commandLogs'));
    }

    public function edit($id)
    {
        $this->authorize('edit_command_logs');
        $commandLogs = $this->service->find($id);

        return view('pages.command_logs.edit', get_defined_vars());
    }

    public function update(UpdateCommandLogRequest $request, $id)
    {
        $this->authorize('edit_command_logs');
        $this->service->update($id, $request->validated());

        return redirect()->route('command_logs.index')->with('success', __('command_logs.messages.updated'));
    }

    public function destroy($id)
    {
        $this->authorize('delete_command_logs');
        $this->service->delete($id);

        return redirect()->route('command_logs.index')->with('success', __('command_logs.messages.deleted'));
    }
}
