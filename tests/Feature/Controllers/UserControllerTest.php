<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->user->assignRole('Administrator');
    }

    public function test_index_returns_view_with_users()
    {
        $response = $this->actingAs($this->user)
            ->get(route('users.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.users.index');
    }

    public function test_index_returns_paginated_users()
    {
        User::factory()->count(20)->create();

        $response = $this->actingAs($this->user)
            ->get(route('users.index'));

        $response->assertStatus(200);
        $response->assertViewHas('users');
    }

    public function test_create_returns_view()
    {
        $response = $this->actingAs($this->user)
            ->get(route('users.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.users.create');
        $response->assertViewHas(['roles', 'groupedPermissions']);
    }

    public function test_store_creates_new_user()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->actingAs($this->user)
            ->post(route('users.store'), $data);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
        ]);
    }

    public function test_show_returns_view_with_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('users.show', $user->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.users.show');
        $response->assertViewHas('user', $user);
    }

    public function test_edit_returns_view_with_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('users.edit', $user->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.users.edit');
        $response->assertViewHas('user', $user);
        $response->assertViewHas(['roles', 'groupedPermissions', 'userRoles', 'userPermissions']);
    }

    public function test_update_modifies_user()
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'Updated User Name',
            'email' => 'updated@example.com',
        ];

        $response = $this->actingAs($this->user)
            ->put(route('users.update', $user->id), $data);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated User Name',
        ]);
    }

    public function test_destroy_removes_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('users.destroy', $user->id));

        $response->assertRedirect(route('users.index'));
        $this->assertSoftDeleted('users', [
            'id' => $user->id,
            'name' => $user->name,
        ]);
    }

    public function test_toggle_status()
    {
        $targetUser = User::factory()->create(['is_active' => true]);

        $response = $this->actingAs($this->user)
            ->post(route('users.toggle-status', $targetUser->id));

        $response->assertOk();
        $response->assertJson(['success' => true]);
        $this->assertFalse($targetUser->fresh()->is_active);
    }

    public function test_toggle_verification()
    {
        $targetUser = User::factory()->create(['email_verified_at' => null]);

        $response = $this->actingAs($this->user)
            ->post(route('users.toggle-verification', $targetUser->id));

        $response->assertOk();
        $response->assertJson(['success' => true]);
        $this->assertNotNull($targetUser->fresh()->email_verified_at);
    }

    public function test_change_password()
    {
        $targetUser = User::factory()->create();

        $response = $this->actingAs($this->user)
            ->post(route('users.change-password', $targetUser->id), [
                'password' => 'newpassword123',
                'password_confirmation' => 'newpassword123',
            ]);

        $response->assertRedirect();
    }

    public function test_assign_role()
    {
        $targetUser = User::factory()->create();
        $role = \Spatie\Permission\Models\Role::first();

        $response = $this->actingAs($this->user)
            ->post(route('users.assign-role', $targetUser->id), [
                'role_id' => $role->id,
            ]);

        $response->assertRedirect();
        $this->assertTrue($targetUser->fresh()->hasRole($role->name));
    }

    public function test_unauthorized_user_cannot_access_users_routes()
    {
        $userWithoutPermission = User::factory()->create();
        
        $response = $this->actingAs($userWithoutPermission)
            ->get(route('users.index'));

        $response->assertForbidden();
    }

    public function test_export_functionality_pdf()
    {
        User::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('users.export.pdf'));

        $response->assertStatus(200);
    }

    public function test_export_functionality_excel()
    {
        User::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('users.export.excel'));

        $response->assertStatus(200);
    }

    public function test_pagination_works()
    {
        User::factory()->count(30)->create();

        $response = $this->actingAs($this->user)
            ->get(route('users.index'));

        $response->assertStatus(200);
        $users = $response->viewData('users');
        
        $this->assertCount(15, $users->items());
        $this->assertEquals(30, $users->total());
    }
}
