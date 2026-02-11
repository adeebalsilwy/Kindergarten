<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Activity;
use App\Models\Teacher;
use App\Models\Classes;
use App\Models\Curriculum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_activity_model_database_structure()
    {
        $activity = Activity::factory()->create();

        $this->assertDatabaseHas('activities', [
            'id' => $activity->id,
            'title' => $activity->title,
            'description' => $activity->description,
        ]);
    }

    public function test_activity_model_fillable_attributes()
    {
        $fillable = [
            'title',
            'description',
            'instructions',
            'class_id',
            'teacher_id',
            'curriculum_id',
            'scheduled_date',
            'start_time',
            'end_time',
            'activity_type',
            'difficulty_level',
            'required_materials',
            'estimated_duration',
            'location',
            'is_active',
            'learning_objectives',
            'outcomes',
            'completed_at',
            'notes',
        ];

        $model = new Activity();
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

    public function test_activity_model_casts()
    {
        $casts = [
            'scheduled_date' => 'datetime',
            'required_materials' => 'array',
            'estimated_duration' => 'integer',
            'is_active' => 'boolean',
            'learning_objectives' => 'array',
            'outcomes' => 'array',
            'completed_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];

        $model = new Activity();
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

    public function test_activity_model_appends()
    {
        $appends = [
            'slug',
            'participant_count',
            'is_full',
        ];

        $model = new Activity();
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

    public function test_activity_belongs_to_teacher_relationship()
    {
        $teacher = Teacher::factory()->create();
        $activity = Activity::factory()->create(['teacher_id' => $teacher->id]);

        $relation = $activity->teacher();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('teacher_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_activity_belongs_to_class_relationship()
    {
        $class = Classes::factory()->create();
        $activity = Activity::factory()->create(['class_id' => $class->id]);

        $relation = $activity->class();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('class_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_activity_belongs_to_curriculum_relationship()
    {
        $curriculum = Curriculum::factory()->create();
        $activity = Activity::factory()->create(['curriculum_id' => $curriculum->id]);

        $relation = $activity->curriculum();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('curriculum_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_soft_deletes_trait()
    {
        $activity = Activity::factory()->create();
        $activity->delete();

        $this->assertNotNull($activity->deleted_at);
        $this->assertCount(0, Activity::all());
        $this->assertCount(1, Activity::withTrashed()->get());
    }

    public function test_title_field()
    {
        $activity = Activity::factory()->create([
            'title' => 'Art and Craft Workshop'
        ]);

        $this->assertEquals('Art And Craft Workshop', $activity->title);
    }

    public function test_description_field()
    {
        $activity = Activity::factory()->create([
            'description' => 'Creative art session for children to develop fine motor skills'
        ]);

        $this->assertEquals('Creative art session for children to develop fine motor skills', $activity->description);
    }

    public function test_scheduled_date_field()
    {
        $activity = Activity::factory()->create([
            'scheduled_date' => '2023-12-31'
        ]);

        $this->assertInstanceOf('Carbon\Carbon', $activity->scheduled_date);
        $this->assertEquals('2023-12-31', $activity->scheduled_date->format('Y-m-d'));
    }

    public function test_estimated_duration_field()
    {
        $activity = Activity::factory()->create([
            'estimated_duration' => 60
        ]);

        $this->assertEquals(60, $activity->estimated_duration);
        $this->assertIsInt($activity->estimated_duration);
    }

    public function test_location_field()
    {
        $activity = Activity::factory()->create([
            'location' => 'Main Activity Room'
        ]);

        $this->assertEquals('Main Activity Room', $activity->location);
    }

    public function test_activity_type_field()
    {
        $activity = Activity::factory()->create([
            'activity_type' => 'educational'
        ]);

        $this->assertEquals('educational', $activity->activity_type);
    }

    public function test_difficulty_level_field()
    {
        $activity = Activity::factory()->create([
            'difficulty_level' => 'easy'
        ]);

        $this->assertEquals('easy', $activity->difficulty_level);
    }

    public function test_is_active_field()
    {
        $activity = Activity::factory()->create([
            'is_active' => true
        ]);

        $this->assertTrue($activity->is_active);
        $this->assertIsBool($activity->is_active);
    }

    public function test_integer_casting()
    {
        $activity = Activity::factory()->create([
            'estimated_duration' => '90'
        ]);

        // Should be cast to integer
        $this->assertEquals(90, $activity->estimated_duration);
        $this->assertIsInt($activity->estimated_duration);
    }
}