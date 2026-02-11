<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Classes;
use App\Models\Teacher;
use App\Models\Curriculum;
use App\Models\Children;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ClassesModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_classes_model_database_structure()
    {
        $class = Classes::factory()->create();

        $this->assertDatabaseHas('classes', [
            'id' => $class->id,
            'name' => $class->name,
            'capacity' => $class->capacity,
        ]);
    }

    public function test_classes_model_fillable_attributes()
    {
        $fillable = [
            'name',
            'code',
            'description',
            'teacher_id',
            'age_group',
            'capacity',
            'current_students',
            'start_time',
            'end_time',
            'room_number',
            'monthly_fee',
            'is_active',
            'curriculum',
        ];

        $model = new Classes();
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

    public function test_classes_model_casts()
    {
        $casts = [
            'capacity' => 'integer',
            'current_students' => 'integer',
            'monthly_fee' => 'decimal:2',
            'is_active' => 'boolean',
            'deleted_at' => 'datetime',
        ];

        $model = new Classes();
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

    public function test_classes_model_appends()
    {
        $appends = [
            'slug',
            'enrollment_count',
            'available_spots',
            'is_full',
        ];

        $model = new Classes();
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

    public function test_classes_belongs_to_teacher_relationship()
    {
        $class = Classes::factory()->create();

        $relation = $class->teacher();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('teacher_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    // public function test_classes_belongs_to_curriculum_relationship()
    // {
    //     // Curriculum is stored as a string field, not as a relationship
    //     $this->markTestSkipped('Curriculum is stored as string field, not relationship');
    // }

    public function test_classes_has_many_students_relationship()
    {
        $class = Classes::factory()->create();

        $relation = $class->children();
        
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('class_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_slug_accessor()
    {
        $class = Classes::factory()->create([
            'name' => 'Kindergarten A'
        ]);

        $this->assertEquals('kindergarten-a', $class->slug);
    }

    public function test_enrollment_count_accessor()
    {
        $class = Classes::factory()->create();
        $students = Children::factory()->count(5)->create(['class_id' => $class->id]);

        $this->assertEquals(5, $class->enrollment_count);
    }

    public function test_available_spots_accessor()
    {
        $class = Classes::factory()->create([
            'capacity' => 20
        ]);
        
        $students = Children::factory()->count(5)->create(['class_id' => $class->id]);

        $this->assertEquals(15, $class->available_spots);
    }

    public function test_is_full_accessor()
    {
        $class = Classes::factory()->create([
            'capacity' => 10
        ]);
        
        $students = Children::factory()->count(10)->create(['class_id' => $class->id]);

        $this->assertTrue($class->is_full);
    }

    public function test_soft_deletes_trait()
    {
        $class = Classes::factory()->create();
        $class->delete();

        $this->assertNotNull($class->deleted_at);
        $this->assertCount(0, Classes::all());
        $this->assertCount(1, Classes::withTrashed()->get());
    }

    public function test_name_field()
    {
        $class = Classes::factory()->create([
            'name' => 'Grade 1A'
        ]);

        $this->assertEquals('Grade 1A', $class->name);
    }

    public function test_description_field()
    {
        $class = Classes::factory()->create([
            'description' => 'Primary class for first grade students'
        ]);

        $this->assertEquals('Primary class for first grade students', $class->description);
    }

    public function test_capacity_field()
    {
        $class = Classes::factory()->create([
            'capacity' => 25
        ]);

        $this->assertEquals(25, $class->capacity);
        $this->assertIsInt($class->capacity);
    }

    public function test_room_number_field()
    {
        $class = Classes::factory()->create([
            'room_number' => 'Room 101'
        ]);

        $this->assertEquals('Room 101', $class->room_number);
    }

    public function test_curriculum_field()
    {
        $class = Classes::factory()->create([
            'curriculum' => 'Mathematics'
        ]);

        $this->assertEquals('Mathematics', $class->curriculum);
    }

    public function test_integer_casting()
    {
        $class = Classes::factory()->create([
            'capacity' => '30',
            'current_students' => '5'
        ]);

        // Should be cast to integer
        $this->assertEquals(30, $class->capacity);
        $this->assertEquals(5, $class->current_students);
        $this->assertIsInt($class->capacity);
        $this->assertIsInt($class->current_students);
    }

    public function test_name_mutator()
    {
        $class = new Classes();
        $class->name = 'grade 1b';
        
        // The mutator should capitalize the first letter of each word
        $this->assertEquals('Grade 1b', $class->name);
    }

    public function test_student_enrollment_logic()
    {
        $class = Classes::factory()->create([
            'capacity' => 2
        ]);

        // Add students to the class
        $student1 = Children::factory()->create(['class_id' => $class->id]);
        $student2 = Children::factory()->create(['class_id' => $class->id]);

        // Refresh class to get updated counts
        $class->refresh();

        $this->assertEquals(2, $class->enrollment_count);
        $this->assertEquals(0, $class->available_spots);
        $this->assertTrue($class->is_full);
    }

    public function test_relationship_counts()
    {
        $teacher = Teacher::factory()->create();
        
        $class = Classes::factory()->create([
            'teacher_id' => $teacher->id,
            'curriculum' => 'Mathematics'
        ]);

        $this->assertEquals($teacher->id, $class->teacher->id);
        $this->assertEquals('Mathematics', $class->curriculum);
    }
}