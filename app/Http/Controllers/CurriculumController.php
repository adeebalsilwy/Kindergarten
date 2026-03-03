<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCurriculumRequest;
use App\Http\Requests\UpdateCurriculumRequest;
use App\Services\CurriculumService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CurriculumController extends Controller
{
    protected $service;

    public function __construct(CurriculumService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $this->authorize('view_curricula');
        $query = $this->service->query();

        // Apply filters based on request parameters
        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }

        if ($request->filled('grade_level')) {
            $query->where('grade_level', 'LIKE', '%' . $request->get('grade_level') . '%');
        }

        if ($request->filled('subject_area')) {
            $query->where('subject_area', 'LIKE', '%' . $request->get('subject_area') . '%');
        }

        if ($request->filled('curriculum_type')) {
            $query->where('curriculum_type', 'LIKE', '%' . $request->get('curriculum_type') . '%');
        }

        if ($request->filled('duration_weeks')) {
            $query->where('duration_weeks', $request->get('duration_weeks'));
        }

        if ($request->filled('created_by')) {
            $query->where('created_by', 'LIKE', '%' . $request->get('created_by') . '%');
        }

        if ($request->filled('is_active')) {
            $isActiveArray = $request->get('is_active');
            if (is_array($isActiveArray) && count($isActiveArray) > 0) {
                $query->whereIn('is_active', $isActiveArray);
            }
        }

        // Apply sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_direction', 'desc');

        // Validate sort field to prevent injection
        $allowedSortFields = ['created_at', 'name', 'grade_level', 'subject_area'];
        if (!in_array($sortBy, $allowedSortFields)) {
            $sortBy = 'created_at';
        }

        $query->orderBy($sortBy, $sortDirection);

        // Handle export functionality
        if ($request->has('export')) {
            return $this->export($request->get('export'), $query);
        }

        $curricula = $query->paginate(15)->appends($request->query());

        return view('pages.curricula.index', compact('curricula'));
    }

    /**
     * Export data to different formats
     */
    protected function export($format, $query)
    {
        $this->authorize('export_curricula');
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
        $html = view('pages.curricula.export-pdf', ['data' => $data])->render();

        $pdf = Pdf::loadView('pages.curricula.export-pdf', ['data' => $data]);
        return $pdf->download('Curriculum_export_'.date('Y-m-d_H-i-s').'.pdf');
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
        $sheet->setTitle(__('curricula.title'));
        $sheet->setCellValue('A1', __('curricula.title'));
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Prepare headers
        $headers = [];
        if ($data->count() > 0) {
            $firstItem = $data->first();
            foreach ($firstItem->getAttributes() as $key => $value) {
                if (! in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                    $headers[] = __('curricula.fields.'.$key);
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
        $fileName = 'Curriculum_export_'.date('Y-m-d_H-i-s').'.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }

    public function exportPdf(Request $request)
    {
        $this->authorize('export_curricula');
        $query = $this->service->query();

        // Apply the same filters as in index method
        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }

        if ($request->filled('grade_level')) {
            $query->where('grade_level', 'LIKE', '%' . $request->get('grade_level') . '%');
        }

        if ($request->filled('subject_area')) {
            $query->where('subject_area', 'LIKE', '%' . $request->get('subject_area') . '%');
        }

        if ($request->filled('curriculum_type')) {
            $query->where('curriculum_type', 'LIKE', '%' . $request->get('curriculum_type') . '%');
        }

        if ($request->filled('duration_weeks')) {
            $query->where('duration_weeks', $request->get('duration_weeks'));
        }

        if ($request->filled('created_by')) {
            $query->where('created_by', 'LIKE', '%' . $request->get('created_by') . '%');
        }

        if ($request->filled('is_active')) {
            $isActiveArray = $request->get('is_active');
            if (is_array($isActiveArray) && count($isActiveArray) > 0) {
                $query->whereIn('is_active', $isActiveArray);
            }
        }

        // Apply sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_direction', 'desc');

        $allowedSortFields = ['created_at', 'name', 'grade_level', 'subject_area'];
        if (!in_array($sortBy, $allowedSortFields)) {
            $sortBy = 'created_at';
        }

        $query->orderBy($sortBy, $sortDirection);

        $data = $query->get();
        return $this->exportToPdf($data);
    }

    public function exportExcel(Request $request)
    {
        $this->authorize('export_curricula');
        $query = $this->service->query();

        // Apply the same filters as in index method
        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }

        if ($request->filled('grade_level')) {
            $query->where('grade_level', 'LIKE', '%' . $request->get('grade_level') . '%');
        }

        if ($request->filled('subject_area')) {
            $query->where('subject_area', 'LIKE', '%' . $request->get('subject_area') . '%');
        }

        if ($request->filled('curriculum_type')) {
            $query->where('curriculum_type', 'LIKE', '%' . $request->get('curriculum_type') . '%');
        }

        if ($request->filled('duration_weeks')) {
            $query->where('duration_weeks', $request->get('duration_weeks'));
        }

        if ($request->filled('created_by')) {
            $query->where('created_by', 'LIKE', '%' . $request->get('created_by') . '%');
        }

        if ($request->filled('is_active')) {
            $isActiveArray = $request->get('is_active');
            if (is_array($isActiveArray) && count($isActiveArray) > 0) {
                $query->whereIn('is_active', $isActiveArray);
            }
        }

        // Apply sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_direction', 'desc');

        $allowedSortFields = ['created_at', 'name', 'grade_level', 'subject_area'];
        if (!in_array($sortBy, $allowedSortFields)) {
            $sortBy = 'created_at';
        }

        $query->orderBy($sortBy, $sortDirection);

        $data = $query->get();
        return $this->exportToExcel($data);
    }

    public function create()
    {
        $this->authorize('create_curricula');

        // Get all materials for the form
        $materials = \App\Models\Material::all();

        return view('pages.curricula.create', get_defined_vars());
    }

    public function store(StoreCurriculumRequest $request)
    {
        $this->authorize('create_curricula');

        $validatedData = $request->validated();

        // Extract connected materials from validated data
        $connectedMaterials = $validatedData['connected_materials'] ?? [];
        unset($validatedData['connected_materials']);

        // Create the curriculum
        $curriculum = $this->service->create($validatedData);

        // Attach connected materials if any
        if (!empty($connectedMaterials)) {
            $curriculum->materials()->attach($connectedMaterials);
        }

        return redirect()->route('curricula.index')->with('success', __('curricula.messages.created'));
    }

    public function show($id)
    {
        $this->authorize('view_curricula');
        $curriculum = $this->service->find($id);

        // Load all related data for the enhanced show page
        $curriculum->load([
            'activities',
            'teacher',
            'materials'
        ]);

        return view('pages.curricula.show', compact('curriculum'));
    }

    public function edit($id)
    {
        $this->authorize('edit_curricula');
        $curriculum = $this->service->find($id);

        // Get all materials for the form
        $materials = \App\Models\Material::all();

        return view('pages.curricula.edit', get_defined_vars());
    }

    public function update(UpdateCurriculumRequest $request, $id)
    {
        $this->authorize('edit_curricula');

        $validatedData = $request->validated();

        // Extract connected materials from validated data
        $connectedMaterials = $validatedData['connected_materials'] ?? [];
        unset($validatedData['connected_materials']);

        // Update the curriculum
        $this->service->update($id, $validatedData);

        // Update the materials relationship using the model directly
        $curriculum = \App\Models\Curriculum::findOrFail($id);
        $curriculum->materials()->sync($connectedMaterials);

        return redirect()->route('curricula.index')->with('success', __('curricula.messages.updated'));
    }

    public function destroy($id)
    {
        $this->authorize('delete_curricula');
        $this->service->delete($id);

        return redirect()->route('curricula.index')->with('success', __('curricula.messages.deleted'));
    }
}
