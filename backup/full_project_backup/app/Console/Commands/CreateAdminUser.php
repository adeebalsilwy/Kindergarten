<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin-user {--name=} {--email=} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin user with Administrator role';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->option('name') ?? $this->ask('Enter name for the admin user');
        $email = $this->option('email') ?? $this->ask('Enter email for the admin user');
        $password = $this->option('password') ?? $this->secret('Enter password for the admin user');

        // Validate inputs
        if (! $name || ! $email || ! $password) {
            $this->error('All fields (name, email, password) are required.');

            return 1;
        }

        // Create user
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        // Assign Administrator role
        $adminRole = Role::where('name', 'Administrator')->first();
        if ($adminRole) {
            $user->assignRole($adminRole);
            $this->info("Admin user {$name} created successfully with Administrator role.");
        } else {
            $this->error('Administrator role not found. Please run the role seeder first.');

            return 1;
        }

        return 0;
    }
}
