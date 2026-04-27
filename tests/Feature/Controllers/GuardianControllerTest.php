<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Guardian;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GuardianControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->user->assignRole('Administrator');
    }

    public function test_index_returns_view_with_guardians()
    {
        $response = $this->actingAs($this->user)
            ->get(route('guardians.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.guardians.index');
    }

    public function test_index_returns_paginated_guardians()
    {
        Guardian::factory()->count(20)->create();

        $response = $this->actingAs($this->user)
            ->get(route('guardians.index'));

        $response->assertStatus(200);
        $response->assertViewHas('parents');
    }

    public function test_create_returns_view()
    {
        $response = $this->actingAs($this->user)
            ->get(route('guardians.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.guardians.create');
    }

    public function test_store_creates_new_guardian()
    {
        $data = [
            'name' => 'Test Guardian',
            'email' => 'guardian@example.com',
            'phone' => '1234567890',
            'address' => '123 Test Street',
            'relationship' => 'father',
        ];

        $response = $this->actingAs($this->user)
            ->post(route('guardians.store'), $data);

        $response->assertRedirect(route('guardians.index'));
        $this->assertDatabaseHas('guardians', [
            'name' => 'Test Guardian',
            'email' => 'guardian@example.com',
        ]);
    }

    public function test_show_returns_view_with_guardian()
    {
        $guardian = Guardian::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('guardians.show', $guardian->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.guardians.show');
        $response->assertViewHas('parents', $guardian);
    }

    public function test_edit_returns_view_with_guardian()
    {
        $guardian = Guardian::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('guardians.edit', $guardian->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.guardians.edit');
        $response->assertViewHas('parents', $guardian);
    }

    public function test_update_modifies_guardian()
    {
        $guardian = Guardian::factory()->create();

        $data = [
            'name' => 'Updated Guardian Name',
            'email' => 'updated@example.com',
            'phone' => '0987654321',
            'address' => '456 Updated Street',
            'relationship' => 'mother',
        ];

        $response = $this->actingAs($this->user)
            ->put(route('guardians.update', $guardian->id), $data);

        $response->assertRedirect(route('guardians.index'));
        $this->assertDatabaseHas('guardians', [
            'id' => $guardian->id,
            'name' => 'Updated Guardian Name',
        ]);
    }

    public function test_destroy_removes_guardian()
    {
        $guardian = Guardian::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('guardians.destroy', $guardian->id));

        $response->assertRedirect(route('guardians.index'));
        $this->assertSoftDeleted('guardians', [
            'id' => $guardian->id,
            'name' => $guardian->name,
        ]);
    }

    public function test_account_statement_returns_view()
    {
        $guardian = Guardian::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('guardians.account-statement', $guardian->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.guardians.account-statement');
    }

    public function test_export_functionality_pdf()
    {
        Guardian::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('guardians.export.pdf'));

        $response->assertStatus(200);
    }

    public function test_export_functionality_excel()
    {
        Guardian::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('guardians.export.excel'));

        $response->assertStatus(200);
    }

    public function test_pagination_works()
    {
        Guardian::factory()->count(30)->create();

        $response = $this->actingAs($this->user)
            ->get(route('guardians.index'));

        $response->assertStatus(200);
    }

    public function test_search_filter_works()
    {
        Guardian::factory()->create(['name' => 'Special Guardian']);
        Guardian::factory()->create(['name' => 'Regular Guardian']);

        $response = $this->actingAs($this->user)
            ->get(route('guardians.index', ['search' => 'Special']));

        $response->assertStatus(200);
    }
}
