<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\ClassEnrollment;
use App\Models\Classes;
use App\Models\Children;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassEnrollmentModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_class_enrollment_model_database_structure()
    {
        $enrollment = ClassEnrollment::factory()->create();

        $this->assertDatabaseHas('class_enrollments', [
            'id' => $enrollment->id,
            'status' => $enrollment->status,
        ]);
    }

    public function test_class_enrollment_model_fillable_attributes()
    {
        $fillable = [
            'class_id',
            'child_id',
            'enrollment_date',
            'withdrawal_date',
            'status',
            'reason',
            'created_by',
        ];

        $this->assertEquals($fillable, (new ClassEnrollment())->getFillable());
    }

    public function test_class_enrollment_model_casts()
    {
        $enrollment = ClassEnrollment::factory()->create([
            'enrollment_date' => '2024-01-15',
            'withdrawal_date' => '2024-06-15',
        ]);

        $this->assertInstanceOf(\Carbon\Carbon::class, $enrollment->enrollment_date);
        $this->assertInstanceOf(\Carbon\Carbon::class, $enrollment->withdrawal_date);
    }

    public function test_class_enrollment_belongs_to_class_relationship()
    {
        $enrollment = ClassEnrollment::factory()->create();

        $relation = $enrollment->class();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('class_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_class_enrollment_belongs_to_child_relationship()
    {
        $enrollment = ClassEnrollment::factory()->create();

        $relation = $enrollment->child();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('child_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_class_enrollment_belongs_to_created_by_relationship()
    {
        $enrollment = ClassEnrollment::factory()->create();

        $relation = $enrollment->createdBy();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('created_by', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_active_scope()
    {
        ClassEnrollment::factory()->create(['status' => 'active']);
        ClassEnrollment::factory()->create(['status' => 'inactive']);
        ClassEnrollment::factory()->create(['status' => 'transferred']);

        $activeEnrollments = ClassEnrollment::active()->get();

        $this->assertCount(1, $activeEnrollments);
        $this->assertEquals('active', $activeEnrollments->first()->status);
    }

    public function test_transferred_scope()
    {
        ClassEnrollment::factory()->create(['status' => 'active']);
        ClassEnrollment::factory()->create(['status' => 'transferred']);

        $transferredEnrollments = ClassEnrollment::transferred()->get();

        $this->assertCount(1, $transferredEnrollments);
        $this->assertEquals('transferred', $transferredEnrollments->first()->status);
    }

    public function test_completed_scope()
    {
        ClassEnrollment::factory()->create(['status' => 'active']);
        ClassEnrollment::factory()->create(['status' => 'completed']);

        $completedEnrollments = ClassEnrollment::completed()->get();

        $this->assertCount(1, $completedEnrollments);
        $this->assertEquals('completed', $completedEnrollments->first()->status);
    }

    public function test_inactive_scope()
    {
        ClassEnrollment::factory()->create(['status' => 'active']);
        ClassEnrollment::factory()->create(['status' => 'inactive']);

        $inactiveEnrollments = ClassEnrollment::inactive()->get();

        $this->assertCount(1, $inactiveEnrollments);
        $this->assertEquals('inactive', $inactiveEnrollments->first()->status);
    }

    public function test_class_enrollment_factory_creates_valid_record()
    {
        $enrollment = ClassEnrollment::factory()->create([
            'status' => 'active',
            'reason' => 'Initial enrollment',
        ]);

        $this->assertNotNull($enrollment->class_id);
        $this->assertNotNull($enrollment->child_id);
        $this->assertEquals('active', $enrollment->status);
        $this->assertEquals('Initial enrollment', $enrollment->reason);
    }

    public function test_enrollment_date_is_set_correctly()
    {
        $date = now()->format('Y-m-d');
        $enrollment = ClassEnrollment::factory()->create([
            'enrollment_date' => $date,
        ]);

        $this->assertEquals($date, $enrollment->enrollment_date->format('Y-m-d'));
    }

    public function test_withdrawal_date_is_set_correctly()
    {
        $date = now()->addMonths(6)->format('Y-m-d');
        $enrollment = ClassEnrollment::factory()->create([
            'withdrawal_date' => $date,
        ]);

        $this->assertEquals($date, $enrollment->withdrawal_date->format('Y-m-d'));
    }
}
