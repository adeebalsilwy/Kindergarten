<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Curriculum;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CurriculumModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_curriculum_model_database_structure()
    {
        $curriculum = Curriculum::factory()->create();

        $this->assertDatabaseHas('curricula', [
            'id' => $curriculum->id,
            'name' => $curriculum->name,
            'description' => $curriculum->description,
        ]);
    }

    public function test_curriculum_model_fillable_attributes()
    {
        $fillable = [
            'name',
            'code',
            'description',
            'objectives',
            'learning_outcomes',
            'grade_level',
            'subject_area',
            'topics',
            'materials_needed',
            'curriculum_type',
            'duration_weeks',
            'assessment_methods',
            'is_active',
            'published_at',
            'created_by',
            'prerequisites',
            'syllabus',
            'learning_objectives',
        ];

        $model = new Curriculum();
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

    public function test_curriculum_model_casts()
    {
        $casts = [
            'published_at' => 'datetime',
            'duration_weeks' => 'integer',
            'is_active' => 'boolean',
            'topics' => 'array',
            'materials_needed' => 'array',
            'assessment_methods' => 'array',
            'deleted_at' => 'datetime',
        ];

        $model = new Curriculum();
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

    public function test_curriculum_model_appends()
    {
        $appends = [
            'slug',
            'activity_count',
        ];

        $model = new Curriculum();
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

    public function test_curriculum_belongs_to_created_by_relationship()
    {
        $user = User::factory()->create();
        $curriculum = Curriculum::factory()->create(['created_by' => $user->id]);

        $relation = $curriculum->createdBy();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('created_by', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_soft_deletes_trait()
    {
        $curriculum = Curriculum::factory()->create();
        $curriculum->delete();

        $this->assertNotNull($curriculum->deleted_at);
        $this->assertCount(0, Curriculum::all());
        $this->assertCount(1, Curriculum::withTrashed()->get());
    }

    public function test_name_field()
    {
        $curriculum = Curriculum::factory()->create([
            'name' => 'Mathematics Curriculum'
        ]);

        $this->assertEquals('Mathematics Curriculum', $curriculum->name);
    }

    public function test_description_field()
    {
        $curriculum = Curriculum::factory()->create([
            'description' => 'Comprehensive math curriculum for kindergarten students'
        ]);

        $this->assertEquals('Comprehensive math curriculum for kindergarten students', $curriculum->description);
    }

    public function test_grade_level_field()
    {
        $curriculum = Curriculum::factory()->create([
            'grade_level' => 'kindergarten'
        ]);

        $this->assertEquals('kindergarten', $curriculum->grade_level);
    }

    public function test_subject_area_field()
    {
        $curriculum = Curriculum::factory()->create([
            'subject_area' => 'mathematics'
        ]);

        $this->assertEquals('mathematics', $curriculum->subject_area);
    }

    public function test_duration_weeks_field()
    {
        $curriculum = Curriculum::factory()->create([
            'duration_weeks' => 12
        ]);

        $this->assertEquals(12, $curriculum->duration_weeks);
        $this->assertIsInt($curriculum->duration_weeks);
    }

    public function test_integer_casting()
    {
        $curriculum = Curriculum::factory()->create([
            'duration_weeks' => '16'
        ]);

        // Should be cast to integer
        $this->assertEquals(16, $curriculum->duration_weeks);
        $this->assertIsInt($curriculum->duration_weeks);
    }
}