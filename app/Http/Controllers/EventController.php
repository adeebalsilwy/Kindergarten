<?php

namespace App\Http\Controllers;

use OmarAlalwi\Gpdf\Facade\Gpdf;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Services\EventService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class EventController extends Controller
{
    protected $service;

    public function __construct(EventService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $this->authorize('view_events');
        $query = $this->service->query()->with(['class', 'teacher']);

        if (method_exists($query->getModel(), 'scopeFilter')) {
            $query->filter($request);
        }

        // Handle export functionality
        if ($request->has('export')) {
            return $this->export($request->get('export'), $query);
        }

        $events = $query->paginate(15)->withQueryString();

        return view('pages.events.index', compact('events'));
    }

    /**
     * Export data to different formats
     */
    protected function export($format, $query)
    {
        $this->authorize('export_events');
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
        $html = view('pages.events.export-pdf', ['data' => $data])->render();
        
        return response()->streamDownload(function () use ($html) {
            echo Gpdf::generate($html);
        }, 'Event_export_'.date('Y-m-d_H-i-s').'.pdf');
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
        $sheet->setTitle(__('events.title'));
        $sheet->setCellValue('A1', __('events.title'));
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Prepare headers
        $headers = [];
        if ($data->count() > 0) {
            $firstItem = $data->first();
            foreach ($firstItem->getAttributes() as $key => $value) {
                if (! in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                    $headers[] = __('events.fields.'.$key);
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
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle($headerRange)->getFill()
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
        $fileName = 'Event_export_'.date('Y-m-d_H-i-s').'.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }

    public function create()
    {
        $this->authorize('create_events');
        
        $classes = \App\Models\Classes::all();
        $teachers = \App\Models\Teacher::all();
        $children = \App\Models\Children::all();

        return view('pages.events.create', compact('classes', 'teachers', 'children'));
    }

    public function store(StoreEventRequest $request)
    {
        $this->authorize('create_events');
        
        $data = $request->validated();
        
        // Handle child_ids if they come as a comma-separated string or array
        if (isset($data['child_ids']) && is_string($data['child_ids'])) {
            $data['child_ids'] = array_map('trim', explode(',', $data['child_ids']));
        }

        $event = $this->service->create($data);
        
        // Sync children if provided
        if (isset($data['child_ids'])) {
            $event->children()->sync($data['child_ids']);
        }

        return redirect()->route('events.index')->with('success', __('events.messages.created'));
    }

    public function show($id)
    {
        $this->authorize('view_events');
        $event = $this->service->find($id);
        
        // Load all related data for the enhanced show page
        $event->load([
            'class',
            'teacher',
            'children'
        ]);

        return view('pages.events.show', compact('event'));
    }

    public function edit($id)
    {
        $this->authorize('edit_events');
        $event = $this->service->find($id);
        
        $classes = \App\Models\Classes::all();
        $teachers = \App\Models\Teacher::all();
        $children = \App\Models\Children::all();

        return view('pages.events.edit', compact('event', 'classes', 'teachers', 'children'));
    }

    public function update(UpdateEventRequest $request, $id)
    {
        $this->authorize('edit_events');
        
        $data = $request->validated();
        
        // Handle child_ids if they come as a comma-separated string or array
        if (isset($data['child_ids']) && is_string($data['child_ids'])) {
            $data['child_ids'] = array_map('trim', explode(',', $data['child_ids']));
        }

        $this->service->update($id, $data);
        $event = $this->service->find($id);
        
        // Sync children if provided
        if (isset($data['child_ids'])) {
            $event->children()->sync($data['child_ids']);
        }

        return redirect()->route('events.index')->with('success', __('events.messages.updated'));
    }

    public function destroy($id)
    {
        $this->authorize('delete_events');
        $this->service->delete($id);

        return redirect()->route('events.index')->with('success', __('events.messages.deleted'));
    }

    public function exportPdf(Request $request)
    {
        $this->authorize('export_events');
        
        $query = $this->service->query()->with(['class', 'teacher']);

        if (method_exists($query->getModel(), 'scopeFilter')) {
            $query->filter($request);
        }

        $data = $query->get();
        
        return $this->exportToPdf($data);
    }

    public function exportExcel(Request $request)
    {
        $this->authorize('export_events');
        
        $query = $this->service->query()->with(['class', 'teacher']);

        if (method_exists($query->getModel(), 'scopeFilter')) {
            $query->filter($request);
        }

        $data = $query->get();
        
        return $this->exportToExcel($data);
    }
}
