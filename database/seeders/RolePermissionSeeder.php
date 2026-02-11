<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all roles
        $adminRole = Role::where('name', 'Administrator')->first();
        $principalRole = Role::where('name', 'Principal')->first();
        $teacherRole = Role::where('name', 'Teacher')->first();
        $accountantRole = Role::where('name', 'Accountant')->first();
        $parentRole = Role::where('name', 'Parent')->first();
        $staffRole = Role::where('name', 'Staff')->first();

        // Administrator gets all permissions
        $allPermissions = Permission::all();
        $adminRole->syncPermissions($allPermissions);

        // Principal gets management permissions
        $principalPermissions = [
            'view finance reports',
            'view trial balance',
            'view general ledger',
            'export financial reports',
            'view children',
            'view parents',
            'view teachers',
            'view classes',
            'view attendance',
            'view grades',
            'view fees',
            'view payments',
            'view expenses',
            'manage system',
            // Added from RoleSeeder migration
            'view users',
            'view products',
            'create products',
            'edit products',
        ];
        $principalRole->syncPermissions($principalPermissions);

        // Teacher gets class/student management permissions
        $teacherPermissions = [
            'view children',
            'view classes',
            'view attendance',
            'take attendance',
            'view grades',
            'enter grades',
            // Added from RoleSeeder migration
            'view products',
        ];
        $teacherRole->syncPermissions($teacherPermissions);

        // Accountant gets financial permissions
        $accountantPermissions = [
            'view finance reports',
            'manage accounting entries',
            'view trial balance',
            'view general ledger',
            'export financial reports',
            'view fees',
            'view payments',
            'record payments',
            'view expenses',
            'create expenses',
            // Added inventory visibility
            'view products',
        ];
        $accountantRole->syncPermissions($accountantPermissions);

        // Parent gets limited view permissions
        $parentPermissions = [
            'view children',
            'view grades',
            'view payments',
        ];
        $parentRole->syncPermissions($parentPermissions);

        // Staff gets basic operational permissions
        $staffPermissions = [
            'view children',
            'view parents',
            'view teachers',
            'view classes',
            'view attendance',
            'take attendance',
        ];
        $staffRole->syncPermissions($staffPermissions);
    }
}
