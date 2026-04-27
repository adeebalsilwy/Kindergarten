<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExpenseControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->user->assignRole('Administrator');
    }

    public function test_index_returns_view_with_expenses()
    {
        $response = $this->actingAs($this->user)
            ->get(route('expenses.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.expenses.index');
    }

    public function test_index_returns_paginated_expenses()
    {
        Expense::factory()->count(20)->create();

        $response = $this->actingAs($this->user)
            ->get(route('expenses.index'));

        $response->assertStatus(200);
        $response->assertViewHas('expenses');
    }

    public function test_create_returns_view()
    {
        $response = $this->actingAs($this->user)
            ->get(route('expenses.create'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.expenses.create');
    }

    public function test_store_creates_new_expense()
    {
        $data = [
            'name' => 'Office Supplies',
            'amount' => 250.00,
            'description' => 'Stationery items',
            'date' => now()->format('Y-m-d'),
            'category' => 'office',
        ];

        $response = $this->actingAs($this->user)
            ->post(route('expenses.store'), $data);

        $response->assertRedirect(route('expenses.index'));
        $this->assertDatabaseHas('expenses', [
            'name' => 'Office Supplies',
            'amount' => 250.00,
        ]);
    }

    public function test_show_returns_view_with_expense()
    {
        $expense = Expense::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('expenses.show', $expense->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.expenses.show');
    }

    public function test_edit_returns_view_with_expense()
    {
        $expense = Expense::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('expenses.edit', $expense->id));

        $response->assertStatus(200);
        $response->assertViewIs('pages.expenses.edit');
    }

    public function test_update_modifies_expense()
    {
        $expense = Expense::factory()->create();

        $data = [
            'name' => 'Updated Expense',
            'amount' => 500.00,
            'description' => 'Updated description',
            'date' => now()->format('Y-m-d'),
            'category' => 'utilities',
        ];

        $response = $this->actingAs($this->user)
            ->put(route('expenses.update', $expense->id), $data);

        $response->assertRedirect(route('expenses.index'));
        $this->assertDatabaseHas('expenses', [
            'id' => $expense->id,
            'name' => 'Updated Expense',
        ]);
    }

    public function test_destroy_removes_expense()
    {
        $expense = Expense::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('expenses.destroy', $expense->id));

        $response->assertRedirect(route('expenses.index'));
        $this->assertSoftDeleted('expenses', [
            'id' => $expense->id,
        ]);
    }

    public function test_unauthorized_user_cannot_access_expenses_routes()
    {
        $userWithoutPermission = User::factory()->create();
        
        $response = $this->actingAs($userWithoutPermission)
            ->get(route('expenses.index'));

        $response->assertForbidden();
    }

    public function test_export_functionality_pdf()
    {
        Expense::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('expenses.export.pdf'));

        $response->assertStatus(200);
    }

    public function test_export_functionality_excel()
    {
        Expense::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('expenses.export.excel'));

        $response->assertStatus(200);
    }

    public function test_pagination_works()
    {
        Expense::factory()->count(30)->create();

        $response = $this->actingAs($this->user)
            ->get(route('expenses.index'));

        $response->assertStatus(200);
    }
}
