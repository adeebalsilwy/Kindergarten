<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Curriculum;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CurriculumControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->user->assignRole('Administrator');
    }

    public function test_index_returns_view_with_curricula()
    {
        $response = $this->actingAs($this->user)
            ->get(route('curricula.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.curricula.index');
    }

    public function test_index_returns_paginated_curricula()
    {
        Curriculum::factory()->count(20)->create();

        $response = $this->actingAs($this->user)
            ->get(route('curricula.index'));

        $response->assertStatus(200);
        $response->assertViewHas('curricula');
    }

    public function test_create_returns_view()
    {
        $response = $this->actingAs($this->user)
            ->get(route('curricula.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.curricula.create');
    }

    public function test_store_creates_new_curriculum()
    {
        $class = Classes::factory()->create();

        $data = [
            'name' => 'Mathematics Curriculum',
            'description' => 'Math curriculum for grade 1',
            'class_id' => $class->id,
            'status' => 'active',
        ];

        $response = $this->actingAs($this->user)
            ->post(route('curricula.store'), $data);

        $response->assertRedirect(route('curricula.index'));
        $this->assertDatabaseHas('curricula', [
            'name' => 'Mathematics Curriculum',
            'class_id' => $class->id,
        ]);
    }

    public function test_show_returns_view_with_curriculum()
    {
        $curriculum = Curriculum::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('curricula.show', $curriculum->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.curricula.show');
    }

    public function test_edit_returns_view_with_curriculum()
    {
        $curriculum = Curriculum::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('curricula.edit', $curriculum->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.curricula.edit');
    }

    public function test_update_modifies_curriculum()
    {
        $curriculum = Curriculum::factory()->create();
        $class = Classes::factory()->create();

        $data = [
            'name' => 'Updated Curriculum',
            'description' => 'Updated description',
            'class_id' => $class->id,
            'status' => 'completed',
        ];

        $response = $this->actingAs($this->user)
            ->put(route('curricula.update', $curriculum->id), $data);

        $response->assertRedirect(route('curricula.index'));
        $this->assertDatabaseHas('curricula', [
            'id' => $curriculum->id,
            'name' => 'Updated Curriculum',
        ]);
    }

    public function test_destroy_removes_curriculum()
    {
        $curriculum = Curriculum::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('curricula.destroy', $curriculum->id));

        $response->assertRedirect(route('curricula.index'));
        $this->assertSoftDeleted('curricula', [
            'id' => $curriculum->id,
        ]);
    }

    public function test_unauthorized_user_cannot_access_curricula_routes()
    {
        $userWithoutPermission = User::factory()->create();
        
        $response = $this->actingAs($userWithoutPermission)
            ->get(route('curricula.index'));

        $response->assertForbidden();
    }

    public function test_export_functionality_pdf()
    {
        Curriculum::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('curricula.export.pdf'));

        $response->assertStatus(200);
    }

    public function test_export_functionality_excel()
    {
        Curriculum::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('curricula.export.excel'));

        $response->assertStatus(200);
    }

    public function test_pagination_works()
    {
        Curriculum::factory()->count(30)->create();

        $response = $this->actingAs($this->user)
            ->get(route('curricula.index'));

        $response->assertStatus(200);
    }
}
