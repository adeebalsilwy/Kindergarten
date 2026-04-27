<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Material;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->user->assignRole('Administrator');
    }

    public function test_index_returns_view_with_materials()
    {
        $response = $this->actingAs($this->user)
            ->get(route('materials.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.materials.index');
    }

    public function test_index_returns_paginated_materials()
    {
        Material::factory()->count(20)->create();

        $response = $this->actingAs($this->user)
            ->get(route('materials.index'));

        $response->assertStatus(200);
        $response->assertViewHas('materials');
    }

    public function test_create_returns_view()
    {
        $response = $this->actingAs($this->user)
            ->get(route('materials.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.materials.create');
    }

    public function test_store_creates_new_material()
    {
        $data = [
            'name' => 'Test Material',
            'description' => 'A test material',
            'category' => 'educational_toys',
            'type' => 'reusable',
            'quantity_available' => 10,
            'quantity_required' => 5,
            'unit_cost' => 25.00,
            'supplier' => 'Test Supplier',
            'storage_location' => 'Room A',
            'is_consumable' => false,
            'is_digital' => false,
            'is_active' => true,
        ];

        $response = $this->actingAs($this->user)
            ->post(route('materials.store'), $data);

        $response->assertRedirect(route('materials.index'));
        $this->assertDatabaseHas('materials', [
            'name' => 'Test Material',
            'category' => 'educational_toys',
        ]);
    }

    public function test_show_returns_view_with_material()
    {
        $material = Material::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('materials.show', $material->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.materials.show');
    }

    public function test_edit_returns_view_with_material()
    {
        $material = Material::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('materials.edit', $material->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.materials.edit');
    }

    public function test_update_modifies_material()
    {
        $material = Material::factory()->create();

        $data = [
            'name' => 'Updated Material',
            'description' => 'Updated description',
            'category' => 'arts_crafts',
            'type' => 'consumable',
            'quantity_available' => 20,
            'quantity_required' => 10,
            'unit_cost' => 35.00,
            'supplier' => 'Updated Supplier',
            'storage_location' => 'Room B',
            'is_consumable' => true,
            'is_digital' => false,
            'is_active' => true,
        ];

        $response = $this->actingAs($this->user)
            ->put(route('materials.update', $material->id), $data);

        $response->assertRedirect(route('materials.index'));
        $this->assertDatabaseHas('materials', [
            'id' => $material->id,
            'name' => 'Updated Material',
        ]);
    }

    public function test_destroy_removes_material()
    {
        $material = Material::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('materials.destroy', $material->id));

        $response->assertRedirect(route('materials.index'));
        $this->assertSoftDeleted('materials', [
            'id' => $material->id,
        ]);
    }

    public function test_unauthorized_user_cannot_access_materials_routes()
    {
        $userWithoutPermission = User::factory()->create();
        
        $response = $this->actingAs($userWithoutPermission)
            ->get(route('materials.index'));

        $response->assertForbidden();
    }

    public function test_export_functionality_pdf()
    {
        Material::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('materials.export.pdf'));

        $response->assertStatus(200);
    }

    public function test_export_functionality_excel()
    {
        Material::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('materials.export.excel'));

        $response->assertStatus(200);
    }

    public function test_pagination_works()
    {
        Material::factory()->count(30)->create();

        $response = $this->actingAs($this->user)
            ->get(route('materials.index'));

        $response->assertStatus(200);
    }
}
