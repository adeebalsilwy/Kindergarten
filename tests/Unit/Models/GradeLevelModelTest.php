<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\GradeLevel;
use App\Models\Classes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GradeLevelModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_grade_level_model_database_structure()
    {
        $gradeLevel = GradeLevel::factory()->create();

        $this->assertDatabaseHas('grade_levels', [
            'id' => $gradeLevel->id,
            'name' => $gradeLevel->name,
            'code' => $gradeLevel->code,
        ]);
    }

    public function test_grade_level_model_fillable_attributes()
    {
        $fillable = [
            'name',
            'code',
            'description',
            'min_age',
            'max_age',
            'order',
        ];

        $this->assertEquals($fillable, (new GradeLevel())->getFillable());
    }

    public function test_grade_level_model_casts()
    {
        $gradeLevel = GradeLevel::factory()->create([
            'min_age' => 3,
            'max_age' => 5,
            'order' => 1,
        ]);

        $this->assertIsInt($gradeLevel->min_age);
        $this->assertIsInt($gradeLevel->max_age);
        $this->assertIsInt($gradeLevel->order);
    }

    public function test_grade_level_has_many_classes_relationship()
    {
        $gradeLevel = GradeLevel::factory()->create();

        $relation = $gradeLevel->classes();
        
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('grade_level_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_grade_level_factory_creates_valid_record()
    {
        $gradeLevel = GradeLevel::factory()->create([
            'name' => 'Kindergarten 1',
            'code' => 'KG1',
            'min_age' => 4,
            'max_age' => 5,
            'order' => 1,
        ]);

        $this->assertEquals('Kindergarten 1', $gradeLevel->name);
        $this->assertEquals('KG1', $gradeLevel->code);
        $this->assertEquals(4, $gradeLevel->min_age);
        $this->assertEquals(5, $gradeLevel->max_age);
        $this->assertEquals(1, $gradeLevel->order);
    }

    public function test_grade_level_can_have_classes()
    {
        $gradeLevel = GradeLevel::factory()->create();
        $class = Classes::factory()->create(['grade_level_id' => $gradeLevel->id]);

        $this->assertCount(1, $gradeLevel->fresh()->classes);
        $this->assertEquals($class->id, $gradeLevel->fresh()->classes->first()->id);
    }

    public function test_grade_level_soft_deletes()
    {
        $gradeLevel = GradeLevel::factory()->create();
        $gradeLevel->delete();

        $this->assertSoftDeleted('grade_levels', ['id' => $gradeLevel->id]);
    }
}
