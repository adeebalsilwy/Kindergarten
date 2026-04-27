<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Grade;
use App\Models\Children;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GradeControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->user->assignRole('Administrator');
    }

    public function test_index_returns_view_with_grades()
    {
        $response = $this->actingAs($this->user)
            ->get(route('grades.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.grades.index');
    }

    public function test_index_returns_paginated_grades()
    {
        Grade::factory()->count(20)->create();

        $response = $this->actingAs($this->user)
            ->get(route('grades.index'));

        $response->assertStatus(200);
        $response->assertViewHas('grades');
    }

    public function test_create_returns_view()
    {
        $response = $this->actingAs($this->user)
            ->get(route('grades.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.grades.create');
    }

    public function test_store_creates_new_grade()
    {
        $child = Children::factory()->create();
        $class = Classes::factory()->create();

        $data = [
            'child_id' => $child->id,
            'class_id' => $class->id,
            'subject' => 'Mathematics',
            'grade' => 85.50,
            'grade_type' => 'exam',
            'date' => now()->format('Y-m-d'),
            'comments' => 'Good performance',
        ];

        $response = $this->actingAs($this->user)
            ->post(route('grades.store'), $data);

        $response->assertRedirect(route('grades.index'));
        $this->assertDatabaseHas('grades', [
            'child_id' => $child->id,
            'subject' => 'Mathematics',
            'grade' => 85.50,
        ]);
    }

    public function test_show_returns_view_with_grade()
    {
        $grade = Grade::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('grades.show', $grade->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.grades.show');
    }

    public function test_edit_returns_view_with_grade()
    {
        $grade = Grade::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('grades.edit', $grade->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.grades.edit');
    }

    public function test_update_modifies_grade()
    {
        $grade = Grade::factory()->create();
        $child = Children::factory()->create();
        $class = Classes::factory()->create();

        $data = [
            'child_id' => $child->id,
            'class_id' => $class->id,
            'subject' => 'Science',
            'grade' => 92.00,
            'grade_type' => 'quiz',
            'date' => now()->format('Y-m-d'),
            'comments' => 'Excellent work',
        ];

        $response = $this->actingAs($this->user)
            ->put(route('grades.update', $grade->id), $data);

        $response->assertRedirect(route('grades.index'));
        $this->assertDatabaseHas('grades', [
            'id' => $grade->id,
            'subject' => 'Science',
            'grade' => 92.00,
        ]);
    }

    public function test_destroy_removes_grade()
    {
        $grade = Grade::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('grades.destroy', $grade->id));

        $response->assertRedirect(route('grades.index'));
        $this->assertSoftDeleted('grades', [
            'id' => $grade->id,
        ]);
    }

    public function test_unauthorized_user_cannot_access_grades_routes()
    {
        $userWithoutPermission = User::factory()->create();
        
        $response = $this->actingAs($userWithoutPermission)
            ->get(route('grades.index'));

        $response->assertForbidden();
    }

    public function test_export_functionality_pdf()
    {
        Grade::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('grades.export.pdf'));

        $response->assertStatus(200);
    }

    public function test_export_functionality_excel()
    {
        Grade::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('grades.export.excel'));

        $response->assertStatus(200);
    }

    public function test_pagination_works()
    {
        Grade::factory()->count(30)->create();

        $response = $this->actingAs($this->user)
            ->get(route('grades.index'));

        $response->assertStatus(200);
    }
}
