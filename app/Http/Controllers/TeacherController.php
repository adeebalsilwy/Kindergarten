<?php

namespace App\Http\Controllers;

use OmarAlalwi\Gpdf\Facade\Gpdf;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Services\TeacherService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TeacherController extends Controller
{
    protected $service;

    public function __construct(TeacherService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $this->authorize('view_teachers');
        $query = $this->service->query()->with(['classes', 'user']);

        if (method_exists($query->getModel(), 'scopeFilter')) {
            $query->filter($request->all());
        }

        // Handle export functionality
        if ($request->has('export')) {
            return $this->export($request->get('export'), $query);
        }

        $teachers = $query->paginate(15)->withQueryString();

        return view('pages.teachers.index', compact('teachers'));
    }

    /**
     * Export data to different formats
     */
    protected function export($format, $query)
    {
        $this->authorize('export_teachers');
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
        $html = view('pages.teachers.export-pdf', ['data' => $data])->render();
        
        return response()->streamDownload(function () use ($html) {
            echo Gpdf::generate($html);
        }, 'Teacher_export_'.date('Y-m-d_H-i-s').'.pdf');
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
        $sheet->setTitle(__('teachers.title'));
        $sheet->setCellValue('A1', __('teachers.title'));
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Prepare headers
        $headers = [];
        if ($data->count() > 0) {
            $firstItem = $data->first();
            foreach ($firstItem->getAttributes() as $key => $value) {
                if (! in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                    $headers[] = __('teachers.fields.'.$key);
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
        $fileName = 'Teacher_export_'.date('Y-m-d_H-i-s').'.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }

    public function create()
    {
        $this->authorize('create_teachers');
        
        $users = \App\Models\User::all();

        return view('pages.teachers.create', compact('users'));
    }

    public function store(StoreTeacherRequest $request)
    {
        $this->authorize('create_teachers');
        $data = $request->validated();

        // Handle photo_path file upload
        if ($request->hasFile('photo_path') && $request->file('photo_path')->isValid()) {
            $path = $request->file('photo_path')->store('photos/teachers', 'public');
            $data['photo_path'] = $path;
        } else {
            unset($data['photo_path']);
        }

        $this->service->create($data);

        return redirect()->route('teachers.index')->with('success', __('teachers.messages.created'));
    }

    public function accountStatement($id)
    {
        $this->authorize('view_teachers');
        $teacher = $this->service->find($id);
        
        // Teachers usually have salary or expenses, not student payments
        // For now, let's just return empty entries to avoid errors in the view
        $accountStatement = [
            'entries' => [],
            'account_name' => $teacher->name,
            'final_balance' => 0
        ];
        
        return view('pages.teachers.account-statement', compact('teacher', 'accountStatement'));
    }

    public function show($id)
    {
        $this->authorize('view_teachers');
        $teacher = $this->service->find($id);
        
        // Load all related data for the enhanced show page
        $teacher->load([
            'user',
            'classes.children',
            'classes.activities',
            'classes.events',
            'classes.teacher',
            'activities.class',
            'activities.children',
            'events.class',
            'events.children'
        ]);
        
        // Manually load curriculum data to avoid relationship issues
        $teacher->setRelation('curriculum', $teacher->user_id ? 
            \App\Models\Curriculum::where('created_by', $teacher->user_id)->with(['activities', 'classes'])->get() : collect());

        return view('pages.teachers.show', compact('teacher'));
    }

    public function edit($id)
    {
        $this->authorize('edit_teachers');
        $teacher = $this->service->find($id);
        
        $users = \App\Models\User::all();

        return view('pages.teachers.edit', compact('teacher', 'users'));
    }

    public function update(UpdateTeacherRequest $request, $id)
    {
        $this->authorize('edit_teachers');
        $data = $request->validated();

        // Handle photo_path file upload
        if ($request->hasFile('photo_path') && $request->file('photo_path')->isValid()) {
            $teacher = $this->service->find($id);
            
            // Delete old photo if exists
            if ($teacher->photo_path && Storage::disk('public')->exists($teacher->photo_path)) {
                Storage::disk('public')->delete($teacher->photo_path);
            }
            
            $path = $request->file('photo_path')->store('photos/teachers', 'public');
            $data['photo_path'] = $path;
        } else {
            unset($data['photo_path']);
        }

        $this->service->update($id, $data);

        return redirect()->route('teachers.index')->with('success', __('teachers.messages.updated'));
    }

    public function destroy($id)
    {
        $this->authorize('delete_teachers');
        $this->service->delete($id);

        return redirect()->route('teachers.index')->with('success', __('teachers.messages.deleted'));
    }

    public function exportPdf()
    {
        $this->authorize('export_teachers');
        $query = $this->service->query()->with(['classes', 'user']);

        // Apply filters
        $request = request();
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('phone', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('qualification', 'LIKE', '%' . $request->search . '%');
            });
        }
        
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }
        
        if ($request->filled('employment_status')) {
            $query->where('employment_status', $request->employment_status);
        }
        
        if ($request->filled('joining_date_from')) {
            $query->where('joining_date', '>=', $request->joining_date_from);
        }
        
        if ($request->filled('joining_date_to')) {
            $query->where('joining_date', '<=', $request->joining_date_to);
        }

        $data = $query->get();
        return $this->exportToPdf($data);
    }

    public function exportExcel()
    {
        $this->authorize('export_teachers');
        $query = $this->service->query()->with(['classes', 'user']);

        // Apply filters
        $request = request();
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('phone', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('qualification', 'LIKE', '%' . $request->search . '%');
            });
        }
        
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }
        
        if ($request->filled('employment_status')) {
            $query->where('employment_status', $request->employment_status);
        }
        
        if ($request->filled('joining_date_from')) {
            $query->where('joining_date', '>=', $request->joining_date_from);
        }
        
        if ($request->filled('joining_date_to')) {
            $query->where('joining_date', '<=', $request->joining_date_to);
        }

        $data = $query->get();
        return $this->exportToExcel($data);
    }
}
