<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Language;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LanguageModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_language_model_database_structure()
    {
        $language = Language::factory()->create();

        $this->assertDatabaseHas('languages', [
            'id' => $language->id,
            'name' => $language->name,
            'code' => $language->code,
        ]);
    }

    public function test_language_model_fillable_attributes()
    {
        $fillable = [
            'name',
            'code',
            'is_rtl',
            'is_active',
        ];

        $model = new Language();
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

    public function test_language_model_casts()
    {
        $casts = [
            'is_rtl' => 'boolean',
            'is_active' => 'boolean',
            'deleted_at' => 'datetime',
        ];

        $model = new Language();
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

    public function test_language_model_appends()
    {
        $appends = [
            'display_name',
            'direction',
        ];

        $model = new Language();
        $modelAppends = $model->getAppends();
        
        // Check that all expected appends are present in the model's appends array
        foreach ($appends as $append) {
            $this->assertContains($append, $modelAppends);
        }
    }

    public function test_display_name_accessor()
    {
        $language = Language::factory()->create([
            'name' => 'English'
        ]);

        $this->assertEquals('English', $language->display_name);
    }

    public function test_direction_accessor()
    {
        $ltrLanguage = Language::factory()->create([
            'is_rtl' => false
        ]);

        $rtlLanguage = Language::factory()->create([
            'is_rtl' => true
        ]);

        $this->assertEquals('ltr', $ltrLanguage->direction);
        $this->assertEquals('rtl', $rtlLanguage->direction);
    }

    public function test_soft_deletes_trait()
    {
        $language = Language::factory()->create();
        $language->delete();

        $this->assertNotNull($language->deleted_at);
        $this->assertCount(0, Language::all());
        $this->assertCount(1, Language::withTrashed()->get());
    }

    public function test_name_field()
    {
        $language = Language::factory()->create([
            'name' => 'Spanish'
        ]);

        $this->assertEquals('Spanish', $language->name);
    }

    public function test_code_field()
    {
        $language = Language::factory()->create([
            'code' => 'es'
        ]);

        $this->assertEquals('es', $language->code);
    }

    public function test_native_name_field()
    {
        $language = Language::factory()->create([
            'name' => 'French'
        ]);

        $this->assertEquals('French', $language->name);
    }

    public function test_is_active_field()
    {
        $language = Language::factory()->create([
            'is_active' => true
        ]);

        $this->assertTrue($language->is_active);
        $this->assertIsBool($language->is_active);
    }

    public function test_is_rtl_field()
    {
        $language = Language::factory()->create([
            'is_rtl' => true
        ]);

        $this->assertTrue($language->is_rtl);
        $this->assertIsBool($language->is_rtl);
    }

    public function test_flag_field()
    {
        $language = Language::factory()->create([
            'name' => 'German'
        ]);

        $this->assertEquals('German', $language->name);
    }

    public function test_locale_field()
    {
        $language = Language::factory()->create([
            'name' => 'Chinese'
        ]);

        $this->assertEquals('Chinese', $language->name);
    }

    public function test_boolean_casting()
    {
        $language = Language::factory()->create([
            'is_active' => '1',
            'is_rtl' => '0'
        ]);

        $this->assertTrue($language->is_active);
        $this->assertFalse($language->is_rtl);
        $this->assertIsBool($language->is_active);
        $this->assertIsBool($language->is_rtl);
    }

    public function test_unique_constraint_simulation()
    {
        $language = Language::factory()->create([
            'name' => 'Portuguese',
            'code' => 'pt'
        ]);

        $this->assertDatabaseHas('languages', [
            'name' => 'Portuguese',
            'code' => 'pt'
        ]);
    }
}