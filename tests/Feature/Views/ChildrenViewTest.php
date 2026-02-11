<?php

namespace Tests\Feature\Views;

use Tests\TestCase;
use App\Models\Children;
use App\Models\Classes;
use App\Models\Guardian;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChildrenViewTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->user->assignRole('Administrator');
    }

    public function test_children_index_view_contains_expected_elements()
    {
        $children = Children::factory()->count(3)->create();

        $response = $this->actingAs($this->user)
            ->get(route('children.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.children.index');
        
        // Check if the view contains expected elements
        $response->assertSee('Children Management', false);
        $response->assertSee('Name', false);
        $response->assertSee('Date of Birth', false);
        $response->assertSee('Gender', false);
        $response->assertSee('Class', false);
        
        // Check if children data is present in the view
        foreach ($children as $child) {
            $response->assertSee(e($child->name));
        }
    }

    public function test_children_create_view_contains_form_elements()
    {
        $response = $this->actingAs($this->user)
            ->get(route('children.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.children.create');
        
        // Check for form elements
        $response->assertSee('Create New Child', false);
        $response->assertSee('Name', false);
        $response->assertSee('Date of Birth', false);
        $response->assertSee('Gender', false);
        $response->assertSee('Class', false);
        $response->assertSee('Parent', false);
        
        // Check for form inputs
        $response->assertSee('input type="text"', false);
        $response->assertSee('input type="date"', false);
        $response->assertSee('select', false);
        $response->assertSee('input type="submit"', false);
    }

    public function test_children_edit_view_contains_form_with_existing_data()
    {
        $children = Children::factory()->create();
        $class = Classes::factory()->create();
        $parent = Guardian::factory()->create();

        // Update the child to have the created class and parent
        $children->update([
            'class_id' => $class->id,
            'parent_id' => $parent->id
        ]);

        $response = $this->actingAs($this->user)
            ->get(route('children.edit', $children->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.children.edit');
        
        // Check if existing data is populated in the form
        $response->assertSee(e($children->name));
        $response->assertSee($children->dob->format('Y-m-d'));
        $response->assertSee('value="' . $children->gender . '"', false);
    }

    public function test_children_show_view_displays_details()
    {
        $children = Children::factory()->create([
            'name' => 'John Doe',
            'gender' => 'male',
            'fees_required' => 1000.00,
            'fees_paid' => 500.00,
        ]);

        $class = Classes::factory()->create(['name' => 'Kindergarten A']);
        $parent = Guardian::factory()->create(['name' => 'Jane Doe']);

        $children->update([
            'class_id' => $class->id,
            'parent_id' => $parent->id
        ]);

        $response = $this->actingAs($this->user)
            ->get(route('children.show', $children->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.children.show');
        
        // Check if child details are displayed
        $response->assertSee('Child Details', false);
        $response->assertSee(e($children->name));
        $response->assertSee(e($children->gender));
        $response->assertSee(e($class->name));
        $response->assertSee(e($parent->name));
        $response->assertSee(number_format($children->fees_required, 2));
        $response->assertSee(number_format($children->fees_paid, 2));
        $response->assertSee(number_format($children->balance, 2));
    }

    public function test_children_index_view_has_create_button()
    {
        $response = $this->actingAs($this->user)
            ->get(route('children.index'));

        $response->assertStatus(200);
        
        // Check for create button or link
        $response->assertSee('Add New', false);
        $response->assertSee('btn', false);
    }

    public function test_children_index_view_has_action_buttons()
    {
        $children = Children::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('children.index'));

        $response->assertStatus(200);
        
        // Check for action buttons (Edit, Delete, View)
        $response->assertSee('Edit', false);
        $response->assertSee('Delete', false);
        $response->assertSee('View', false);
    }

    public function test_children_pagination_links_exist()
    {
        // Create more children than default pagination limit
        Children::factory()->count(20)->create();

        $response = $this->actingAs($this->user)
            ->get(route('children.index'));

        $response->assertStatus(200);
        
        // Check for pagination elements
        $response->assertSee('pagination', false);
        $response->assertSee('page-link', false);
    }

    public function test_children_export_links_exist()
    {
        $response = $this->actingAs($this->user)
            ->get(route('children.index'));

        $response->assertStatus(200);
        
        // Check for export links
        $response->assertSee('Export PDF', false);
        $response->assertSee('Export Excel', false);
    }

    public function test_children_search_functionality()
    {
        $children = Children::factory()->create(['name' => 'Special Child Test']);

        $response = $this->actingAs($this->user)
            ->get(route('children.index', ['search' => 'Special Child Test']));

        $response->assertStatus(200);
        $response->assertSee('Special Child Test');
    }

    public function test_children_filters_appear_in_view()
    {
        $response = $this->actingAs($this->user)
            ->get(route('children.index'));

        $response->assertStatus(200);
        
        // Check for filter elements
        $response->assertSee('Filter', false);
        $response->assertSee('select', false);
    }

    public function test_children_view_respects_user_permissions()
    {
        $userWithoutPermission = User::factory()->create();
        
        $response = $this->actingAs($userWithoutPermission)
            ->get(route('children.index'));

        // Expect forbidden since user doesn't have permissions
        $response->assertForbidden();
    }

    public function test_children_view_localization()
    {
        // Test English
        $response = $this->actingAs($this->user)
            ->get(route('children.index'));

        $response->assertStatus(200);
        
        // We expect to see localized content
        $response->assertSee(__('children.title'), false);
        $response->assertSee(__('global.actions'), false);
    }
}