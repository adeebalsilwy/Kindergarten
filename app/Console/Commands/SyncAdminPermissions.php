<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SyncAdminPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-admin-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync all permissions to administrator roles';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define all the permissions that exist or need to be created
        $allPermissions = [
            // Existing permissions
            'view finance reports', 'manage accounting entries', 'view trial balance', 
            'view general ledger', 'export financial reports', 'view children', 
            'create children', 'edit children', 'delete children', 'view parents', 
            'create parents', 'edit parents', 'delete parents', 'view teachers', 
            'create teachers', 'edit teachers', 'delete teachers', 'view classes', 
            'create classes', 'edit classes', 'delete classes', 'view attendance', 
            'take attendance', 'edit attendance', 'view grades', 'enter grades', 
            'edit grades', 'view fees', 'set fees', 'waive fees', 'view payments', 
            'record payments', 'edit payments', 'view expenses', 'create expenses', 
            'edit expenses', 'delete expenses', 'view users', 'create users', 
            'edit users', 'delete users', 'view roles', 'create roles', 
            'edit roles', 'delete roles', 'view permissions', 'create permissions', 
            'edit permissions', 'delete permissions', 'view system settings', 
            'manage system', 'view products', 'create products', 'edit products', 
            'delete products',
            
            // New permissions from controllers
            'view_accounting_entries', 'create_accounting_entries', 'edit_accounting_entries', 
            'delete_accounting_entries', 'export_accounting_entries',
            
            'view_activities', 'create_activities', 'edit_activities', 
            'delete_activities', 'export_activities',
            
            'view_attendances', 'create_attendances', 'edit_attendances', 
            'delete_attendances', 'export_attendances',
            
            'view_curricula', 'create_curricula', 'edit_curricula', 
            'delete_curricula', 'export_curricula',
            
            'view_events', 'create_events', 'edit_events', 
            'delete_events', 'export_events',
            
            'view_materials', 'create_materials', 'edit_materials', 
            'delete_materials', 'export_materials',
            
            'view_reports', 'create_reports', 'edit_reports', 
            'delete_reports', 'export_reports',
            
            'view_test_models', 'create_test_models', 'edit_test_models', 
            'delete_test_models', 'export_test_models',
            
            'view_teachers', 'create_teachers', 'edit_teachers', 
            'delete_teachers', 'export_teachers',
            
            'view_users', 'create_users', 'edit_users', 
            'delete_users', 'export_users',
            
            'view_permissions', 'create_permissions', 'edit_permissions', 
            'delete_permissions', 'export_permission',
            
            'view_parents', 'create_parents', 'edit_parents', 
            'delete_parents', 'export_parents',
            
            'view_payments', 'create_payments', 'edit_payments', 
            'delete_payments', 'export_payments',
            
            'view_children', 'create_children', 'edit_children', 
            'delete_children', 'export_children',
            
            'view_classes', 'create_classes', 'edit_classes', 
            'delete_classes', 'export_classes',
            
            'view_expenses', 'create_expenses', 'edit_expenses', 
            'delete_expenses', 'export_expenses',
            
            'view_fees', 'create_fees', 'edit_fees', 
            'delete_fees', 'export_fees',
            
            'view_grades', 'create_grades', 'edit_grades', 
            'delete_grades', 'export_grades',
            
            'view_guardians', 'create_guardians', 'edit_guardians', 
            'delete_guardians', 'export_guardians',
            
            'view_class_enrollments', 'create_class_enrollments', 'edit_class_enrollments', 
            'delete_class_enrollments', 'export_class_enrollments',
        ];

        // Create any missing permissions
        foreach ($allPermissions as $permissionName) {
            \Spatie\Permission\Models\Permission::firstOrCreate(['name' => $permissionName]);
        }

        // Get all permissions after creating missing ones
        $permissionsCollection = \Spatie\Permission\Models\Permission::all();
        
        // Define administrator role names (English only)
        $adminRoleNames = [
            'Administrator',      // English admin
            'Principal',          // Principal
            'Teacher',            // Teacher
            'Parent',             // Parent
            'Accountant',         // Accountant
            'Staff',              // Staff
            'Super Admin',        // Super Admin
        ];
        
        // Remove old Arabic roles if they exist
        $oldArabicRoles = [
            'مدير النظام',
            'المدير', 
            'معلم',
            'أولياء الأمور',
            'محاسب',
            'طاقم العمل',
            'الإدارة العليا'
        ];
        
        foreach ($oldArabicRoles as $oldRole) {
            $role = \Spatie\Permission\Models\Role::where('name', $oldRole)->first();
            if ($role) {
                $role->delete();
                $this->info("Removed old Arabic role: {$oldRole}");
            }
        }

        $updatedRolesCount = 0;

        foreach ($adminRoleNames as $roleName) {
            $role = \Spatie\Permission\Models\Role::firstOrCreate(['name' => $roleName]);
            
            // Sync all permissions to this role
            $role->syncPermissions($permissionsCollection);
            
            $this->info("Synced {$permissionsCollection->count()} permissions to role: {$roleName}");
            $updatedRolesCount++;
        }

        // Also ensure the superadmin user has the correct role
        $superAdmin = \App\Models\User::where('email', 'superadmin@nursery.ye')->first();
        if ($superAdmin) {
            // Check if superadmin has any admin role
            $hasAdminRole = false;
            foreach ($adminRoleNames as $roleName) {
                if ($superAdmin->hasRole($roleName)) {
                    $hasAdminRole = true;
                    break;
                }
            }
            
            if (!$hasAdminRole) {
                $superAdmin->assignRole('Super Admin');
                $this->info("Assigned 'Super Admin' role to superadmin user");
            }
        }

        $this->info("Successfully synchronized permissions to {$updatedRolesCount} administrator roles.");
    }
}