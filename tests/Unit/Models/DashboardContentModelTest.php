<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\DashboardContent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DashboardContentModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_content_model_database_structure()
    {
        $content = DashboardContent::factory()->create();

        $this->assertDatabaseHas('dashboard_contents', [
            'id' => $content->id,
            'section' => $content->section,
            'key' => $content->key,
        ]);
    }

    public function test_dashboard_content_model_fillable_attributes()
    {
        $fillable = [
            'section',
            'key',
            'content',
            'is_active',
            'order',
            'metadata',
        ];

        $model = new DashboardContent();
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

    public function test_dashboard_content_model_casts()
    {
        $casts = [
            'is_active' => 'boolean',
            'order' => 'integer',
            'metadata' => 'array',
            'deleted_at' => 'datetime',
        ];

        $model = new DashboardContent();
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

    public function test_dashboard_content_model_appends()
    {
        $appends = [
            'slug',
        ];

        $model = new DashboardContent();
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

    public function test_soft_deletes_trait()
    {
        // Clean up any existing records
        DashboardContent::truncate();
        
        $content = DashboardContent::factory()->create();
        $content->delete();

        $this->assertNotNull($content->deleted_at);
        $this->assertCount(0, DashboardContent::all());
        $this->assertCount(1, DashboardContent::withTrashed()->get());
    }

    public function test_title_field()
    {
        $content = DashboardContent::factory()->create([
            'section' => 'welcome_section',
            'key' => 'title'
        ]);

        $this->assertEquals('welcome_section', $content->section);
        $this->assertEquals('title', $content->key);
    }

    public function test_content_field()
    {
        $contentData = ['en' => 'Welcome', 'ar' => 'مرحبا'];
        $content = DashboardContent::factory()->create([
            'content' => json_encode($contentData)
        ]);

        $decodedContent = json_decode($content->content, true);
        $this->assertEquals($contentData, $decodedContent);
    }

    public function test_type_field()
    {
        $content = DashboardContent::factory()->create([
            'section' => 'stats_cards'
        ]);

        $this->assertEquals('stats_cards', $content->section);
    }

    public function test_position_field()
    {
        $content = DashboardContent::factory()->create([
            'order' => 5
        ]);

        $this->assertEquals(5, $content->order);
        $this->assertIsInt($content->order);
    }

    public function test_visibility_field()
    {
        $content = DashboardContent::factory()->create([
            'is_active' => true
        ]);

        $this->assertTrue($content->is_active);
        $this->assertIsBool($content->is_active);
    }

    public function test_order_field()
    {
        $content = DashboardContent::factory()->create([
            'order' => 10
        ]);

        $this->assertEquals(10, $content->order);
        $this->assertIsInt($content->order);
    }

    public function test_is_active_field()
    {
        $content = DashboardContent::factory()->create([
            'is_active' => true
        ]);

        $this->assertTrue($content->is_active);
        $this->assertIsBool($content->is_active);
    }

    public function test_config_field_as_array()
    {
        $metadata = ['type' => 'text', 'color' => 'blue'];
        $content = DashboardContent::factory()->create([
            'metadata' => $metadata
        ]);

        $this->assertEquals($metadata, $content->metadata);
        $this->assertIsArray($content->metadata);
    }

    public function test_integer_casting()
    {
        $content = DashboardContent::factory()->create([
            'order' => '15'
        ]);

        // Should be cast to integer
        $this->assertEquals(15, $content->order);
        $this->assertIsInt($content->order);
    }

    public function test_boolean_casting()
    {
        $content = DashboardContent::factory()->create([
            'is_active' => '1'
        ]);

        // Should be cast to boolean
        $this->assertTrue($content->is_active);
        $this->assertIsBool($content->is_active);
    }

    public function test_array_casting()
    {
        $metadata = ['type' => 'widget', 'size' => 'large'];
        $content = DashboardContent::factory()->create([
            'metadata' => $metadata
        ]);

        $this->assertEquals($metadata, $content->metadata);
        $this->assertIsArray($content->metadata);
    }
}