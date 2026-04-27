<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Fee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeeControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->user->assignRole('Administrator');
    }

    public function test_index_returns_view_with_fees()
    {
        $response = $this->actingAs($this->user)
            ->get(route('fees.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.fees.index');
    }

    public function test_index_returns_paginated_fees()
    {
        Fee::factory()->count(20)->create();

        $response = $this->actingAs($this->user)
            ->get(route('fees.index'));

        $response->assertStatus(200);
        $response->assertViewHas('fees');
    }

    public function test_create_returns_view()
    {
        $response = $this->actingAs($this->user)
            ->get(route('fees.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.fees.create');
    }

    public function test_store_creates_new_fee()
    {
        $data = [
            'name' => 'Tuition Fee',
            'amount' => 500.00,
            'description' => 'Monthly tuition fee',
            'frequency' => 'monthly',
            'category' => 'tuition',
        ];

        $response = $this->actingAs($this->user)
            ->post(route('fees.store'), $data);

        $response->assertRedirect(route('fees.index'));
        $this->assertDatabaseHas('fees', [
            'name' => 'Tuition Fee',
            'amount' => 500.00,
        ]);
    }

    public function test_show_returns_view_with_fee()
    {
        $fee = Fee::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('fees.show', $fee->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.fees.show');
    }

    public function test_edit_returns_view_with_fee()
    {
        $fee = Fee::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('fees.edit', $fee->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.fees.edit');
    }

    public function test_update_modifies_fee()
    {
        $fee = Fee::factory()->create();

        $data = [
            'name' => 'Updated Fee Name',
            'amount' => 750.00,
            'description' => 'Updated description',
            'frequency' => 'annual',
            'category' => 'registration',
        ];

        $response = $this->actingAs($this->user)
            ->put(route('fees.update', $fee->id), $data);

        $response->assertRedirect(route('fees.index'));
        $this->assertDatabaseHas('fees', [
            'id' => $fee->id,
            'name' => 'Updated Fee Name',
        ]);
    }

    public function test_destroy_removes_fee()
    {
        $fee = Fee::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('fees.destroy', $fee->id));

        $response->assertRedirect(route('fees.index'));
        $this->assertSoftDeleted('fees', [
            'id' => $fee->id,
        ]);
    }

    public function test_unauthorized_user_cannot_access_fees_routes()
    {
        $userWithoutPermission = User::factory()->create();
        
        $response = $this->actingAs($userWithoutPermission)
            ->get(route('fees.index'));

        $response->assertForbidden();
    }

    public function test_export_functionality_pdf()
    {
        Fee::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('fees.export.pdf'));

        $response->assertStatus(200);
    }

    public function test_export_functionality_excel()
    {
        Fee::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('fees.export.excel'));

        $response->assertStatus(200);
    }

    public function test_pagination_works()
    {
        Fee::factory()->count(30)->create();

        $response = $this->actingAs($this->user)
            ->get(route('fees.index'));

        $response->assertStatus(200);
    }
}
