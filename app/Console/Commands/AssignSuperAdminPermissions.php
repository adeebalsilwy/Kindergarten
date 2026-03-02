<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignSuperAdminPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:assign-super-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign all permissions to Administrator/Super Admin roles and ensure demo admins can access everything';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Ensure base permissions exist (fallback if not seeded yet)
        if (Permission::count() === 0) {
            $this->info('No permissions found. Seeding base permissions...');
            try {
                $this->call('db:seed', ['--class' => 'Database\\Seeders\\PermissionSeeder', '--force' => true]);
            } catch (\Throwable $e) {
                $this->warn('Permission seeder failed or not available: '.$e->getMessage());
            }
        }

        // Ensure target roles exist
        $adminRole = Role::firstOrCreate(['name' => 'Administrator'], ['guard_name' => 'web']);
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin'], ['guard_name' => 'web']);

        $this->info("Syncing permissions to roles: {$adminRole->name}, {$superAdminRole->name}");

        $permissions = Permission::all();
        $this->info("Found {$permissions->count()} permissions to sync.");

        $adminRole->syncPermissions($permissions);
        $superAdminRole->syncPermissions($permissions);

        // Optional: In demo mode, make sure demo admin accounts have the correct roles
        $demo = (bool) (config('app.demo') ?? env('APP_DEMO', true));
        if ($demo) {
            $this->info('Demo mode is enabled — checking demo admin accounts.');
            $demoAdmins = [
                ['email' => 'admin@kindergarten.ye', 'role' => 'Administrator'],
                ['email' => 'admin@nursery.ye', 'role' => 'Administrator'],
                ['email' => 'superadmin@nursery.ye', 'role' => 'Super Admin'],
            ];
            foreach ($demoAdmins as $acc) {
                $user = \App\Models\User::where('email', $acc['email'])->first();
                if ($user) {
                    if (! $user->hasRole($acc['role'])) {
                        $user->assignRole($acc['role']);
                        $this->info("Assigned role '{$acc['role']}' to {$acc['email']}.");
                    }
                }
            }
        }

        $this->info('Successfully assigned all permissions to Administrator and Super Admin roles.');
    }
}
