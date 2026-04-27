<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->user->assignRole('Administrator');
    }

    public function test_index_returns_view_with_teachers()
    {
        $response = $this->actingAs($this->user)
            ->get(route('teachers.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.teachers.index');
    }

    public function test_index_returns_paginated_teachers()
    {
        Teacher::factory()->count(20)->create();

        $response = $this->actingAs($this->user)
            ->get(route('teachers.index'));

        $response->assertStatus(200);
        $response->assertViewHas('teachers');
    }

    public function test_create_returns_view()
    {
        $response = $this->actingAs($this->user)
            ->get(route('teachers.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.teachers.create');
        $response->assertViewHas('users');
    }

    public function test_store_creates_new_teacher()
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'Test Teacher',
            'email' => 'teacher@example.com',
            'phone' => '1234567890',
            'qualification' => 'Bachelor',
            'specialization' => 'Mathematics',
            'experience_years' => 5,
            'user_id' => $user->id,
        ];

        $response = $this->actingAs($this->user)
            ->post(route('teachers.store'), $data);

        $response->assertRedirect(route('teachers.index'));
        $this->assertDatabaseHas('teachers', [
            'name' => 'Test Teacher',
            'email' => 'teacher@example.com',
        ]);
    }

    public function test_show_returns_view_with_teacher()
    {
        $teacher = Teacher::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('teachers.show', $teacher->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.teachers.show');
        $response->assertViewHas('teacher', $teacher);
    }

    public function test_edit_returns_view_with_teacher()
    {
        $teacher = Teacher::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('teachers.edit', $teacher->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.teachers.edit');
        $response->assertViewHas('teacher', $teacher);
        $response->assertViewHas('users');
    }

    public function test_update_modifies_teacher()
    {
        $teacher = Teacher::factory()->create();
        $user = User::factory()->create();

        $data = [
            'name' => 'Updated Teacher Name',
            'email' => 'updated@example.com',
            'phone' => '0987654321',
            'qualification' => 'Master',
            'specialization' => 'Science',
            'experience_years' => 8,
            'user_id' => $user->id,
        ];

        $response = $this->actingAs($this->user)
            ->put(route('teachers.update', $teacher->id), $data);

        $response->assertRedirect(route('teachers.index'));
        $this->assertDatabaseHas('teachers', [
            'id' => $teacher->id,
            'name' => 'Updated Teacher Name',
        ]);
    }

    public function test_destroy_removes_teacher()
    {
        $teacher = Teacher::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('teachers.destroy', $teacher->id));

        $response->assertRedirect(route('teachers.index'));
        $this->assertSoftDeleted('teachers', [
            'id' => $teacher->id,
            'name' => $teacher->name,
        ]);
    }

    public function test_unauthorized_user_cannot_access_teachers_routes()
    {
        $userWithoutPermission = User::factory()->create();
        
        $response = $this->actingAs($userWithoutPermission)
            ->get(route('teachers.index'));

        $response->assertForbidden();
    }

    public function test_account_statement_returns_view()
    {
        $teacher = Teacher::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('teachers.account-statement', $teacher->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.teachers.account-statement');
    }

    public function test_export_functionality_pdf()
    {
        Teacher::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('teachers.export.pdf'));

        $response->assertStatus(200);
    }

    public function test_export_functionality_excel()
    {
        Teacher::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('teachers.export.excel'));

        $response->assertStatus(200);
    }

    public function test_pagination_works()
    {
        Teacher::factory()->count(30)->create();

        $response = $this->actingAs($this->user)
            ->get(route('teachers.index'));

        $response->assertStatus(200);
        $teachers = $response->viewData('teachers');
        
        $this->assertCount(15, $teachers->items());
        $this->assertEquals(30, $teachers->total());
    }
}
