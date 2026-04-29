<?php

namespace App\Http\Controllers;

use OmarAlalwi\Gpdf\Facade\Gpdf;

use App\Http\Requests\StoreClassesRequest;
use App\Http\Requests\UpdateClassesRequest;
use App\Services\ClassesService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ClassesController extends Controller
{
    protected $service;

    public function __construct(ClassesService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $this->authorize('view_classes');
        $query = $this->service->query()->with(['teacher', 'gradeLevel', 'children']);

        // Apply filters
        if (method_exists($query->getModel(), 'scopeFilter')) {
            $query->filter($request->all());
        }
        
        // Additional filtering based on request parameters
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('code', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('description', 'LIKE', '%' . $request->search . '%');
            });
        }
        
        if ($request->filled('teacher_id')) {
            $query->where('teacher_id', $request->teacher_id);
        }
        
        if ($request->filled('grade_level_id')) {
            $query->where('grade_level_id', $request->grade_level_id);
        }
        
        if ($request->filled('age_group')) {
            $query->where('age_group', $request->age_group);
        }
        
        if ($request->has('is_active')) {
            $query->where('is_active', $request->is_active);
        }

        // Handle export functionality
        if ($request->has('export')) {
            return $this->export($request->get('export'), $query);
        }

        $classes = $query->paginate(15)->withQueryString();

        return view('pages.classes.index', compact('classes'));
    }

    /**
     * Export data to different formats
     */
    protected function export($format, $query)
    {
        $this->authorize('export_classes');
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
        $html = view('pages.classes.export-pdf', ['data' => $data])->render();
        
        return response()->streamDownload(function () use ($html) {
            echo Gpdf::generate($html);
        }, 'Classes_export_'.date('Y-m-d_H-i-s').'.pdf');
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
        $sheet->setTitle(__('classes.title'));
        $sheet->setCellValue('A1', __('classes.title'));
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Prepare headers
        $headers = [];
        if ($data->count() > 0) {
            $firstItem = $data->first();
            foreach ($firstItem->getAttributes() as $key => $value) {
                if (! in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                    $headers[] = __('classes.fields.'.$key);
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
        $sheet->getStyle($headerRange)->getFont()->setBold(true);
        $sheet->getStyle($headerRange)->getFill()
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
        $fileName = 'Classes_export_'.date('Y-m-d_H-i-s').'.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }

    public function create()
    {
        $this->authorize('create_classes');

        $teachers = \App\Models\Teacher::select('id', 'name')->orderBy('name')->get();
        $gradeLevels = \App\Models\GradeLevel::select('id', 'name')->orderBy('name')->get();

        return view('pages.classes.create', compact('teachers', 'gradeLevels'));
    }

    public function store(StoreClassesRequest $request)
    {
        $this->authorize('create_classes');
        $this->service->create($request->validated());

        return redirect()->route('classes.index')->with('success', __('classes.messages.created'));
    }

    public function show($id)
    {
        $this->authorize('view_classes');
        $classes = $this->service->find($id);
        
        // Load all related data for the enhanced show page
        $classes->load([
            'teacher',
            'gradeLevel',
            'children.parent',
            'children.secondParent',
            'children.attendances',
            'children.grades',
            'children.payments',
            'children.activities',
            'children.events',
            'activities.teacher',
            'activities.children',
            'events.teacher',
            'events.children',
            'attendances.child',
            'curriculum'
        ]);

        return view('pages.classes.show', compact('classes'));
    }

    public function edit($id)
    {
        $this->authorize('edit_classes');
        $classes = $this->service->find($id);

        $teachers = \App\Models\Teacher::select('id', 'name')->orderBy('name')->get();
        $gradeLevels = \App\Models\GradeLevel::select('id', 'name')->orderBy('name')->get();

        return view('pages.classes.edit', compact('classes', 'teachers', 'gradeLevels'));
    }

    public function update(UpdateClassesRequest $request, $id)
    {
        $this->authorize('edit_classes');
        
        // Check if archiving
        if ($request->has('is_archived') && $request->is_archived == 1) {
            $class = $this->service->find($id);
            $class->delete(); // Soft delete
            return redirect()->route('classes.index')->with('success', __('classes.messages.archived'));
        }
        
        $this->service->update($id, $request->validated());

        return redirect()->route('classes.index')->with('success', __('classes.messages.updated'));
    }

    public function destroy($id)
    {
        $this->authorize('delete_classes');
        $this->service->delete($id);

        return redirect()->route('classes.index')->with('success', __('classes.messages.deleted'));
    }

    public function exportPdf(Request $request)
    {
        $this->authorize('export_classes');
        $query = $this->service->query()->with(['teacher', 'gradeLevel', 'children']);

        // Apply filters
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('code', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('description', 'LIKE', '%' . $request->search . '%');
            });
        }
        
        if ($request->filled('teacher_id')) {
            $query->where('teacher_id', $request->teacher_id);
        }
        
        if ($request->filled('grade_level_id')) {
            $query->where('grade_level_id', $request->grade_level_id);
        }
        
        if ($request->filled('age_group')) {
            $query->where('age_group', $request->age_group);
        }
        
        if ($request->has('is_active')) {
            $query->where('is_active', $request->is_active);
        }

        $data = $query->get();
        return $this->exportToPdf($data);
    }

    public function exportExcel(Request $request)
    {
        $this->authorize('export_classes');
        $query = $this->service->query()->with(['teacher', 'gradeLevel', 'children']);

        // Apply filters
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('code', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('description', 'LIKE', '%' . $request->search . '%');
            });
        }
        
        if ($request->filled('teacher_id')) {
            $query->where('teacher_id', $request->teacher_id);
        }
        
        if ($request->filled('grade_level_id')) {
            $query->where('grade_level_id', $request->grade_level_id);
        }
        
        if ($request->filled('age_group')) {
            $query->where('age_group', $request->age_group);
        }
        
        if ($request->has('is_active')) {
            $query->where('is_active', $request->is_active);
        }

        $data = $query->get();
        return $this->exportToExcel($data);
    }
}