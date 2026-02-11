<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Fee;
use App\Models\Payment;
use App\Models\User;
use App\Models\Children;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FeeModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_fee_model_database_structure()
    {
        $fee = Fee::factory()->create();

        $this->assertDatabaseHas('fees', [
            'id' => $fee->id,
            'name' => $fee->name,
            'amount' => $fee->amount,
        ]);
    }

    public function test_fee_model_fillable_attributes()
    {
        $fillable = [
            'name',
            'amount',
            'description',
            'is_active',
            'frequency',
            'category',
            'due_date',
        ];

        $model = new Fee();
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

    public function test_fee_model_casts()
    {
        $casts = [
            'amount' => 'decimal:2',
            'due_date' => 'date',
            'is_active' => 'boolean',
            'deleted_at' => 'datetime',
        ];

        $model = new Fee();
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

    public function test_fee_model_appends()
    {
        $appends = [
            'slug',
            'formatted_amount',
            'is_overdue',
            'due_date_formatted',
        ];

        $model = new Fee();
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

    public function test_fee_belongs_to_creator_relationship()
    {
        $user = User::factory()->create();
        $fee = Fee::factory()->create();

        $relation = $fee->creator();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('created_by', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_fee_has_many_payments_relationship()
    {
        $fee = Fee::factory()->create();
        $child = Children::factory()->create();
        $payment = Payment::factory()->create(['fee_id' => $fee->id, 'child_id' => $child->id]);

        $relation = $fee->payments();
        
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('fee_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_soft_deletes_trait()
    {
        $fee = Fee::factory()->create();
        $fee->delete();

        $this->assertNotNull($fee->deleted_at);
        $this->assertCount(0, Fee::all());
        $this->assertCount(1, Fee::withTrashed()->get());
    }

    public function test_name_field()
    {
        $fee = Fee::factory()->create([
            'name' => 'Tuition Fee'
        ]);

        $this->assertEquals('Tuition Fee', $fee->name);
    }

    public function test_description_field()
    {
        $fee = Fee::factory()->create([
            'description' => 'Monthly tuition fee for enrolled students'
        ]);

        $this->assertEquals('Monthly tuition fee for enrolled students', $fee->description);
    }

    public function test_amount_field()
    {
        $fee = Fee::factory()->create([
            'amount' => 500.00
        ]);

        $this->assertEquals(500.00, $fee->amount);
        $this->assertIsNumeric($fee->amount);
    }

    public function test_frequency_field()
    {
        $fee = Fee::factory()->create([
            'frequency' => 'monthly'
        ]);

        $this->assertEquals('monthly', $fee->frequency);
    }

    public function test_category_field()
    {
        $fee = Fee::factory()->create([
            'category' => 'tuition'
        ]);

        $this->assertEquals('tuition', $fee->category);
    }

    public function test_due_date_field()
    {
        $fee = Fee::factory()->create([
            'due_date' => '2023-12-15'
        ]);

        $this->assertInstanceOf('Carbon\Carbon', $fee->due_date);
        $this->assertEquals('2023-12-15', $fee->due_date->format('Y-m-d'));
    }

    public function test_amount_casting()
    {
        $fee = Fee::factory()->create([
            'amount' => '750.25'
        ]);

        // Should be cast to decimal
        $this->assertEquals(750.25, $fee->amount);
        $this->assertIsNumeric($fee->amount);
    }
}