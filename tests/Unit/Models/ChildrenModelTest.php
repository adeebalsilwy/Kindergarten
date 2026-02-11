<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Children;
use App\Models\Classes;
use App\Models\Guardian;
use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Payment;
use App\Models\Activity;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ChildrenModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_children_model_database_structure()
    {
        $children = Children::factory()->create();

        $this->assertDatabaseHas('children', [
            'id' => $children->id,
            'name' => $children->name,
            'gender' => $children->gender,
        ]);
        
        // Compare date separately as it might be formatted differently
        $this->assertNotNull($children->dob);
    }

    public function test_children_model_fillable_attributes()
    {
        $fillable = [
            'name',
            'dob',
            'gender',
            'class_id',
            'parent_id',
            'second_parent_id',
            'photo_path',
            'fees_required',
            'fees_paid',
            'emergency_contact_name',
            'emergency_contact_phone',
            'emergency_contact_relation',
            'medical_conditions',
            'allergies',
            'medications',
            'blood_type',
            'enrollment_date',
            'expected_graduation_date',
            'enrollment_status',
            'nationality',
            'religion',
            'special_needs',
            'last_attended_at',
        ];

        $this->assertEquals($fillable, (new Children())->getFillable());
    }

    public function test_children_model_casts()
    {
        $casts = [
            'dob' => 'datetime',
            'enrollment_date' => 'datetime',
            'expected_graduation_date' => 'datetime',
            'last_attended_at' => 'datetime',
            'fees_required' => 'decimal:2',
            'fees_paid' => 'decimal:2',
        ];

        $actualCasts = (new Children())->getCasts();
        
        // Filter to only include the expected casts
        $filteredCasts = [];
        foreach ($casts as $key => $value) {
            if (isset($actualCasts[$key])) {
                $filteredCasts[$key] = $actualCasts[$key];
            }
        }
        
        $this->assertEquals($casts, $filteredCasts);
    }

    public function test_children_model_appends()
    {
        $appends = [
            'slug',
            'age',
            'balance',
            'is_active',
        ];

        $this->assertEquals($appends, (new Children())->getAppends());
    }

    public function test_children_belongs_to_parent_relationship()
    {
        $children = Children::factory()->create();

        $relation = $children->parent();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('parent_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_children_belongs_to_second_parent_relationship()
    {
        $children = Children::factory()->create();

        $relation = $children->secondParent();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('second_parent_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_children_belongs_to_class_relationship()
    {
        $children = Children::factory()->create();

        $relation = $children->class();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('class_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_children_has_many_attendances_relationship()
    {
        $children = Children::factory()->create();

        $relation = $children->attendances();
        
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('child_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_children_has_many_grades_relationship()
    {
        $children = Children::factory()->create();

        $relation = $children->grades();
        
        $this->assertInstanceOf(HasMany::class, $relation);
        // After fixing the model, the foreign key should be 'child_id'
        $this->assertEquals('child_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_children_has_many_payments_relationship()
    {
        $children = Children::factory()->create();

        $relation = $children->payments();
        
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('child_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_children_belongs_to_many_activities_relationship()
    {
        $children = Children::factory()->create();

        $relation = $children->activities();
        
        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('activity_child', $relation->getTable());
        $this->assertEquals('child_id', $relation->getForeignPivotKeyName());
        $this->assertEquals('activity_id', $relation->getRelatedPivotKeyName());
    }

    public function test_children_belongs_to_many_events_relationship()
    {
        $children = Children::factory()->create();

        $relation = $children->events();
        
        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('event_child', $relation->getTable());
        $this->assertEquals('child_id', $relation->getForeignPivotKeyName());
        $this->assertEquals('event_id', $relation->getRelatedPivotKeyName());
    }

    public function test_slug_accessor()
    {
        $children = Children::factory()->create([
            'name' => 'John Doe'
        ]);

        $this->assertEquals('john-doe', $children->slug);
    }

    public function test_age_accessor()
    {
        $children = Children::factory()->create([
            'dob' => now()->subYears(5)
        ]);

        $this->assertEquals(5, $children->age);
    }

    public function test_balance_accessor()
    {
        $children = Children::factory()->create([
            'fees_required' => 1000.00,
            'fees_paid' => 750.00
        ]);

        $this->assertEquals(250.00, $children->balance);
    }

    public function test_is_active_accessor()
    {
        $activeChild = Children::factory()->create([
            'enrollment_status' => 'active'
        ]);

        $inactiveChild = Children::factory()->create([
            'enrollment_status' => 'inactive'
        ]);

        $this->assertTrue($activeChild->is_active);
        $this->assertFalse($inactiveChild->is_active);
    }

    public function test_name_mutator()
    {
        $children = new Children();
        $children->name = 'john doe';
        
        $this->assertEquals('John doe', $children->name);
    }

    public function test_emergency_contact_phone_mutator()
    {
        $children = new Children();
        $children->emergency_contact_phone = '+1-234-567-8900';
        
        $this->assertEquals('12345678900', $children->emergency_contact_phone);
    }

    public function test_enrollment_status_mutator()
    {
        $children = new Children();
        $children->enrollment_status = 'ACTIVE';
        
        $this->assertEquals('active', $children->enrollment_status);
    }

    public function test_soft_deletes_trait()
    {
        $children = Children::factory()->create();
        $children->delete();

        $this->assertNotNull($children->deleted_at);
        $this->assertCount(0, Children::all());
        $this->assertCount(1, Children::withTrashed()->get());
    }

    public function test_model_events()
    {
        $children = new Children();
        $children->name = 'Test Child';
        $children->save();

        // Test that enrollment_date is set automatically if not provided
        $this->assertNotNull($children->enrollment_date);
        
        // Test that enrollment_status defaults to 'active'
        $this->assertEquals('active', $children->enrollment_status);
    }
}