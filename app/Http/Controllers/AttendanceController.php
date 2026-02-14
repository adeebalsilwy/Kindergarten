<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Services\AttendanceService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AttendanceController extends Controller
{
    protected $service;

    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    public function __construct(AttendanceService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $this->authorize('view_attendances');
        $query = $this->service->query()->with(['child.class', 'child.parent']);

        // Handle export functionality
        if ($request->has('export')) {
            return $this->export($request->get('export'), $query);
        }

        // Stats for the view
        $today = now()->format('Y-m-d');
        $todayAttendanceCount = (clone $query)->where('date', $today)->where('status', 'present')->count();
        $absentCount = (clone $query)->where('date', $today)->where('status', 'absent')->count();
        $lateArrivals = (clone $query)->where('date', $today)->where('status', 'late')->count();

        $totalChildren = \App\Models\Children::count();
        $attendanceRate = $totalChildren > 0 ? round(($todayAttendanceCount / $totalChildren) * 100) : 0;
        $weeklyAverage = 85; // Placeholder or calculate properly

        $attendances = $query->paginate(15);
        $classes = \App\Models\Classes::all();

        return view('pages.attendances.index', compact(
            'attendances',
            'todayAttendanceCount',
            'absentCount',
            'lateArrivals',
            'attendanceRate',
            'weeklyAverage',
            'classes'
        ));
    }

    /**
     * Export data to different formats
     */
    protected function export($format, $query)
    {
        $this->authorize('export_attendances');
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
        $pdf = Pdf::loadView('pages.attendances.export-pdf', ['data' => $data]);

        return $pdf->download('Attendance_export_'.date('Y-m-d_H-i-s').'.pdf');
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
        $sheet->setTitle(__('attendances.title'));
        $sheet->setCellValue('A1', __('attendances.title'));
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Prepare headers
        $headers = [];
        if ($data->count() > 0) {
            $firstItem = $data->first();
            foreach ($firstItem->getAttributes() as $key => $value) {
                if (! in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                    $headers[] = __('attendances.fields.'.$key);
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
        $fileName = 'Attendance_export_'.date('Y-m-d_H-i-s').'.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }

    public function create()
    {
        $this->authorize('create_attendances');

        $children = \App\Models\Children::select('id', 'name')->orderBy('name')->get();

        return view('pages.attendances.create', compact('children'));
    }

    public function store(StoreAttendanceRequest $request)
    {
        $this->authorize('create_attendances');
        $this->service->create($request->validated());

        return redirect()->route('attendances.index')->with('success', __('attendances.messages.created'));
    }

    public function show($id)
    {
        $this->authorize('view_attendances');
        $attendance = $this->service->find($id);

        return view('pages.attendances.show', compact('attendance'));
    }

    public function edit($id)
    {
        $this->authorize('edit_attendances');
        $attendance = $this->service->find($id);
        $children = \App\Models\Children::select('id', 'name')->orderBy('name')->get();

        return view('pages.attendances.edit', compact('attendance', 'children'));
    }

    public function update(UpdateAttendanceRequest $request, $id)
    {
        $this->authorize('edit_attendances');
        $this->service->update($id, $request->validated());

        return redirect()->route('attendances.index')->with('success', __('attendances.messages.updated'));
    }

    public function destroy($id)
    {
        $this->authorize('delete_attendances');
        $this->service->delete($id);

        return redirect()->route('attendances.index')->with('success', __('attendances.messages.deleted'));
    }

    public function bulk(Request $request)
    {
        $this->authorize('create_attendances');
        $classes = \App\Models\Classes::all();
        $class_id = $request->get('class_id');
        $date = $request->get('date', date('Y-m-d'));
        $childrens = [];

        if ($class_id) {
            $childrens = \App\Models\Children::where('class_id', $class_id)->get();
        }

        return view('pages.attendances.bulk', compact('classes', 'childrens', 'class_id', 'date'));
    }

    public function bulkStore(Request $request)
    {
        $this->authorize('create_attendances');
        $date = $request->input('date', date('Y-m-d'));
        $classId = $request->input('class_id');
        $attendanceData = $request->input('attendance', []);

        $formattedData = [];
        foreach ($attendanceData as $childId => $data) {
            $formattedData[] = [
                'child_id' => $childId,
                'status' => $data['status'] ?? 'present',
                'notes' => $data['notes'] ?? null,
            ];
        }

        $this->service->bulkMarkAttendance($classId, $date, $formattedData);

        return redirect()->route('attendances.index')->with('success', __('attendances.messages.bulk_recorded'));
    }
}
