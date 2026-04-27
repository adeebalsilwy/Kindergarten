<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Classes;
use App\Models\Teacher;
use App\Models\GradeLevel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClassesControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->user->assignRole('Administrator');
    }

    public function test_index_returns_view_with_classes()
    {
        $response = $this->actingAs($this->user)
            ->get(route('classes.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.classes.index');
    }

    public function test_index_returns_paginated_classes()
    {
        Classes::factory()->count(20)->create();

        $response = $this->actingAs($this->user)
            ->get(route('classes.index'));

        $response->assertStatus(200);
        $response->assertViewHas('classes');
    }

    public function test_create_returns_view()
    {
        $response = $this->actingAs($this->user)
            ->get(route('classes.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.classes.create');
        $response->assertViewHas(['teachers', 'gradeLevels']);
    }

    public function test_store_creates_new_class()
    {
        $teacher = Teacher::factory()->create();
        $gradeLevel = GradeLevel::factory()->create();

        $data = [
            'name' => 'Test Class',
            'code' => 'TC101',
            'description' => 'A test class description',
            'teacher_id' => $teacher->id,
            'grade_level_id' => $gradeLevel->id,
            'capacity' => 20,
            'is_active' => true,
        ];

        $response = $this->actingAs($this->user)
            ->post(route('classes.store'), $data);

        $response->assertRedirect(route('classes.index'));
        $this->assertDatabaseHas('classes', [
            'name' => 'Test Class',
            'code' => 'TC101',
        ]);
    }

    public function test_show_returns_view_with_class()
    {
        $class = Classes::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('classes.show', $class->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.classes.show');
        $response->assertViewHas('classes', $class);
    }

    public function test_edit_returns_view_with_class()
    {
        $class = Classes::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('classes.edit', $class->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.classes.edit');
        $response->assertViewHas('classes', $class);
        $response->assertViewHas(['teachers', 'gradeLevels']);
    }

    public function test_update_modifies_class()
    {
        $class = Classes::factory()->create();
        $teacher = Teacher::factory()->create();
        $gradeLevel = GradeLevel::factory()->create();

        $data = [
            'name' => 'Updated Class Name',
            'code' => 'UC202',
            'description' => 'Updated description',
            'teacher_id' => $teacher->id,
            'grade_level_id' => $gradeLevel->id,
            'capacity' => 25,
            'is_active' => true,
        ];

        $response = $this->actingAs($this->user)
            ->put(route('classes.update', $class->id), $data);

        $response->assertRedirect(route('classes.index'));
        $this->assertDatabaseHas('classes', [
            'id' => $class->id,
            'name' => 'Updated Class Name',
        ]);
    }

    public function test_destroy_removes_class()
    {
        $class = Classes::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('classes.destroy', $class->id));

        $response->assertRedirect(route('classes.index'));
        $this->assertSoftDeleted('classes', [
            'id' => $class->id,
            'name' => $class->name,
        ]);
    }

    public function test_unauthorized_user_cannot_access_classes_routes()
    {
        $userWithoutPermission = User::factory()->create();
        
        $response = $this->actingAs($userWithoutPermission)
            ->get(route('classes.index'));

        $response->assertForbidden();
    }

    public function test_export_functionality_pdf()
    {
        Classes::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('classes.export.pdf'));

        $response->assertStatus(200);
    }

    public function test_export_functionality_excel()
    {
        Classes::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('classes.export.excel'));

        $response->assertStatus(200);
    }

    public function test_pagination_works()
    {
        Classes::factory()->count(30)->create();

        $response = $this->actingAs($this->user)
            ->get(route('classes.index'));

        $response->assertStatus(200);
        $classes = $response->viewData('classes');
        
        $this->assertCount(15, $classes->items());
        $this->assertEquals(30, $classes->total());
    }

    public function test_search_filter_works()
    {
        Classes::factory()->create(['name' => 'Special Class']);
        Classes::factory()->create(['name' => 'Regular Class']);

        $response = $this->actingAs($this->user)
            ->get(route('classes.index', ['search' => 'Special']));

        $response->assertStatus(200);
    }

    public function test_teacher_filter_works()
    {
        $teacher = Teacher::factory()->create();
        Classes::factory()->create(['teacher_id' => $teacher->id]);

        $response = $this->actingAs($this->user)
            ->get(route('classes.index', ['teacher_id' => $teacher->id]));

        $response->assertStatus(200);
    }
}
