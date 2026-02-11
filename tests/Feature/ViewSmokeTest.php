<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ViewSmokeTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Seed the database
        $this->seed();
        
        // Create an admin user if not exists (RoleSeeder creates one but let's be sure)
        $this->admin = User::where('email', 'admin@kindercare.com')->first();
        if (!$this->admin) {
             $role = Role::firstOrCreate(['name' => 'Administrator']);
             $this->admin = User::factory()->create(['email' => 'admin@kindercare.com']);
             $this->admin->assignRole($role);
        }
    }

    /**
     * Test that all main index pages are loadable.
     */
    public function test_main_pages_are_loadable(): void
    {
        $this->actingAs($this->admin);

        $routes = [
            '/',
            '/dashboard',
            '/users',
            '/users/create',
            '/teachers',
            '/teachers/create',
            '/children',
            '/children/create',
            '/classes',
            '/classes/create',
            '/parents',
            '/parents/create',
            '/fees',
            '/fees/create',
            '/accounting-entries',
            '/accounting-entries/create',
            '/reports',
            '/activities',
            '/permissions',
            '/permissions/create',
            '/roles',
            '/roles/create',
            '/curriculums',
            '/curriculums/create',
            '/events',
            '/events/create',
            '/guardians',
            '/guardians/create',
            '/jobs',
            '/jobs/create',
            '/languages',
            '/languages/create',
            '/payments',
            '/payments/create',
            '/financial-reports',
            '/expenses',
            '/expenses/create',
            '/dashboard-contents',
            '/dashboard-contents/create',
            '/command-logs',
            '/backups',
            '/api-manager',
            '/monitoring',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            
            // Check if status is 200
            if ($response->status() !== 200) {
                echo "\nFailed Route: " . $route . " Status: " . $response->status();
                if ($response->status() === 500) {
                     echo "\nError: " . $response->exception->getMessage();
                }
            }

            $response->assertStatus(200);
        }
    }
}
