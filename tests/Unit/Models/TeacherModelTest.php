<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Classes;
use App\Models\Activity;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TeacherModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_teacher_model_database_structure()
    {
        $teacher = Teacher::factory()->create();

        $this->assertDatabaseHas('teachers', [
            'id' => $teacher->id,
            'name' => $teacher->name,
            'email' => $teacher->email,
        ]);
    }

    public function test_teacher_model_fillable_attributes()
    {
        $fillable = [
            'name',
            'email',
            'phone',
            'address',
            'hire_date',
            'salary',
            'qualification',
            'experience_years',
            'bio',
            'user_id',
            'specialization',
        ];

        $this->assertEquals($fillable, (new Teacher())->getFillable());
    }

    public function test_teacher_model_casts()
    {
        $casts = [
            'hire_date' => 'datetime',
            'salary' => 'decimal:2',
            'experience_years' => 'integer',
        ];

        $modelCasts = (new Teacher())->getCasts();
        
        // Check that all expected casts are present
        foreach ($casts as $key => $value) {
            $this->assertArrayHasKey($key, $modelCasts);
            $this->assertEquals($value, $modelCasts[$key]);
        }
    }

    public function test_teacher_model_appends()
    {
        $appends = [
            'slug',
        ];

        $this->assertEquals($appends, (new Teacher())->getAppends());
    }

    public function test_teacher_belongs_to_user_relationship()
    {
        $teacher = Teacher::factory()->create();

        $relation = $teacher->user();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_teacher_has_many_classes_relationship()
    {
        $teacher = Teacher::factory()->create();

        $relation = $teacher->classes();
        
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('teacher_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_teacher_has_many_activities_relationship()
    {
        $teacher = Teacher::factory()->create();

        $relation = $teacher->activities();
        
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('teacher_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_teacher_has_many_events_relationship()
    {
        $teacher = Teacher::factory()->create();

        $relation = $teacher->events();
        
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('teacher_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_slug_accessor()
    {
        $teacher = Teacher::factory()->create([
            'name' => 'Jane Smith'
        ]);

        $this->assertEquals('jane-smith', $teacher->slug);
    }

    public function test_soft_deletes_trait()
    {
        $teacher = Teacher::factory()->create();
        $teacher->delete();

        $this->assertNotNull($teacher->deleted_at);
        $this->assertCount(0, Teacher::all());
        $this->assertCount(1, Teacher::withTrashed()->get());
    }

    public function test_name_mutator()
    {
        $teacher = new Teacher();
        $teacher->name = 'john doe';
        
        // The mutator should capitalize the first letter
        $this->assertEquals('John doe', $teacher->name);
    }

    public function test_phone_mutator()
    {
        $teacher = new Teacher();
        $teacher->phone = '+1-555-123-4567';
        
        // The mutator should remove non-digit characters
        $this->assertEquals('15551234567', $teacher->phone);
    }

    public function test_model_events()
    {
        $teacher = new Teacher();
        $teacher->name = 'Test Teacher';
        $teacher->email = 'test@example.com';
        $teacher->save();

        // Test that hire_date is set automatically if not provided
        $this->assertNotNull($teacher->hire_date);
    }

    public function test_salary_calculation_methods()
    {
        $teacher = Teacher::factory()->create([
            'salary' => 3000.00
        ]);

        // Test that salary is stored as decimal
        $this->assertEquals(3000.00, $teacher->salary);
        $this->assertIsFloat($teacher->salary);
    }

    public function test_qualification_field()
    {
        $teacher = Teacher::factory()->create([
            'qualification' => 'Bachelor of Education'
        ]);

        $this->assertEquals('Bachelor of Education', $teacher->qualification);
    }

    public function test_experience_years_field()
    {
        $teacher = Teacher::factory()->create([
            'experience_years' => 5
        ]);

        $this->assertEquals(5, $teacher->experience_years);
        $this->assertIsInt($teacher->experience_years);
    }
}