<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Payment;
use App\Models\Fee;
use App\Models\Children;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->user->assignRole('Administrator');
    }

    public function test_index_returns_view_with_payments()
    {
        $response = $this->actingAs($this->user)
            ->get(route('payments.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.payments.index');
    }

    public function test_index_returns_paginated_payments()
    {
        Payment::factory()->count(20)->create();

        $response = $this->actingAs($this->user)
            ->get(route('payments.index'));

        $response->assertStatus(200);
        $response->assertViewHas('payments');
    }

    public function test_create_returns_view()
    {
        $response = $this->actingAs($this->user)
            ->get(route('payments.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.payments.create');
    }

    public function test_store_creates_new_payment()
    {
        $fee = Fee::factory()->create();
        $child = Children::factory()->create();

        $data = [
            'amount' => 500.00,
            'payment_date' => now()->format('Y-m-d'),
            'payment_method' => 'cash',
            'fee_id' => $fee->id,
            'child_id' => $child->id,
            'notes' => 'Payment for tuition',
        ];

        $response = $this->actingAs($this->user)
            ->post(route('payments.store'), $data);

        $response->assertRedirect(route('payments.index'));
        $this->assertDatabaseHas('payments', [
            'amount' => 500.00,
            'fee_id' => $fee->id,
            'child_id' => $child->id,
        ]);
    }

    public function test_show_returns_view_with_payment()
    {
        $payment = Payment::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('payments.show', $payment->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.payments.show');
    }

    public function test_edit_returns_view_with_payment()
    {
        $payment = Payment::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('payments.edit', $payment->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.payments.edit');
    }

    public function test_update_modifies_payment()
    {
        $payment = Payment::factory()->create();
        $fee = Fee::factory()->create();
        $child = Children::factory()->create();

        $data = [
            'amount' => 750.00,
            'payment_date' => now()->format('Y-m-d'),
            'payment_method' => 'bank_transfer',
            'fee_id' => $fee->id,
            'child_id' => $child->id,
            'notes' => 'Updated payment notes',
        ];

        $response = $this->actingAs($this->user)
            ->put(route('payments.update', $payment->id), $data);

        $response->assertRedirect(route('payments.index'));
        $this->assertDatabaseHas('payments', [
            'id' => $payment->id,
            'amount' => 750.00,
        ]);
    }

    public function test_destroy_removes_payment()
    {
        $payment = Payment::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('payments.destroy', $payment->id));

        $response->assertRedirect(route('payments.index'));
        $this->assertSoftDeleted('payments', [
            'id' => $payment->id,
        ]);
    }

    public function test_unauthorized_user_cannot_access_payments_routes()
    {
        $userWithoutPermission = User::factory()->create();
        
        $response = $this->actingAs($userWithoutPermission)
            ->get(route('payments.index'));

        $response->assertForbidden();
    }

    public function test_export_functionality_pdf()
    {
        Payment::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('payments.export.pdf'));

        $response->assertStatus(200);
    }

    public function test_export_functionality_excel()
    {
        Payment::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('payments.export.excel'));

        $response->assertStatus(200);
    }

    public function test_pagination_works()
    {
        Payment::factory()->count(30)->create();

        $response = $this->actingAs($this->user)
            ->get(route('payments.index'));

        $response->assertStatus(200);
    }
}
