<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExpenseModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_expense_model_database_structure()
    {
        $expense = Expense::factory()->create();

        $this->assertDatabaseHas('expenses', [
            'id' => $expense->id,
            'title' => $expense->title,
            'description' => $expense->description,
            'amount' => $expense->amount,
        ]);
    }

    public function test_expense_model_fillable_attributes()
    {
        $fillable = [
            'title',
            'category',
            'description',
            'amount',
            'expense_date',
            'vendor',
            'receipt_number',
            'payment_method',
            'reference_number',
            'status',
            'created_by',
            'assigned_to',
        ];

        $model = new Expense();
        $modelFillable = $model->getFillable();
        
        // Check that all expected attributes are present in the model's fillable array
        foreach ($fillable as $attribute) {
            $this->assertContains($attribute, $modelFillable);
        }
        
        // Check that the model's fillable array doesn't have unexpected attributes
        foreach ($modelFillable as $attribute) {
            $this->assertContains($attribute, $fillable);
        }
    }

    public function test_expense_model_casts()
    {
        $casts = [
            'amount' => 'decimal:2',
            'expense_date' => 'date',
            'deleted_at' => 'datetime',
        ];

        $model = new Expense();
        $modelCasts = $model->getCasts();
        
        // Check that all expected casts are present in the model's casts array
        foreach ($casts as $key => $value) {
            $this->assertArrayHasKey($key, $modelCasts);
            $this->assertEquals($value, $modelCasts[$key]);
        }
        
        // Check that the model's casts array doesn't have unexpected casts
        foreach ($modelCasts as $key => $value) {
            if (array_key_exists($key, $casts)) {
                $this->assertEquals($casts[$key], $value);
            }
        }
    }

    public function test_expense_model_appends()
    {
        $appends = [
            'formatted_amount',
            'expense_date_formatted',
            'category_label',
        ];

        $model = new Expense();
        $modelAppends = $model->getAppends();
        
        // Check that all expected appends are present in the model's appends array
        foreach ($appends as $append) {
            $this->assertContains($append, $modelAppends);
        }
        
        // Check that the model's appends array doesn't have unexpected appends
        foreach ($modelAppends as $append) {
            $this->assertContains($append, $appends);
        }
    }

    public function test_expense_belongs_to_creator_relationship()
    {
        $user = User::factory()->create();
        $expense = Expense::factory()->create(['created_by' => $user->id]);

        $relation = $expense->creator();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('created_by', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_expense_belongs_to_assignee_relationship()
    {
        $user = User::factory()->create();
        $expense = Expense::factory()->create(['assigned_to' => $user->id]);

        $relation = $expense->assignee();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('assigned_to', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_soft_deletes_trait()
    {
        $expense = Expense::factory()->create();
        $expense->delete();

        $this->assertNotNull($expense->deleted_at);
        $this->assertCount(0, Expense::all());
        $this->assertCount(1, Expense::withTrashed()->get());
    }

    public function test_description_field()
    {
        $expense = Expense::factory()->create([
            'description' => 'Office supplies purchase'
        ]);

        $this->assertEquals('Office supplies purchase', $expense->description);
    }

    public function test_amount_field()
    {
        $expense = Expense::factory()->create([
            'amount' => 150.75
        ]);

        $this->assertEquals(150.75, $expense->amount);
        $this->assertIsNumeric($expense->amount);
    }

    public function test_category_field()
    {
        $expense = Expense::factory()->create([
            'category' => 'office'
        ]);

        $this->assertEquals('office', $expense->category);
    }

    public function test_expense_date_field()
    {
        $expense = Expense::factory()->create([
            'expense_date' => '2023-12-31'
        ]);

        $this->assertInstanceOf('Carbon\Carbon', $expense->expense_date);
        $this->assertEquals('2023-12-31', $expense->expense_date->format('Y-m-d'));
    }

    public function test_payment_method_field()
    {
        $expense = Expense::factory()->create([
            'payment_method' => 'cash'
        ]);

        $this->assertEquals('cash', $expense->payment_method);
    }

    public function test_receipt_number_field()
    {
        $expense = Expense::factory()->create([
            'receipt_number' => 'REC-001'
        ]);

        $this->assertEquals('REC-001', $expense->receipt_number);
    }

    public function test_notes_field()
    {
        $expense = Expense::factory()->create([
            'description' => 'Monthly rent payment'
        ]);

        $this->assertEquals('Monthly rent payment', $expense->description);
    }

    public function test_amount_casting()
    {
        $expense = Expense::factory()->create([
            'amount' => '250.50'
        ]);

        // Should be cast to decimal
        $this->assertEquals(250.50, $expense->amount);
        $this->assertIsNumeric($expense->amount);
    }
}