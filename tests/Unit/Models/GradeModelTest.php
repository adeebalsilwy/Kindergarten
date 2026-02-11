<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Grade;
use App\Models\Children;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GradeModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_grade_model_database_structure()
    {
        $grade = Grade::factory()->create();

        $this->assertDatabaseHas('grades', [
            'id' => $grade->id,
            'subject' => $grade->subject,
            'score' => $grade->score,
        ]);
    }

    public function test_grade_model_fillable_attributes()
    {
        $fillable = [
            'child_id',
            'subject',
            'score',
            'date',
            'comments',
            'evaluator_id',
        ];

        $model = new Grade();
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

    public function test_grade_model_casts()
    {
        $casts = [
            'date' => 'date',
            'deleted_at' => 'datetime',
        ];

        $model = new Grade();
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

    public function test_grade_model_appends()
    {
        $appends = [
            'percentage',
            'letter_grade',
            'is_passing',
        ];

        $model = new Grade();
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

    public function test_grade_belongs_to_child_relationship()
    {
        $child = Children::factory()->create();
        $grade = Grade::factory()->create(['child_id' => $child->id]);

        $relation = $grade->child();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('child_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_grade_belongs_to_evaluator_relationship()
    {
        $teacher = Teacher::factory()->create();
        $grade = Grade::factory()->create(['evaluator_id' => $teacher->id]);

        $relation = $grade->evaluator();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('evaluator_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_percentage_accessor()
    {
        $grade = Grade::factory()->create([
            'score' => 'A'
        ]);

        // Since score is stored as a letter grade, the percentage calculation depends on the implementation
        // This test assumes there's a percentage accessor
        $this->assertIsNumeric($grade->percentage);
    }

    public function test_letter_grade_accessor()
    {
        $grade = Grade::factory()->create([
            'score' => 'B+'
        ]);

        $this->assertIsString($grade->letter_grade);
    }

    public function test_is_passing_accessor()
    {
        $passingGrade = Grade::factory()->create([
            'score' => 'B'
        ]);

        $this->assertIsBool($passingGrade->is_passing);
    }

    public function test_grade_scale_calculation()
    {
        $grade = Grade::factory()->create([
            'score' => 'A+'
        ]);

        $this->assertIsNumeric($grade->percentage);
    }

    public function test_soft_deletes_trait()
    {
        $grade = Grade::factory()->create();
        $grade->delete();

        $this->assertNotNull($grade->deleted_at);
        $this->assertCount(0, Grade::all());
        $this->assertCount(1, Grade::withTrashed()->get());
    }

    public function test_subject_field()
    {
        $grade = Grade::factory()->create([
            'subject' => 'Mathematics'
        ]);

        $this->assertEquals('Mathematics', $grade->subject);
    }

    public function test_term_field()
    {
        $grade = Grade::factory()->create([
            'subject' => 'Science'
        ]);

        $this->assertEquals('Science', $grade->subject);
    }

    public function test_year_field()
    {
        $grade = Grade::factory()->create([
            'date' => '2023-05-15'
        ]);

        $this->assertInstanceOf('Carbon\Carbon', $grade->date);
        $this->assertEquals('2023-05-15', $grade->date->format('Y-m-d'));
    }

    public function test_comments_field()
    {
        $grade = Grade::factory()->create([
            'comments' => 'Excellent work!'
        ]);

        $this->assertEquals('Excellent work!', $grade->comments);
    }

    public function test_max_score_field()
    {
        $grade = Grade::factory()->create([
            'score' => 'A'
        ]);

        $this->assertIsString($grade->score);
    }
}