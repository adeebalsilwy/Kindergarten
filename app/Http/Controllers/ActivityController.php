<?php

namespace App\Http\Controllers;

use OmarAlalwi\Gpdf\Facade\Gpdf;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Services\ActivityService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ActivityController extends Controller
{
    protected $service;

    public function __construct(ActivityService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $this->authorize('view_activities');
        $query = $this->service->query();

        // Handle export functionality
        if ($request->has('export')) {
            return $this->export($request->get('export'), $query);
        }

        $activities = $query->paginate(15);

        return view('pages.activities.index', compact('activities'));
    }

    /**
     * Export data to different formats
     */
    protected function export($format, $query)
    {
        $this->authorize('export_activities');
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
        $html = view('pages.activities.export-pdf', ['data' => $data])->render();

        return response()->streamDownload(function () use ($html) {
            echo \OmarAlalwi\Gpdf\Facades\Gpdf::generate($html);
        }, 'Activity_export_'.date('Y-m-d_H-i-s').'.pdf');
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
        $sheet->setTitle(__('activities.title'));
        $sheet->setCellValue('A1', __('activities.title'));
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Prepare headers
        $headers = [];
        if ($data->count() > 0) {
            $firstItem = $data->first();
            foreach ($firstItem->getAttributes() as $key => $value) {
                if (! in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                    $headers[] = __('activities.fields.'.$key);
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
                    } elseif (is_array($value)) {
                        $sheet->setCellValue($col.$row, is_array($value) ? implode(', ', $value) : ($value ?? '-'));
                    } elseif (is_bool($value)) {
                        $sheet->setCellValue($col.$row, $value ? __('global.yes') : __('global.no'));
                    } else {
                        $sheet->setCellValue($col.$row, $value ?? '-');
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
        $fileName = 'Activity_export_'.date('Y-m-d_H-i-s').'.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }

    public function create()
    {
        $this->authorize('create_activities');
        
        $classes = \App\Models\Classes::all();
        $teachers = \App\Models\Teacher::all();
        $curricula = \App\Models\Curriculum::all();

        return view('pages.activities.create', compact('classes', 'teachers', 'curricula'));
    }

    public function store(StoreActivityRequest $request)
    {
        $this->authorize('create_activities');
        
        $data = $request->validated();
        
        // Handle JSON fields that might come as comma-separated strings from the frontend
        $jsonFields = ['required_materials', 'learning_objectives', 'outcomes'];
        foreach ($jsonFields as $field) {
            if (isset($data[$field]) && !is_array($data[$field])) {
                $decoded = json_decode($data[$field], true);
                if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
                    $data[$field] = !empty(trim($data[$field])) ? array_map('trim', explode(',', $data[$field])) : [];
                } else {
                    $data[$field] = $decoded;
                }
            }
        }

        $this->service->create($data);

        return redirect()->route('activities.index')->with('success', __('activities.messages.created'));
    }

    public function show($id)
    {
        $this->authorize('view_activities');
        $activity = $this->service->find($id);
        
        // Load all related data for the enhanced show page
        $activity->load([
            'class',
            'teacher',
            'curriculum',
            'children'
        ]);

        return view('pages.activities.show', compact('activity'));
    }

    public function edit($id)
    {
        $this->authorize('edit_activities');
        $activity = $this->service->find($id);
        
        $classes = \App\Models\Classes::all();
        $teachers = \App\Models\Teacher::all();
        $curricula = \App\Models\Curriculum::all();

        return view('pages.activities.edit', compact('activity', 'classes', 'teachers', 'curricula'));
    }

    public function update(UpdateActivityRequest $request, $id)
    {
        $this->authorize('edit_activities');
        
        $data = $request->validated();
        
        // Handle JSON fields that might come as comma-separated strings from the frontend
        $jsonFields = ['required_materials', 'learning_objectives', 'outcomes'];
        foreach ($jsonFields as $field) {
            if (isset($data[$field]) && !is_array($data[$field])) {
                $decoded = json_decode($data[$field], true);
                if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
                    $data[$field] = !empty(trim($data[$field])) ? array_map('trim', explode(',', $data[$field])) : [];
                } else {
                    $data[$field] = $decoded;
                }
            }
        }

        $this->service->update($id, $data);

        return redirect()->route('activities.index')->with('success', __('activities.messages.updated'));
    }

    public function destroy($id)
    {
        $this->authorize('delete_activities');
        $this->service->delete($id);

        return redirect()->route('activities.index')->with('success', __('activities.messages.deleted'));
    }
}
