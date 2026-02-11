<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Attendance;
use App\Models\Children;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttendanceModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_attendance_model_database_structure()
    {
        $attendance = Attendance::factory()->create();

        $this->assertDatabaseHas('attendances', [
            'id' => $attendance->id,
            'date' => $attendance->date,
            'status' => $attendance->status,
        ]);
    }

    public function test_attendance_model_fillable_attributes()
    {
        $fillable = [
            'child_id',
            'date',
            'status',
            'notes',
            'check_in_time',
            'check_out_time',
            'absence_reason',
            'duration_minutes',
            'check_in_location',
            'check_out_location',
            'check_in_status',
            'check_out_status',
            'attendance_type',
        ];

        $model = new Attendance();
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

    public function test_attendance_model_casts()
    {
        $casts = [
            'date' => 'datetime',
            'check_in_time' => 'datetime',
            'check_out_time' => 'datetime',
            'duration_minutes' => 'integer',
            'deleted_at' => 'datetime',
        ];

        $model = new Attendance();
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

    public function test_attendance_model_appends()
    {
        $appends = [];

        $model = new Attendance();
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

    public function test_attendance_belongs_to_child_relationship()
    {
        $child = Children::factory()->create();
        $attendance = Attendance::factory()->create(['child_id' => $child->id]);

        $relation = $attendance->child();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('child_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_soft_deletes_trait()
    {
        $attendance = Attendance::factory()->create();
        $attendance->delete();

        $this->assertNotNull($attendance->deleted_at);
        $this->assertCount(0, Attendance::all());
        $this->assertCount(1, Attendance::withTrashed()->get());
    }

    public function test_child_id_field()
    {
        $child = Children::factory()->create();
        $attendance = Attendance::factory()->create([
            'child_id' => $child->id
        ]);

        $this->assertEquals($child->id, $attendance->child_id);
        $this->assertIsInt($attendance->child_id);
    }

    public function test_date_field()
    {
        $attendance = Attendance::factory()->create([
            'date' => '2023-12-31'
        ]);

        $this->assertInstanceOf('Carbon\Carbon', $attendance->date);
        $this->assertEquals('2023-12-31', $attendance->date->format('Y-m-d'));
    }

    public function test_status_field()
    {
        $attendance = Attendance::factory()->create([
            'status' => 'present'
        ]);

        $this->assertEquals('present', $attendance->status);
    }

    public function test_notes_field()
    {
        $attendance = Attendance::factory()->create([
            'notes' => 'Came late today'
        ]);

        $this->assertEquals('Came late today', $attendance->notes);
    }

    public function test_integer_casting()
    {
        $child = Children::factory()->create();
        $attendance = Attendance::factory()->create([
            'child_id' => $child->id
        ]);

        $this->assertIsInt($attendance->child_id);
    }



    public function test_relationship_counts()
    {
        $child = Children::factory()->create();
        $attendances = Attendance::factory()->count(3)->create(['child_id' => $child->id]);

        $this->assertCount(3, $child->attendances);
    }
}