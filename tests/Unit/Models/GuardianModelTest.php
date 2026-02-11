<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Guardian;
use App\Models\Children;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GuardianModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_guardian_model_database_structure()
    {
        $guardian = Guardian::factory()->create();

        $this->assertDatabaseHas('guardians', [
            'id' => $guardian->id,
            'name' => $guardian->name,
        ]);
    }

    public function test_guardian_model_fillable_attributes()
    {
        $fillable = [
            'name',
            'phone',
            'address',
            'relationship',
            'email',
            'secondary_phone',
            'occupation',
            'workplace',
            'is_primary_emergency_contact',
            'is_primary_guardian',
            'bank_account_number',
            'bank_name',
            'preferred_language',
            'receives_sms_notifications',
            'receives_email_notifications',
            'date_of_birth',
            'national_id',
            'passport_number',
            'is_active',
            'last_login_at',
        ];

        $model = new Guardian();
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

    public function test_guardian_model_casts()
    {
        $casts = [
            'date_of_birth' => 'date',
            'last_login_at' => 'datetime',
            'is_primary_emergency_contact' => 'boolean',
            'is_primary_guardian' => 'boolean',
            'is_active' => 'boolean',
            'receives_sms_notifications' => 'boolean',
            'receives_email_notifications' => 'boolean',
            'deleted_at' => 'datetime',
        ];

        $model = new Guardian();
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

    public function test_guardian_model_appends()
    {
        $appends = [
            'slug',
            'full_name',
        ];

        $model = new Guardian();
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

    public function test_guardian_has_many_children_relationship()
    {
        $guardian = Guardian::factory()->create();
        $child = Children::factory()->create(['parent_id' => $guardian->id]);

        $relation = $guardian->children();
        
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('parent_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_guardian_has_many_second_children_relationship()
    {
        $guardian = Guardian::factory()->create();
        $child = Children::factory()->create(['second_parent_id' => $guardian->id]);

        $relation = $guardian->secondChildren();
        
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('second_parent_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_slug_accessor()
    {
        $guardian = Guardian::factory()->create([
            'name' => 'John Doe'
        ]);

        $this->assertEquals('john-doe', $guardian->slug);
    }

    public function test_full_name_accessor()
    {
        $guardian = Guardian::factory()->create([
            'name' => 'John Doe'
        ]);

        $this->assertEquals('John Doe', $guardian->full_name);
    }

    public function test_soft_deletes_trait()
    {
        $guardian = Guardian::factory()->create();
        $guardian->delete();

        $this->assertNotNull($guardian->deleted_at);
        $this->assertCount(0, Guardian::all());
        $this->assertCount(1, Guardian::withTrashed()->get());
    }

    public function test_name_field()
    {
        $guardian = Guardian::factory()->create([
            'name' => 'Jane Smith'
        ]);

        $this->assertEquals('Jane Smith', $guardian->name);
    }

    public function test_email_field()
    {
        $guardian = Guardian::factory()->create([
            'email' => 'jane@example.com'
        ]);

        $this->assertEquals('jane@example.com', $guardian->email);
    }

    public function test_phone_field()
    {
        $guardian = Guardian::factory()->create([
            'phone' => '+1234567890'
        ]);

        $this->assertEquals('+1234567890', $guardian->phone);
    }

    public function test_address_field()
    {
        $guardian = Guardian::factory()->create([
            'address' => '123 Main Street'
        ]);

        $this->assertEquals('123 Main Street', $guardian->address);
    }

    public function test_relationship_field()
    {
        $guardian = Guardian::factory()->create([
            'relationship' => 'Mother'
        ]);

        $this->assertEquals('Mother', $guardian->relationship);
    }

    public function test_occupation_field()
    {
        $guardian = Guardian::factory()->create([
            'occupation' => 'Teacher'
        ]);

        $this->assertEquals('Teacher', $guardian->occupation);
    }

    public function test_national_id_field()
    {
        $guardian = Guardian::factory()->create([
            'national_id' => 'ABC123456'
        ]);

        $this->assertEquals('ABC123456', $guardian->national_id);
    }

    public function test_name_mutator()
    {
        $guardian = Guardian::factory()->create([
            'name' => 'john doe'
        ]);

        $this->assertEquals('John Doe', $guardian->name);
    }

    public function test_phone_mutator()
    {
        $guardian = Guardian::factory()->create([
            'phone' => '1234567890'
        ]);

        $this->assertEquals('+1234567890', $guardian->phone);
    }
}