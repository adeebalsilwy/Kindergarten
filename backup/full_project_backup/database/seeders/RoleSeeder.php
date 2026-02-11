<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Permissions
        $permissions = [
            'view users',
            'create users',
            'edit users',
            'delete users',
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            'view products',
            'create products',
            'edit products',
            'delete products',
            'view finance',
            'view reports',
        ];

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission);
        }

        // Create Roles and assign created permissions

        // 1. Administrator
        $adminRole = Role::findOrCreate('Administrator');
        $adminRole->givePermissionTo(Permission::all());

        // 2. Principal
        $principalRole = Role::findOrCreate('Principal');
        $principalRole->givePermissionTo([
            'view users', 'view reports', 'view finance',
            'view products', 'create products', 'edit products',
        ]);

        // 3. Teacher
        $teacherRole = Role::findOrCreate('Teacher');
        $teacherRole->givePermissionTo([
            'view products',
        ]);

        // 4. Parent
        $parentRole = Role::findOrCreate('Parent');

        // 5. Staff
        $staffRole = Role::findOrCreate('Staff');

        // 6. Accountant
        $accountantRole = Role::findOrCreate('Accountant');
        $accountantRole->givePermissionTo(['view finance', 'view reports']);

        // Create Demo Users

        // Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@kindercare.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $admin->assignRole($adminRole);

        // Principal
        $principal = User::firstOrCreate(
            ['email' => 'principal@kindercare.com'],
            [
                'name' => 'Principal AI-Ali',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $principal->assignRole($principalRole);

        // Accountant
        $accountant = User::firstOrCreate(
            ['email' => 'accountant@kindercare.com'],
            [
                'name' => 'Accountant Yamen',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $accountant->assignRole($accountantRole);

        // Staff
        $staff = User::firstOrCreate(
            ['email' => 'staff@kindercare.com'],
            [
                'name' => 'Staff User',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $staff->assignRole($staffRole);

        // Parent
        $parent = User::firstOrCreate(
            ['email' => 'parent@kindercare.com'],
            [
                'name' => 'Parent User',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $parent->assignRole($parentRole);

        $this->command->info('Roles and seed users created!');
    }
}
