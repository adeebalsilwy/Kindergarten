<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Services\GradeService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class GradeController extends Controller
{
    protected $service;

    public function __construct(GradeService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $this->authorize('view_grades');
        $query = $this->service->query();

        // Handle export functionality
        if ($request->has('export')) {
            return $this->export($request->get('export'), $query);
        }

        $grades = $query->paginate(15);

        return view('pages.grades.index', compact('grades'));
    }

    /**
     * Export data to different formats
     */
    protected function export($format, $query)
    {
        $this->authorize('export_grades');
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
        $pdf = Pdf::loadView('pages.grades.export-pdf', ['data' => $data]);

        return $pdf->download('Grade_export_'.date('Y-m-d_H-i-s').'.pdf');
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
        $sheet->setTitle(__('grades.title'));
        $sheet->setCellValue('A1', __('grades.title'));
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Prepare headers
        $headers = [];
        if ($data->count() > 0) {
            $firstItem = $data->first();
            foreach ($firstItem->getAttributes() as $key => $value) {
                if (! in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                    $headers[] = __('grades.fields.'.$key);
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
        $fileName = 'Grade_export_'.date('Y-m-d_H-i-s').'.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }

    public function create()
    {
        $this->authorize('create_grades');
        $grade = new \App\Models\Grade();
        $children = \App\Models\Children::select('id', 'name')->orderBy('name')->get();
        $teachers = \App\Models\Teacher::select('id', 'name')->orderBy('name')->get();

        return view('pages.grades.create', compact('grade', 'children', 'teachers'));
    }

    public function store(StoreGradeRequest $request)
    {
        $this->authorize('create_grades');
        $this->service->create($request->validated());

        return redirect()->route('grades.index')->with('success', __('grades.messages.created'));
    }

    public function show($id)
    {
        $this->authorize('view_grades');
        $grade = $this->service->find($id);

        return view('pages.grades.show', compact('grade'));
    }

    public function edit($id)
    {
        $this->authorize('edit_grades');
        $grade = $this->service->find($id);
        $children = \App\Models\Children::select('id', 'name')->orderBy('name')->get();
        $teachers = \App\Models\Teacher::select('id', 'name')->orderBy('name')->get();

        return view('pages.grades.edit', compact('grade', 'children', 'teachers'));
    }

    public function update(UpdateGradeRequest $request, $id)
    {
        $this->authorize('edit_grades');
        $this->service->update($id, $request->validated());

        return redirect()->route('grades.index')->with('success', __('grades.messages.updated'));
    }

    public function destroy($id)
    {
        $this->authorize('delete_grades');
        $this->service->delete($id);

        return redirect()->route('grades.index')->with('success', __('grades.messages.deleted'));
    }
}
