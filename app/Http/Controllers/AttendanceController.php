<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Children;
use App\Models\Classes;
use Illuminate\Http\Request;
use App\Services\AttendanceService;

class AttendanceController extends Controller
{
    protected $service;

    public function __construct(AttendanceService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $this->authorize('view_attendances');
        $query = $this->service->query()->with(['child', 'child.class']);

        // Apply filters
        if ($request->filled('search')) {
            $query->whereHas('child', function($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%');
            });
        }
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        if ($request->filled('class_id')) {
            $query->whereHas('child', function($q) use ($request) {
                $q->where('class_id', $request->class_id);
            });
        }
        
        if ($request->filled('child_id')) {
            $query->where('child_id', $request->child_id);
        }
        
        if ($request->filled('date_from')) {
            $query->where('date', '>=', $request->date_from);
        }
        
        if ($request->filled('date_to')) {
            $query->where('date', '<=', $request->date_to);
        }

        // Handle export functionality
        if ($request->has('export')) {
            return $this->export($request->get('export'), $query);
        }

        $attendances = $query->paginate(15)->withQueryString();
        $classes = Classes::all();
        $children = Children::select('id', 'name')->orderBy('name')->get();

        // Statistics
        $today = now()->format('Y-m-d');
        $todayAttendanceCount = Attendance::whereDate('date', $today)->where('status', 'present')->count();
        $todayAbsentCount = Attendance::whereDate('date', $today)->where('status', 'absent')->count();
        $todayLateCount = Attendance::whereDate('date', $today)->where('status', 'late')->count();
        $todayExcusedCount = Attendance::whereDate('date', $today)->where('status', 'excused')->count();
        
        $totalChildren = Children::count();
        $attendanceRate = $totalChildren > 0 ? round(($todayAttendanceCount / $totalChildren) * 100) : 0;

        return view('pages.attendances.index', compact(
            'attendances', 
            'classes', 
            'children',
            'todayAttendanceCount', 
            'todayAbsentCount', 
            'todayLateCount', 
            'todayExcusedCount',
            'attendanceRate'
        ));
    }

    public function create()
    {
        $this->authorize('create_attendances');
        $children = Children::all();
        $attendance = new Attendance();

        return view('pages.attendances.create', compact('children', 'attendance'));
    }

    public function bulk(Request $request)
    {
        $this->authorize('create_attendances');
        $classes = Classes::all();
        $class_id = $request->get('class_id');
        $date = $request->get('date', date('Y-m-d'));

        $childrens = [];
        if ($class_id) {
            $childrens = Children::where('class_id', $class_id)->get();
        }

        return view('pages.attendances.bulk', compact('classes', 'childrens', 'class_id', 'date'));
    }

    public function bulkStore(Request $request)
    {
        $this->authorize('create_attendances');
        $data = $request->validate([
            'date' => 'required|date',
            'attendance' => 'required|array',
            'attendance.*.status' => 'required|in:present,absent,late,excused',
            'attendance.*.notes' => 'nullable|string',
        ]);

        foreach ($data['attendance'] as $childId => $attendanceData) {
            Attendance::updateOrCreate(
                ['child_id' => $childId, 'date' => $data['date']],
                ['status' => $attendanceData['status'], 'notes' => $attendanceData['notes'] ?? null]
            );
        }

        return redirect()->route('attendances.index')->with('success', __('global.attendance_recorded_successfully'));
    }

    public function store(Request $request)
    {
        $this->authorize('create_attendances');
        $data = $request->validate([
            'child_id' => 'required|exists:children,id',
            'date' => 'required|date',
            'status' => 'required|in:present,absent,late,excused',
            'notes' => 'nullable|string',
            'check_in' => 'nullable',
            'check_out' => 'nullable',
        ]);

        $this->service->create($data);

        return redirect()->route('attendances.index')->with('success', __('global.created_successfully'));
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
        $children = Children::all();

        return view('pages.attendances.edit', compact('attendance', 'children'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit_attendances');
        $data = $request->validate([
            'status' => 'required|in:present,absent,late,excused',
            'notes' => 'nullable|string',
            'check_in' => 'nullable',
            'check_out' => 'nullable',
        ]);

        $this->service->update($id, $data);

        return redirect()->route('attendances.index')->with('success', __('global.updated_successfully'));
    }

    public function destroy($id)
    {
        $this->authorize('delete_attendances');
        $this->service->delete($id);

        return redirect()->route('attendances.index')->with('success', __('global.deleted_successfully'));
    }

    public function exportPdf()
    {
        $this->authorize('view_attendances');
        $query = $this->service->query()->with(['child', 'child.class']);

        // Apply filters similar to index method
        $request = request();
        if ($request->filled('search')) {
            $query->whereHas('child', function($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%');
            });
        }
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        if ($request->filled('class_id')) {
            $query->whereHas('child', function($q) use ($request) {
                $q->where('class_id', $request->class_id);
            });
        }
        
        if ($request->filled('child_id')) {
            $query->where('child_id', $request->child_id);
        }
        
        if ($request->filled('date_from')) {
            $query->where('date', '>=', $request->date_from);
        }
        
        if ($request->filled('date_to')) {
            $query->where('date', '<=', $request->date_to);
        }

        return $this->exportToPdf($query->get());
    }

    public function exportExcel()
    {
        $this->authorize('view_attendances');
        $query = $this->service->query()->with(['child', 'child.class']);

        // Apply filters similar to index method
        $request = request();
        if ($request->filled('search')) {
            $query->whereHas('child', function($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%');
            });
        }
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        if ($request->filled('class_id')) {
            $query->whereHas('child', function($q) use ($request) {
                $q->where('class_id', $request->class_id);
            });
        }
        
        if ($request->filled('child_id')) {
            $query->where('child_id', $request->child_id);
        }
        
        if ($request->filled('date_from')) {
            $query->where('date', '>=', $request->date_from);
        }
        
        if ($request->filled('date_to')) {
            $query->where('date', '<=', $request->date_to);
        }

        return $this->exportToExcel($query->get());
    }

    protected function export($type, $query)
    {
        if ($type == 'pdf') {
            return $this->exportToPdf($query->get());
        } elseif ($type == 'excel') {
            return $this->exportToExcel($query->get());
        }
    }

    protected function exportToPdf($data)
    {
        $html = view('pages.attendances.export-pdf', ['data' => $data])->render();
        
        return response()->streamDownload(function () use ($html) {
            echo \OmarAlalwi\Gpdf\Facades\Gpdf::generate($html);
        }, 'Attendance_export_'.date('Y-m-d_H-i-s').'.pdf');
    }

    protected function exportToExcel($data)
    {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        if (\Illuminate\Support\Facades\App::getLocale() == 'ar') {
            $sheet->setRightToLeft(true);
        }

        $sheet->setTitle(__('global.attendance_records'));
        
        // Simple Excel export logic for brevity, can be expanded like PaymentController
        $sheet->setCellValue('A1', __('global.student'));
        $sheet->setCellValue('B1', __('global.class'));
        $sheet->setCellValue('C1', __('global.date'));
        $sheet->setCellValue('D1', __('global.status'));

        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A'.$row, $item->child->name);
            $sheet->setCellValue('B'.$row, $item->child->class->name);
            $sheet->setCellValue('C'.$row, $item->date);
            $sheet->setCellValue('D'.$row, __('global.'.$item->status));
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $fileName = 'Attendance_export_'.date('Y-m-d_H-i-s').'.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }
}
