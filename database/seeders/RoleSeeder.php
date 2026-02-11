<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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

        // Create Roles
        $adminRole = Role::firstOrCreate(['name' => 'Administrator']);
        $principalRole = Role::firstOrCreate(['name' => 'Principal']);
        $teacherRole = Role::firstOrCreate(['name' => 'Teacher']);
        $parentRole = Role::firstOrCreate(['name' => 'Parent']);
        $staffRole = Role::firstOrCreate(['name' => 'Staff']);
        $accountantRole = Role::firstOrCreate(['name' => 'Accountant']);

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
