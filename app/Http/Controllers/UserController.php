<?php

namespace App\Http\Controllers;

use OmarAlalwi\Gpdf\Facade\Gpdf;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function toggleStatus(Request $request, User $user)
    {
        $this->authorize('edit_users');
        
        $user->is_active = !$user->is_active;
        $user->save();

        return response()->json([
            'success' => true,
            'is_active' => $user->is_active,
            'message' => __('global.messages.status_updated_successfully')
        ]);
    }

    public function toggleVerification(Request $request, User $user)
    {
        $this->authorize('edit_users');
        
        if ($user->email_verified_at) {
            $user->email_verified_at = null;
        } else {
            $user->email_verified_at = now();
        }
        $user->save();

        return response()->json([
            'success' => true,
            'is_verified' => (bool)$user->email_verified_at,
            'message' => __('global.messages.verification_updated_successfully')
        ]);
    }

    public function changePassword(Request $request, User $user)
    {
        $this->authorize('edit_users');
        
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', __('global.messages.password_changed_successfully'));
    }

    public function index(Request $request)
    {
        $this->authorize('view_users');
        $query = $this->service->query();

        // Apply filters
        if (method_exists($query->getModel(), 'scopeFilter')) {
            $query->filter($request->all());
        }

        // Handle export functionality
        if ($request->has('export')) {
            return $this->export($request->get('export'), $query);
        }

        $users = $query->paginate(15)->withQueryString();

        return view('pages.users.index', compact('users'));
    }

    /**
     * Export data to different formats
     */
    protected function export($format, $query)
    {
        $this->authorize('export_users');
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
        $html = view('pages.users.export-pdf', ['data' => $data])->render();
        
        return response()->streamDownload(function () use ($html) {
            echo Gpdf::generate($html);
        }, 'User_export_'.date('Y-m-d_H-i-s').'.pdf');
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
        $sheet->setTitle(__('users.title'));
        $sheet->setCellValue('A1', __('users.title'));
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Prepare headers
        $headers = [];
        if ($data->count() > 0) {
            $firstItem = $data->first();
            foreach ($firstItem->getAttributes() as $key => $value) {
                if (! in_array($key, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                    $headers[] = __('users.fields.'.$key);
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
        $fileName = 'User_export_'.date('Y-m-d_H-i-s').'.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $fileName);
    }

    public function create()
    {
        $this->authorize('create_users');
        
        $roles = \Spatie\Permission\Models\Role::all();
        $permissions = \Spatie\Permission\Models\Permission::all();
        $groupedPermissions = $permissions->groupBy(function($p) {
            $parts = explode('_', $p->name);
            return count($parts) >= 2 ? $parts[1] : 'other';
        });

        return view('pages.users.create', compact('roles', 'groupedPermissions'));
    }

    public function store(StoreUserRequest $request)
    {
        $this->authorize('create_users');
        
        try {
            $data = $request->validated();
            $data['password'] = \Illuminate\Support\Facades\Hash::make($data['password']);
            $data['is_active'] = true;
            $data['email_verified_at'] = now();
            
            $user = $this->service->create($data);
            
            // Sync roles - convert to integers
            if ($request->has('roles') && is_array($request->roles)) {
                $roleIds = array_map('intval', $request->roles);
                $user->syncRoles($roleIds);
            } elseif (!$request->has('roles')) {
                // Assign default Teacher role if no roles selected
                $teacherRole = \Spatie\Permission\Models\Role::where('name', 'Teacher')->first();
                if ($teacherRole) {
                    $user->assignRole($teacherRole);
                }
            }
            
            // Sync permissions - convert to integers
            if ($request->has('permissions') && is_array($request->permissions)) {
                $permissionIds = array_map('intval', $request->permissions);
                $user->syncPermissions($permissionIds);
            }

            return redirect()->route('users.index')->with('success', __('users.messages.created'));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error creating user: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', __('global.messages.error') . ': ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $this->authorize('view_users');
        $user = $this->service->find($id);
        
        // Load all related data for the enhanced show page
        $user->load([
            'roles',
            'permissions'
        ]);

        $allRoles = \Spatie\Permission\Models\Role::all();

        return view('pages.users.show', compact('user', 'allRoles'));
    }

    public function edit($id)
    {
        $this->authorize('edit_users');
        $user = $this->service->find($id);
        
        $roles = \Spatie\Permission\Models\Role::all();
        $permissions = \Spatie\Permission\Models\Permission::all();
        $groupedPermissions = $permissions->groupBy(function($p) {
            $parts = explode('_', $p->name);
            return count($parts) >= 2 ? $parts[1] : 'other';
        });

        $userRoles = $user->roles->pluck('id')->toArray();
        $userPermissions = $user->permissions->pluck('id')->toArray();

        return view('pages.users.edit', compact('user', 'roles', 'groupedPermissions', 'userRoles', 'userPermissions'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $this->authorize('edit_users');
        
        try {
            $data = $request->validated();
            
            if (empty($data['password'])) {
                unset($data['password']);
            } else {
                $data['password'] = \Illuminate\Support\Facades\Hash::make($data['password']);
            }

            $data['is_active'] = $request->has('is_active');
            
            // Handle email_verified_at based on request
            if ($request->has('email_verified')) {
                $data['email_verified_at'] = now();
            } else {
                $data['email_verified_at'] = null;
            }
            
            $user = $this->service->update($id, $data);
            
            // Sync roles - convert to integers
            if ($request->has('roles') && is_array($request->roles)) {
                $roleIds = array_map('intval', $request->roles);
                $user->syncRoles($roleIds);
            }
            // If no roles submitted, keep existing roles (don't remove them)
            
            // Sync permissions - convert to integers  
            if ($request->has('permissions') && is_array($request->permissions)) {
                $permissionIds = array_map('intval', $request->permissions);
                $user->syncPermissions($permissionIds);
            }
            // If no permissions submitted, keep existing permissions (don't remove them)

            return redirect()->route('users.index')->with('success', __('users.messages.updated'));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error updating user: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', __('global.messages.error') . ': ' . $e->getMessage());
        }
    }

    public function assignRole(Request $request, $id)
    {
        $this->authorize('edit_users');
        
        $request->validate([
            'role_id' => 'required|exists:roles,id'
        ]);

        try {
            $user = $this->service->find($id);
            $role = \Spatie\Permission\Models\Role::findById($request->role_id);
            
            $user->assignRole($role);

            return redirect()->back()->with('success', __('global.messages.role_assigned_successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('global.messages.error') . ': ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $this->authorize('delete_users');
        $this->service->delete($id);

        return redirect()->route('users.index')->with('success', __('users.messages.deleted'));
    }

    public function exportPdf(Request $request)
    {
        $this->authorize('view_users');
        $users = $this->service->all();
        $html = view('pages.users.export-pdf', compact('users'))->render();
        
        return response()->streamDownload(function () use ($html) {
            echo \OmarAlalwi\Gpdf\Facade\Gpdf::generate($html);
        }, 'users_export_'.date('Y-m-d').'.pdf');
    }
}
