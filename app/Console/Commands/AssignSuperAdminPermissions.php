<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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
    protected $description = 'Assign all permissions to Role ID 1 (Administrator)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $roleId = 1;
        $role = Role::find($roleId);

        if (! $role) {
            $this->error("Role with ID $roleId not found!");

            return;
        }

        $this->info("Found role: {$role->name} (ID: {$role->id})");

        $permissions = Permission::all();
        $this->info("Found {$permissions->count()} permissions.");

        $role->syncPermissions($permissions);

        $this->info("Successfully assigned all permissions to role: {$role->name}");
    }
}
