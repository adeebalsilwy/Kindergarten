<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store{{modelName}}Request;
use App\Http\Requests\Update{{modelName}}Request;
use App\Models\{{modelName}};
use App\Services\{{modelName}}Service;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\App;

class {{modelName}}Controller extends Controller
{
    protected $service;

    public function __construct({{modelName}}Service $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $this->authorize('view_{{routePrefix}}');
        $query = $this->service->query();
        
        // Handle export functionality
        if ($request->has('export')) {
            return $this->export($request->get('export'), $query);
        }
        
        ${{variableNamePlural}} = $query->paginate(15);
        return view('pages.{{viewPath}}.index', compact('{{variableNamePlural}}'));
    }

    /**
     * Export data to different formats
     */
    protected function export($format, $query)
    {
        $this->authorize('export_{{routePrefix}}');
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
        $pdf = Pdf::loadView('pages.{{viewPath}}.export-pdf', ['data' => $data]);
        return $pdf->download('{{modelName}}_export_' . date('Y-m-d_H-i-s') . '.pdf');
    }

    /**
     * Export to Excel
     */
    protected function exportToExcel($data)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Set Right-to-Left for Arabic support if the app locale is Arabic
        if (App::getLocale() == 'ar') {
            $sheet->setRightToLeft(true);
        }

        // Set the title
        $sheet->setTitle(__('{{viewPath}}.title'));
        $sheet->setCellValue('A1', __('{{viewPath}}.title'));
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Prepare headers
        $headers = [];
        if ($data->count() > 0) {
            $firstItem = $data->first();
            foreach ($firstItem->getAttributes() as $key => $value) {
                if (!in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                    $headers[] = __('{{viewPath}}.fields.' . $key);
                }
            }
        }

        // Add headers to sheet
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '3', $header);
            $col++;
        }
        
        // Style header row
        $headerRange = 'A3:' . chr(ord('A') + count($headers) - 1) . '3';
        $sheet->getStyle($headerRange)->getFont()->setBold(true)
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFEEEEEE');

        // Add data rows
        $row = 4;
        foreach ($data as $item) {
            $col = 'A';
            foreach ($item->getAttributes() as $key => $value) {
                if (!in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                    if (is_a($value, 'Carbon\Carbon')) {
                        $sheet->setCellValue($col . $row, $value->format('Y-m-d H:i:s'));
                    } else {
                        $sheet->setCellValue($col . $row, $value);
                    }
                    $col++;
                }
            }
            $row++;
        }

        // Auto size columns
        foreach(range('A','Z') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = '{{modelName}}_export_' . date('Y-m-d_H-i-s') . '.xlsx';

        return response()->streamDownload(function() use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }

    public function create()
    {
        $this->authorize('create_{{routePrefix}}');
        {{relationsData}}
        return view('pages.{{viewPath}}.create', get_defined_vars());
    }

    public function store(Store{{modelName}}Request $request)
    {
        $this->authorize('create_{{routePrefix}}');
        $this->service->create($request->validated());
        return redirect()->route('{{routePrefix}}.index')->with('success', __('{{viewPath}}.messages.created'));
    }

    public function show($id)
    {
        $this->authorize('view_{{routePrefix}}');
        ${{variableName}} = $this->service->find($id);
        return view('pages.{{viewPath}}.show', compact('{{variableName}}'));
    }

    public function edit($id)
    {
        $this->authorize('edit_{{routePrefix}}');
        ${{variableName}} = $this->service->find($id);
        {{relationsData}}
        return view('pages.{{viewPath}}.edit', get_defined_vars());
    }

    public function update(Update{{modelName}}Request $request, $id)
    {
        $this->authorize('edit_{{routePrefix}}');
        $this->service->update($id, $request->validated());
        return redirect()->route('{{routePrefix}}.index')->with('success', __('{{viewPath}}.messages.updated'));
    }

    public function destroy($id)
    {
        $this->authorize('delete_{{routePrefix}}');
        $this->service->delete($id);
        return redirect()->route('{{routePrefix}}.index')->with('success', __('{{viewPath}}.messages.deleted'));
    }
}
