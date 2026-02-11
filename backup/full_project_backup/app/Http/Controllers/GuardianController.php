<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuardianRequest;
use App\Http\Requests\UpdateGuardianRequest;
use App\Services\GuardianService;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $query = $this->service->query()->when($request->get('q'), function ($q, $qstr) {
            $q->where(function ($qq) use ($qstr) {
                $qq->where('name', 'like', "%{$qstr}%")
                    ->orWhere('phone', 'like', "%{$qstr}%")
                    ->orWhere('email', 'like', "%{$qstr}%")
                    ->orWhere('address', 'like', "%{$qstr}%");
            });
        });

        // Handle export functionality
        if ($request->has('export')) {
            return $this->export($request->get('export'), $query);
        }

        $parents = $query->paginate(15);

        return view('pages.guardians.index', compact('parents'));
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

    public function exportPdf()
    {
        $this->authorize('export_guardians');
        $data = $this->service->query()->get();

        return $this->exportToPdf($data);
    }

    public function exportExcel()
    {
        $this->authorize('export_guardians');
        $data = $this->service->query()->get();

        return $this->exportToExcel($data);
    }

    /**
     * Export to PDF
     */
    protected function exportToPdf($data)
    {
        $pdf = Pdf::loadView('pages.guardians.export-pdf', ['data' => $data]);

        return $pdf->download('Guardian_export_'.date('Y-m-d_H-i-s').'.pdf');
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
        $fileName = 'Guardian_export_'.date('Y-m-d_H-i-s').'.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }

    public function create()
    {
        $this->authorize('create_guardians');
        $children = \App\Models\Children::select('id', 'name')->orderBy('name')->get();

        return view('pages.guardians.create', compact('children'));
    }

    public function store(StoreGuardianRequest $request)
    {
        $this->authorize('create_guardians');
        $this->service->create($request->validated());

        return redirect()->route('guardians.index')->with('success', __('guardians.messages.created'));
    }

    public function show($id)
    {
        $this->authorize('view_guardians');
        $parents = \App\Models\Guardian::with(['children.class'])->findOrFail($id);

        return view('pages.guardians.show', compact('parents'));
    }

    public function edit($id)
    {
        $this->authorize('edit_guardians');
        $parents = $this->service->find($id);
        $children = \App\Models\Children::select('id', 'name')->orderBy('name')->get();
        $selectedChildren = $parents->children->pluck('id')->toArray();

        return view('pages.guardians.edit', compact('parents', 'children', 'selectedChildren'));
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
