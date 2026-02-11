<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions for different modules
        $permissions = [
            // Finance module permissions
            'view finance reports',
            'manage accounting entries',
            'view trial balance',
            'view general ledger',
            'export financial reports',

            // Children module permissions
            'view children',
            'create children',
            'edit children',
            'delete children',

            // Parents module permissions
            'view parents',
            'create parents',
            'edit parents',
            'delete parents',

            // Teachers module permissions
            'view teachers',
            'create teachers',
            'edit teachers',
            'delete teachers',

            // Classes module permissions
            'view classes',
            'create classes',
            'edit classes',
            'delete classes',

            // Attendance module permissions
            'view attendance',
            'take attendance',
            'edit attendance',

            // Grades module permissions
            'view grades',
            'enter grades',
            'edit grades',

            // Fees module permissions
            'view fees',
            'set fees',
            'waive fees',

            // Payments module permissions
            'view payments',
            'record payments',
            'edit payments',

            // Expenses module permissions
            'view expenses',
            'create expenses',
            'edit expenses',
            'delete expenses',

            // Admin permissions
            'view users',
            'create users',
            'edit users',
            'delete users',
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            'view permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',
            'view system settings',
            'manage system',

            // Product/Inventory permissions
            'view products',
            'create products',
            'edit products',
            'delete products',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
