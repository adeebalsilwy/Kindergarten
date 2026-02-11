<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Children;
use App\Models\Classes;
use App\Models\Guardian;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class ChildrenControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create a user with appropriate permissions
        $this->user = User::factory()->create();
        
        // Give the user a role that has children permissions (assuming administrator for testing)
        $this->user->assignRole('Administrator');
    }

    public function test_index_returns_view_with_children()
    {
        $response = $this->actingAs($this->user)
            ->get(route('children.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.children.index');
    }

    public function test_index_returns_paginated_children()
    {
        Children::factory()->count(20)->create();

        $response = $this->actingAs($this->user)
            ->get(route('children.index'));

        $response->assertStatus(200);
        $response->assertViewHas('childrens');
    }

    public function test_create_returns_view()
    {
        $response = $this->actingAs($this->user)
            ->get(route('children.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.children.create');
        $response->assertViewHas(['classes', 'parents']);
    }

    public function test_store_creates_new_children()
    {
        $class = Classes::factory()->create();
        $parent = Guardian::factory()->create();

        $data = [
            'name' => 'Test Child',
            'dob' => '2020-01-01',
            'gender' => 'male',
            'class_id' => $class->id,
            'parent_id' => $parent->id,
            'fees_required' => 1000.00,
            'fees_paid' => 500.00,
        ];

        $response = $this->actingAs($this->user)
            ->post(route('children.store'), $data);

        $response->assertRedirect(route('children.index'));
        $this->assertDatabaseHas('children', [
            'name' => 'Test Child',
            'gender' => 'male',
            'class_id' => $class->id,
            'parent_id' => $parent->id,
        ]);
    }

    public function test_show_returns_view_with_children()
    {
        $children = Children::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('children.show', $children->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.children.show');
        $response->assertViewHas('children', $children);
    }

    public function test_edit_returns_view_with_children()
    {
        $children = Children::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('children.edit', $children->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.children.edit');
        $response->assertViewHas('children', $children);
        $response->assertViewHas(['classes', 'parents']);
    }

    public function test_update_modifies_children()
    {
        $children = Children::factory()->create();
        $class = Classes::factory()->create();
        $parent = Guardian::factory()->create();

        $data = [
            'name' => 'Updated Child Name',
            'dob' => '2020-01-01',
            'gender' => 'female',
            'class_id' => $class->id,
            'parent_id' => $parent->id,
            'fees_required' => 1200.00,
            'fees_paid' => 600.00,
        ];

        $response = $this->actingAs($this->user)
            ->put(route('children.update', $children->id), $data);

        $response->assertRedirect(route('children.index'));
        $this->assertDatabaseHas('children', [
            'id' => $children->id,
            'name' => 'Updated Child Name',
            'gender' => 'female',
        ]);
    }

    public function test_destroy_removes_children()
    {
        $children = Children::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('children.destroy', $children->id));

        $response->assertRedirect(route('children.index'));
        $this->assertSoftDeleted('children', [
            'id' => $children->id,
            'name' => $children->name,
        ]);
    }

    public function test_unauthorized_user_cannot_access_children_routes()
    {
        $userWithoutPermission = User::factory()->create();
        
        // Don't assign any role to simulate unauthorized access
        
        $response = $this->actingAs($userWithoutPermission)
            ->get(route('children.index'));

        $response->assertForbidden();
    }

    public function test_export_functionality_pdf()
    {
        Children::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('children.index') . '?export=pdf');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
    }

    public function test_export_functionality_excel()
    {
        Children::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('children.index') . '?export=excel');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }

    public function test_pagination_works()
    {
        Children::factory()->count(30)->create();

        $response = $this->actingAs($this->user)
            ->get(route('children.index'));

        $response->assertStatus(200);
        $childrens = $response->viewData('childrens');
        
        // Assuming default pagination is 15 per page
        $this->assertCount(15, $childrens->items());
        $this->assertEquals(30, $childrens->total());
    }

    public function test_view_contains_correct_data()
    {
        $children = Children::factory()->create();
        $class = Classes::factory()->create();
        $parent = Guardian::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('children.show', $children->id));

        $response->assertStatus(200);
        $viewChildren = $response->viewData('children');
        
        $this->assertEquals($children->id, $viewChildren->id);
        $this->assertEquals($children->name, $viewChildren->name);
    }
}