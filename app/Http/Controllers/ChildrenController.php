<?php

namespace App\Http\Controllers;

use OmarAlalwi\Gpdf\Facade\Gpdf;

use App\Http\Requests\StoreChildrenRequest;
use App\Http\Requests\UpdateChildrenRequest;
use App\Services\ChildrenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ChildrenController extends Controller
{
    protected $service;

    public function __construct(ChildrenService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $this->authorize('view_children');
        $query = $this->service->query()->with(['parent', 'secondParent', 'class']);

        // Apply filters
        if ($request->has('search') || $request->has('class_id') || $request->has('enrollment_status')) {
            // Apply search filter
            if ($request->filled('search')) {
                $query->where(function($q) use ($request) {
                    $q->where('name', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('emergency_contact_name', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('emergency_contact_phone', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('nationality', 'LIKE', '%' . $request->search . '%');
                });
            }
            
            // Apply class filter
            if ($request->filled('class_id')) {
                $query->where('class_id', $request->class_id);
            }
            
            // Apply enrollment status filter
            if ($request->filled('enrollment_status')) {
                $query->where('enrollment_status', $request->enrollment_status);
            }
        }

        // Handle export functionality
        if ($request->has('export')) {
            return $this->export($request->get('export'), $query);
        }

        $childrens = $query->paginate(15)->withQueryString();
        $classes = \App\Models\Classes::select('id', 'name')->orderBy('name')->get();

        // Calculate statistics for the filtered results - rebuild query for accurate stats
        $statsQuery = $this->service->query();

        // Apply same filters to stats query
        if ($request->filled('search')) {
            $statsQuery->where(function($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('emergency_contact_name', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('emergency_contact_phone', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('nationality', 'LIKE', '%' . $request->search . '%');
            });
        }

        if ($request->filled('class_id')) {
            $statsQuery->where('class_id', $request->class_id);
        }

        if ($request->filled('enrollment_status')) {
            $statsQuery->where('enrollment_status', $request->enrollment_status);
        }

        $totalActive = (clone $statsQuery)->where('enrollment_status', 'active')->count();
        $totalOutstanding = (clone $statsQuery)->sum('fees_required') - (clone $statsQuery)->sum('fees_paid');

        $totalClasses = \App\Models\Classes::count();

        // Calculate today's attendance percentage
        $todayAttendanceQuery = \App\Models\Attendance::whereDate('date', now());
        if ($request->filled('class_id')) {
            $todayAttendanceQuery->whereIn('child_id', function($q) use ($request) {
                $q->select('id')->from('children')->where('class_id', $request->class_id);
            });
        }
        $todayAttendance = $todayAttendanceQuery->count();
        $totalChildrenToday = clone $todayAttendanceQuery;
        $totalChildrenToday = $totalChildrenToday->selectRaw('COUNT(DISTINCT child_id)')->first()->aggregate ?? 0;
        $todayAttendanceRate = $totalChildrenToday > 0 ? round(($todayAttendance / $totalChildrenToday) * 100, 2) : 0;

        return view('pages.children.index', compact('childrens', 'classes', 'totalActive', 'totalOutstanding', 'totalClasses', 'todayAttendanceRate'));
    }

    /**
     * Export data to different formats
     */
    protected function export($format, $query)
    {
        $this->authorize('export_children');
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
        $html = view('pages.children.export-pdf', ['data' => $data])->render();
        
        return response()->streamDownload(function () use ($html) {
            echo Gpdf::generate($html);
        }, 'Children_export_'.date('Y-m-d_H-i-s').'.pdf');
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
        $sheet->setTitle(__('children.title'));
        $sheet->setCellValue('A1', __('children.title'));
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Prepare headers
        $headers = [];
        if ($data->count() > 0) {
            $firstItem = $data->first();
            foreach ($firstItem->getAttributes() as $key => $value) {
                if (! in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                    $headers[] = __('children.fields.'.$key);
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
        $fileName = 'Children_export_'.date('Y-m-d_H-i-s').'.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }

    public function create()
    {
        $this->authorize('create_children');

        $classes = \App\Models\Classes::select('id', 'name')->orderBy('name')->get();
        $parents = \App\Models\Guardian::select('id', 'name')->orderBy('name')->get();

        return view('pages.children.create', compact('classes', 'parents'));
    }

    public function store(StoreChildrenRequest $request)
    {
        $this->authorize('create_children');
        $data = $request->validated();

        // Handle photo_path file upload
        if ($request->hasFile('photo_path') && $request->file('photo_path')->isValid()) {
            $path = $request->file('photo_path')->store('photos/children', 'public');
            $data['photo_path'] = $path;
        } else {
            unset($data['photo_path']);
        }

        $this->service->create($data);

        return redirect()->route('children.index')->with('success', __('children.messages.created'));
    }

    public function accountStatement($id)
    {
        $this->authorize('view_children');
        $child = $this->service->find($id);
        $payments = \App\Models\Payment::where('child_id', $id)->with('fee')->orderBy('payment_date')->get();
        
        $entries = [];
        $balance = 0;
        
        foreach ($payments as $payment) {
            $debit = 0; // Fees are usually debits (what they owe), but here payments are credits (what they paid)
            $credit = $payment->amount;
            $balance += $credit - $debit;
            
            $entries[] = [
                'date' => $payment->payment_date,
                'description' => __('payments.fields.payment_for') . ': ' . ($payment->fee->name ?? __('global.general_fee')),
                'debit' => $debit,
                'credit' => $credit,
                'balance' => $balance
            ];
        }
        
        $accountStatement = [
            'entries' => $entries,
            'account_name' => $child->name,
            'final_balance' => $balance
        ];
        
        return view('pages.children.account-statement', compact('child', 'accountStatement'));
    }

    public function show($id)
    {
        $this->authorize('view_children');
        $children = $this->service->find($id);
        
        // Load all related data for the enhanced show page
        $children->load([
            'parent',
            'secondParent',
            'class.teacher',
            'attendances',
            'grades.evaluator',
            'payments.fee',
            'activities',
            'events',
            'class.children',
            'class.activities',
            'class.events',
            'class.teacher.classes',
            'class.teacher.activities',
            'class.teacher.events',
            'parent.children',
            'secondParent.children'
        ]);

        return view('pages.children.show', compact('children'));
    }

    public function edit($id)
    {
        $this->authorize('edit_children');
        $children = $this->service->find($id);
        $classes = \App\Models\Classes::select('id', 'name')->orderBy('name')->get();
        $parents = \App\Models\Guardian::select('id', 'name')->orderBy('name')->get();

        return view('pages.children.edit', compact('children', 'classes', 'parents'));
    }

    public function update(UpdateChildrenRequest $request, $id)
    {
        $this->authorize('edit_children');
        $data = $request->validated();

        // Handle photo_path file upload
        if ($request->hasFile('photo_path') && $request->file('photo_path')->isValid()) {
            $child = $this->service->find($id);
            
            // Delete old photo if exists
            if ($child->photo_path && Storage::disk('public')->exists($child->photo_path)) {
                Storage::disk('public')->delete($child->photo_path);
            }
            
            $path = $request->file('photo_path')->store('photos/children', 'public');
            $data['photo_path'] = $path;
        } else {
            unset($data['photo_path']);
        }

        $this->service->update($id, $data);

        return redirect()->route('children.index')->with('success', __('children.messages.updated'));
    }

    public function destroy($id)
    {
        $this->authorize('delete_children');
        $this->service->delete($id);

        return redirect()->route('children.index')->with('success', __('children.messages.deleted'));
    }

    public function exportPdf(Request $request)
    {
        $this->authorize('export_children');
        
        $query = $this->service->query()->with(['parent', 'secondParent', 'class']);

        // Apply filters
        if ($request->has('search') || $request->has('class_id') || $request->has('enrollment_status')) {
            // Apply search filter
            if ($request->filled('search')) {
                $query->where(function($q) use ($request) {
                    $q->where('name', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('emergency_contact_name', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('emergency_contact_phone', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('nationality', 'LIKE', '%' . $request->search . '%');
                });
            }
            
            // Apply class filter
            if ($request->filled('class_id')) {
                $query->where('class_id', $request->class_id);
            }
            
            // Apply enrollment status filter
            if ($request->filled('enrollment_status')) {
                $query->where('enrollment_status', $request->enrollment_status);
            }
        }

        $data = $query->get();
        
        return $this->exportToPdf($data);
    }

    public function exportExcel(Request $request)
    {
        $this->authorize('export_children');
        
        $query = $this->service->query()->with(['parent', 'secondParent', 'class']);

        // Apply filters
        if ($request->has('search') || $request->has('class_id') || $request->has('enrollment_status')) {
            // Apply search filter
            if ($request->filled('search')) {
                $query->where(function($q) use ($request) {
                    $q->where('name', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('emergency_contact_name', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('emergency_contact_phone', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('nationality', 'LIKE', '%' . $request->search . '%');
                });
            }
            
            // Apply class filter
            if ($request->filled('class_id')) {
                $query->where('class_id', $request->class_id);
            }
            
            // Apply enrollment status filter
            if ($request->filled('enrollment_status')) {
                $query->where('enrollment_status', $request->enrollment_status);
            }
        }

        $data = $query->get();
        
        return $this->exportToExcel($data);
    }
}