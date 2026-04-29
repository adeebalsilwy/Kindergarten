<?php

namespace App\Http\Controllers;

use OmarAlalwi\Gpdf\Facade\Gpdf;

use App\Http\Requests\StoreGuardianRequest;
use App\Http\Requests\UpdateGuardianRequest;
use App\Services\GuardianService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class GuardianController extends Controller
{
    protected $service;

    public function __construct(GuardianService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $this->authorize('view_guardians');
        $query = $this->service->query()->with(['children', 'secondChildren']);

        // Apply filters
        if ($request->has('search') || $request->has('is_active')) {
            // Apply search filter
            if ($request->filled('search')) {
                $query->where(function($q) use ($request) {
                    $q->where('name', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('phone', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('address', 'LIKE', '%' . $request->search . '%')
                      ->orWhere('relationship', 'LIKE', '%' . $request->search . '%');
                });
            }
            
            // Apply active status filter
            if ($request->filled('is_active')) {
                $query->where('is_active', $request->is_active);
            }
        }

        // Handle export functionality
        if ($request->has('export')) {
            return $this->export($request->get('export'), $query);
        }

        $parents = $query->paginate(15)->withQueryString();

        // Calculate statistics - rebuild query to avoid clone issues
        $statsQuery = $this->service->query()->with(['children', 'secondChildren']);

        // Apply same filters to stats query
        if ($request->filled('search')) {
            $statsQuery->where(function($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('phone', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('address', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('relationship', 'LIKE', '%' . $request->search . '%');
            });
        }

        if ($request->filled('is_active')) {
            $statsQuery->where('is_active', $request->is_active);
        }

        $totalActive = (clone $statsQuery)->where('is_active', true)->count();
        $totalGuardians = $parents->total();

        // Calculate total children from filtered guardians
        $filteredGuardians = $statsQuery->get();
        $totalChildren = $filteredGuardians->sum(function($guardian) {
            return $guardian->children()->count() + $guardian->secondChildren()->count();
        });

        // Calculate additional statistics for the view
        $primaryGuardians = $filteredGuardians->where('relationship_type', 'father')->count() + 
                           $filteredGuardians->where('relationship_type', 'mother')->count();
        $contactableGuardians = $filteredGuardians->whereNotNull('phone')->count();

        return view('pages.guardians.index', compact('parents', 'totalActive', 'totalChildren', 'totalGuardians', 'primaryGuardians', 'contactableGuardians'));
    }

    /**
     * Export data to different formats
     */
    protected function export($format, $query)
    {
        $this->authorize('export_guardians');
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
        $html = view('pages.guardians.export-pdf', ['data' => $data])->render();
        
        return response()->streamDownload(function () use ($html) {
            echo Gpdf::generate($html);
        }, 'Guardian_export_'.date('Y-m-d_H-i-s').'.pdf');
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
        $sheet->setTitle(__('guardians.title'));
        $sheet->setCellValue('A1', __('guardians.title'));
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Prepare headers
        $headers = [];
        if ($data->count() > 0) {
            $firstItem = $data->first();
            foreach ($firstItem->getAttributes() as $key => $value) {
                if (! in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                    $headers[] = __('guardians.fields.'.$key);
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
        $fileName = 'Guardian_export_'.date('Y-m-d_H-i-s').'.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }

    public function create()
    {
        $this->authorize('create_guardians');

        return view('pages.guardians.create', get_defined_vars());
    }

    public function store(StoreGuardianRequest $request)
    {
        $this->authorize('create_guardians');
        $this->service->create($request->validated());

        return redirect()->route('guardians.index')->with('success', __('guardians.messages.created'));
    }

    public function accountStatement($id)
    {
        $this->authorize('view_guardians');
        $guardian = $this->service->find($id);
        $children_ids = $guardian->children()->pluck('id')->merge($guardian->secondChildren()->pluck('id'))->unique();
        $payments = \App\Models\Payment::whereIn('child_id', $children_ids)->with(['child', 'fee'])->orderBy('payment_date')->get();
        
        $entries = [];
        $balance = 0;
        
        foreach ($payments as $payment) {
            $debit = 0;
            $credit = $payment->amount;
            $balance += $credit - $debit;
            
            $entries[] = [
                'date' => $payment->payment_date,
                'description' => $payment->child->name . ' - ' . ($payment->fee->name ?? __('global.general_fee')),
                'debit' => $debit,
                'credit' => $credit,
                'balance' => $balance
            ];
        }
        
        $accountStatement = [
            'entries' => $entries,
            'account_name' => $guardian->name,
            'final_balance' => $balance
        ];
        
        return view('pages.guardians.account-statement', compact('guardian', 'accountStatement'));
    }

    public function show($id)
    {
        $this->authorize('view_guardians');
        $parents = $this->service->find($id);
        
        // Load all related data for the enhanced show page
        $parents->load([
            'children',
            'secondChildren',
            'children.class',
            'children.attendances',
            'children.grades',
            'children.payments',
            'children.activities',
            'children.events'
        ]);

        return view('pages.guardians.show', compact('parents'));
    }

    public function edit($id)
    {
        $this->authorize('edit_guardians');
        $parents = $this->service->find($id);

        return view('pages.guardians.edit', get_defined_vars());
    }

    public function update(UpdateGuardianRequest $request, $id)
    {
        $this->authorize('edit_guardians');
        $this->service->update($id, $request->validated());

        return redirect()->route('guardians.index')->with('success', __('guardians.messages.updated'));
    }

    public function destroy($id)
    {
        $this->authorize('delete_guardians');
        $this->service->delete($id);

        return redirect()->route('guardians.index')->with('success', __('guardians.messages.deleted'));
    }
}