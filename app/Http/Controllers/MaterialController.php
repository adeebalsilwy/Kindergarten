<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Curriculum;
use App\Models\Classes;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Material::class);

        $query = Material::with(['curricula', 'activities']);

        // Apply filters
        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->get('category'));
        }

        if ($request->filled('type')) {
            $query->where('type', $request->get('type'));
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', $request->get('is_active'));
        }

        if ($request->filled('is_consumable')) {
            $query->where('is_consumable', $request->get('is_consumable'));
        }

        if ($request->filled('is_digital')) {
            $query->where('is_digital', $request->get('is_digital'));
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_direction', 'desc');
        $allowedSortFields = ['name', 'category', 'type', 'quantity_available', 'created_at'];

        if (in_array($sortBy, $allowedSortFields)) {
            $query->orderBy($sortBy, $sortDirection);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $materials = $query->paginate(15)->appends($request->query());

        return view('pages.materials.index', compact('materials'));
    }

    public function create()
    {
        $this->authorize('create', Material::class);

        // Get all curricula, classes, and activities for the form
        $curricula = Curriculum::all();
        $classes = Classes::all();
        $activities = Activity::with('curriculum')->get();

        return view('pages.materials.create', compact('curricula', 'classes', 'activities'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Material::class);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'type' => 'nullable|in:physical,digital,consumable,equipment',
            'quantity' => 'required|integer|min:0',
            'quantity_required' => 'nullable|integer|min:0',
            'unit' => 'nullable|string|max:50',
            'status' => 'required|in:available,in-use,maintenance,out-of-stock',
            'supplier' => 'nullable|string|max:255',
            'cost' => 'nullable|numeric|min:0',
            'purchase_date' => 'nullable|date',
            'specifications' => 'nullable|string',
            'curricula' => 'array',
            'curricula.*' => 'exists:curricula,id',
            'classes' => 'array',
            'classes.*' => 'exists:classes,id',
            'activities' => 'array',
            'activities.*' => 'exists:activities,id',
        ]);

        // Parse specifications from string to JSON if provided
        $specifications = [];
        if (!empty($validated['specifications'])) {
            $decoded = json_decode($validated['specifications'], true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $specifications = $decoded;
            } else {
                // If not valid JSON, store as simple text in an array
                $specifications = ['details' => $validated['specifications']];
            }
        }

        // Map the form fields to the database fields
        $materialData = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'type' => $validated['type'],
            'quantity_available' => $validated['quantity'],
            'quantity_required' => $validated['quantity_required'] ?? 0,
            'unit_cost' => $validated['cost'] ?? null,
            'supplier' => $validated['supplier'],
            'storage_location' => $validated['unit'],
            'is_consumable' => in_array($validated['type'], ['consumable']),
            'is_digital' => in_array($validated['type'], ['digital']),
            'is_active' => $validated['status'] !== 'out-of-stock',
            'specifications' => $specifications,
            'purchased_at' => $validated['purchase_date'],
            'created_by' => auth()->id(),
        ];

        $material = Material::create($materialData);

        // Attach selected curricula
        if (isset($validated['curricula'])) {
            $material->curricula()->attach($validated['curricula']);
        }

        // Attach selected classes
        if (isset($validated['classes'])) {
            $material->classes()->attach($validated['classes']);
        }

        // Attach selected activities
        if (isset($validated['activities'])) {
            $material->activities()->attach($validated['activities']);
        }

        return redirect()->route('materials.index')->with('success', __('Material created successfully.'));
    }

    public function show(Material $material)
    {
        $this->authorize('view', $material);

        // Load related data for the show page
        $material->load(['curricula', 'activities', 'classes']);

        // Get related classes and activities for additional information
        $relatedClasses = $material->classes;
        $relatedActivities = $material->activities;
        $relatedCurricula = $material->curricula;

        return view('pages.materials.show', compact('material', 'relatedClasses', 'relatedActivities', 'relatedCurricula'));
    }

    public function edit(Material $material)
    {
        $this->authorize('update', $material);

        // Get all curricula, classes, and activities for the form
        $curricula = Curriculum::all();
        $classes = Classes::all();
        $activities = Activity::with('curriculum')->get();

        return view('pages.materials.edit', compact('material', 'curricula', 'classes', 'activities'));
    }

    public function update(Request $request, Material $material)
    {
        $this->authorize('update', $material);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'type' => 'nullable|in:physical,digital,consumable,equipment',
            'quantity' => 'required|integer|min:0',
            'quantity_required' => 'nullable|integer|min:0',
            'unit' => 'nullable|string|max:50',
            'status' => 'required|in:available,in-use,maintenance,out-of-stock',
            'supplier' => 'nullable|string|max:255',
            'cost' => 'nullable|numeric|min:0',
            'purchase_date' => 'nullable|date',
            'specifications' => 'nullable|string',
            'curricula' => 'array',
            'curricula.*' => 'exists:curricula,id',
            'classes' => 'array',
            'classes.*' => 'exists:classes,id',
            'activities' => 'array',
            'activities.*' => 'exists:activities,id',
        ]);

        // Parse specifications from string to JSON if provided
        $specifications = [];
        if (!empty($validated['specifications'])) {
            $decoded = json_decode($validated['specifications'], true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $specifications = $decoded;
            } else {
                // If not valid JSON, store as simple text in an array
                $specifications = ['details' => $validated['specifications']];
            }
        }

        // Map the form fields to the database fields
        $materialData = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'type' => $validated['type'],
            'quantity_available' => $validated['quantity'],
            'quantity_required' => $validated['quantity_required'] ?? 0,
            'unit_cost' => $validated['cost'] ?? null,
            'supplier' => $validated['supplier'],
            'storage_location' => $validated['unit'],
            'is_consumable' => in_array($validated['type'], ['consumable']),
            'is_digital' => in_array($validated['type'], ['digital']),
            'is_active' => $validated['status'] !== 'out-of-stock',
            'specifications' => $specifications,
            'purchased_at' => $validated['purchase_date'],
        ];

        $material->update($materialData);

        // Sync selected curricula
        if (isset($validated['curricula'])) {
            $material->curricula()->sync($validated['curricula']);
        } else {
            $material->curricula()->detach();
        }

        // Sync selected classes
        if (isset($validated['classes'])) {
            $material->classes()->sync($validated['classes']);
        } else {
            $material->classes()->detach();
        }

        // Sync selected activities
        if (isset($validated['activities'])) {
            $material->activities()->sync($validated['activities']);
        } else {
            $material->activities()->detach();
        }

        return redirect()->route('materials.index')->with('success', __('Material updated successfully.'));
    }

    public function destroy(Material $material)
    {
        $this->authorize('delete', $material);

        $material->delete();

        return redirect()->route('materials.index')->with('success', __('Material deleted successfully.'));
    }

    public function exportPdf(Request $request)
    {
        $this->authorize('export', Material::class);

        $query = Material::with(['curricula', 'activities']);

        // Apply filters
        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->get('category'));
        }

        if ($request->filled('type')) {
            $query->where('type', $request->get('type'));
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', $request->get('is_active'));
        }

        if ($request->filled('is_consumable')) {
            $query->where('is_consumable', $request->get('is_consumable'));
        }

        if ($request->filled('is_digital')) {
            $query->where('is_digital', $request->get('is_digital'));
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_direction', 'desc');
        $allowedSortFields = ['name', 'category', 'type', 'quantity_available', 'created_at'];

        if (in_array($sortBy, $allowedSortFields)) {
            $query->orderBy($sortBy, $sortDirection);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $materials = $query->get();

        $html = view('pages.materials.export-pdf', ['materials' => $materials])->render();

        return response()->streamDownload(function () use ($html) {
            echo \OmarAlalwi\Gpdf\Facades\Gpdf::generate($html);
        }, 'materials_export_' . date('Y-m-d_H-i-s') . '.pdf');
    }

    public function exportExcel(Request $request)
    {
        $this->authorize('export', Material::class);

        $query = Material::with(['curricula', 'activities']);

        // Apply filters
        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->get('category'));
        }

        if ($request->filled('type')) {
            $query->where('type', $request->get('type'));
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', $request->get('is_active'));
        }

        if ($request->filled('is_consumable')) {
            $query->where('is_consumable', $request->get('is_consumable'));
        }

        if ($request->filled('is_digital')) {
            $query->where('is_digital', $request->get('is_digital'));
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_direction', 'desc');
        $allowedSortFields = ['name', 'category', 'type', 'quantity_available', 'created_at'];

        if (in_array($sortBy, $allowedSortFields)) {
            $query->orderBy($sortBy, $sortDirection);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $materials = $query->get();

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the title
        $sheet->setTitle('Materials');
        $sheet->setCellValue('A1', 'Materials Export');
        $sheet->mergeCells('A1:F1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Define headers
        $headers = ['ID', 'Name', 'Category', 'Type', 'Quantity Available', 'Quantity Required', 'Unit Cost', 'Supplier', 'Storage Location', 'Is Consumable', 'Is Digital', 'Is Active', 'Created At'];

        // Add headers to sheet
        $col = 'A';
        foreach ($headers as $index => $header) {
            $sheet->setCellValue($col . '3', $header);
            $col++;
        }

        // Style header row
        $headerRange = 'A3:' . chr(ord('A') + count($headers) - 1) . '3';
        $sheet->getStyle($headerRange)->getFont()->setBold(true);
        $sheet->getStyle($headerRange)->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFEEEEEE');

        // Add data rows
        $row = 4;
        foreach ($materials as $material) {
            $sheet->setCellValue('A' . $row, $material->id);
            $sheet->setCellValue('B' . $row, $material->name);
            $sheet->setCellValue('C' . $row, $material->category);
            $sheet->setCellValue('D' . $row, $material->type);
            $sheet->setCellValue('E' . $row, $material->quantity_available);
            $sheet->setCellValue('F' . $row, $material->quantity_required);
            $sheet->setCellValue('G' . $row, $material->unit_cost);
            $sheet->setCellValue('H' . $row, $material->supplier);
            $sheet->setCellValue('I' . $row, $material->storage_location);
            $sheet->setCellValue('J' . $row, $material->is_consumable ? 'Yes' : 'No');
            $sheet->setCellValue('K' . $row, $material->is_digital ? 'Yes' : 'No');
            $sheet->setCellValue('L' . $row, $material->is_active ? 'Yes' : 'No');
            $sheet->setCellValue('M' . $row, $material->created_at ? $material->created_at->format('Y-m-d H:i:s') : '');
            $row++;
        }

        // Auto size columns
        foreach (range('A', 'M') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $fileName = 'materials_export_' . date('Y-m-d_H-i-s') . '.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }

    public function attachToCurriculum(Request $request, Material $material)
    {
        $this->authorize('update_materials', $material);

        $request->validate([
            'curriculum_id' => 'required|exists:curricula,id',
            'quantity_required' => 'required|integer|min:1',
            'usage_instructions' => 'nullable|string',
        ]);

        $material->curricula()->attach($request->curriculum_id, [
            'quantity_required' => $request->quantity_required,
            'usage_instructions' => $request->usage_instructions,
        ]);

        return redirect()->back()->with('success', __('Material attached to curriculum successfully.'));
    }

    public function detachFromCurriculum(Request $request, Material $material)
    {
        $this->authorize('update_materials', $material);

        $request->validate([
            'curriculum_id' => 'required|exists:curricula,id',
        ]);

        $material->curricula()->detach($request->curriculum_id);

        return redirect()->back()->with('success', __('Material detached from curriculum successfully.'));
    }

    public function attachToActivity(Request $request, Material $material)
    {
        $this->authorize('update_materials', $material);

        $request->validate([
            'activity_id' => 'required|exists:activities,id',
            'quantity_required' => 'required|integer|min:1',
            'usage_instructions' => 'nullable|string',
        ]);

        $material->activities()->attach($request->activity_id, [
            'quantity_required' => $request->quantity_required,
            'usage_instructions' => $request->usage_instructions,
        ]);

        return redirect()->back()->with('success', __('Material attached to activity successfully.'));
    }

    public function detachFromActivity(Request $request, Material $material)
    {
        $this->authorize('update_materials', $material);

        $request->validate([
            'activity_id' => 'required|exists:activities,id',
        ]);

        $material->activities()->detach($request->activity_id);

        return redirect()->back()->with('success', __('Material detached from activity successfully.'));
    }

    // New method to attach materials to classes
    public function attachToClass(Request $request, Material $material)
    {
        $this->authorize('update_materials', $material);

        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'quantity_required' => 'required|integer|min:1',
            'usage_instructions' => 'nullable|string',
        ]);

        $material->classes()->attach($request->class_id, [
            'quantity_required' => $request->quantity_required,
            'usage_instructions' => $request->usage_instructions,
        ]);

        return redirect()->back()->with('success', __('Material attached to class successfully.'));
    }

    // New method to detach materials from classes
    public function detachFromClass(Request $request, Material $material)
    {
        $this->authorize('update_materials', $material);

        $request->validate([
            'class_id' => 'required|exists:classes,id',
        ]);

        $material->classes()->detach($request->class_id);

        return redirect()->back()->with('success', __('Material detached from class successfully.'));
    }

    // New method to detach from curriculum with DELETE method
    public function detachFromCurriculumWithDelete(Request $request, Material $material)
    {
        $this->authorize('update_materials', $material);

        $request->validate([
            'curriculum_id' => 'required|exists:curricula,id',
        ]);

        $material->curricula()->detach($request->curriculum_id);

        return redirect()->back()->with('success', __('Material detached from curriculum successfully.'));
    }

    // New method to detach from activity with DELETE method
    public function detachFromActivityWithDelete(Request $request, Material $material)
    {
        $this->authorize('update_materials', $material);

        $request->validate([
            'activity_id' => 'required|exists:activities,id',
        ]);

        $material->activities()->detach($request->activity_id);

        return redirect()->back()->with('success', __('Material detached from activity successfully.'));
    }

    // New method to detach from class with DELETE method
    public function detachFromClassWithDelete(Request $request, Material $material)
    {
        $this->authorize('update_materials', $material);

        $request->validate([
            'class_id' => 'required|exists:classes,id',
        ]);

        $material->classes()->detach($request->class_id);

        return redirect()->back()->with('success', __('Material detached from class successfully.'));
    }
}
