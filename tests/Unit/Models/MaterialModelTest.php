<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Material;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MaterialModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_material_model_database_structure()
    {
        $material = Material::factory()->create();

        $this->assertDatabaseHas('materials', [
            'id' => $material->id,
            'name' => $material->name,
        ]);
    }

    public function test_material_model_fillable_attributes()
    {
        $fillable = [
            'name',
            'description',
            'category',
            'type',
            'quantity_available',
            'quantity_required',
            'unit_cost',
            'supplier',
            'storage_location',
            'is_consumable',
            'is_digital',
            'specifications',
            'is_active',
            'purchased_at',
            'created_by',
        ];

        $this->assertEquals($fillable, (new Material())->getFillable());
    }

    public function test_material_model_casts()
    {
        $material = Material::factory()->create([
            'quantity_available' => 10,
            'quantity_required' => 5,
            'unit_cost' => 99.99,
            'is_consumable' => true,
            'is_digital' => false,
            'is_active' => true,
            'specifications' => ['color' => 'red'],
        ]);

        $this->assertIsInt($material->quantity_available);
        $this->assertIsFloat($material->unit_cost);
        $this->assertTrue($material->is_consumable);
        $this->assertFalse($material->is_digital);
        $this->assertIsArray($material->specifications);
    }

    public function test_material_belongs_to_creator_relationship()
    {
        $material = Material::factory()->create();

        $relation = $material->creator();
        
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('created_by', $relation->getForeignKeyName());
    }

    public function test_material_belongs_to_many_curricula_relationship()
    {
        $material = Material::factory()->create();

        $relation = $material->curricula();
        
        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('curriculum_materials', $relation->getTable());
    }

    public function test_material_belongs_to_many_activities_relationship()
    {
        $material = Material::factory()->create();

        $relation = $material->activities();
        
        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('activity_materials', $relation->getTable());
    }

    public function test_material_belongs_to_many_classes_relationship()
    {
        $material = Material::factory()->create();

        $relation = $material->classes();
        
        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('class_materials', $relation->getTable());
    }

    public function test_active_scope()
    {
        Material::factory()->create(['is_active' => true]);
        Material::factory()->create(['is_active' => false]);

        $this->assertCount(1, Material::active()->get());
    }

    public function test_by_category_scope()
    {
        Material::factory()->create(['category' => 'educational_toys']);
        Material::factory()->create(['category' => 'arts_crafts']);

        $this->assertCount(1, Material::byCategory('educational_toys')->get());
    }

    public function test_by_name_scope()
    {
        Material::factory()->create(['name' => 'Colorful Blocks']);
        Material::factory()->create(['name' => 'Building Bricks']);

        $this->assertCount(1, Material::byName('Blocks')->get());
    }

    public function test_available_scope()
    {
        Material::factory()->create(['quantity_available' => 5]);
        Material::factory()->create(['quantity_available' => 0]);

        $this->assertCount(1, Material::available()->get());
    }

    public function test_consumable_scope()
    {
        Material::factory()->create(['is_consumable' => true]);
        Material::factory()->create(['is_consumable' => false]);

        $this->assertCount(1, Material::consumable()->get());
    }

    public function test_digital_scope()
    {
        Material::factory()->create(['is_digital' => true]);
        Material::factory()->create(['is_digital' => false]);

        $this->assertCount(1, Material::digital()->get());
    }

    public function test_formatted_cost_accessor()
    {
        $material = Material::factory()->create(['unit_cost' => 150.50]);
        $this->assertEquals('150.50 ريال يمني', $material->formatted_cost);
    }

    public function test_availability_status_accessor_in_stock()
    {
        $material = Material::factory()->create(['quantity_available' => 10, 'quantity_required' => 5]);
        $this->assertEquals('متوفر', $material->availability_status);
    }

    public function test_availability_status_accessor_low_stock()
    {
        $material = Material::factory()->create(['quantity_available' => 2, 'quantity_required' => 5]);
        $this->assertEquals('مخزون قليل', $material->availability_status);
    }

    public function test_availability_status_accessor_out_of_stock()
    {
        $material = Material::factory()->create(['quantity_available' => 0, 'quantity_required' => 5]);
        $this->assertEquals('نفد من المخزون', $material->availability_status);
    }

    public function test_is_available_accessor()
    {
        $available = Material::factory()->create(['quantity_available' => 5]);
        $unavailable = Material::factory()->create(['quantity_available' => 0]);

        $this->assertTrue($available->is_available);
        $this->assertFalse($unavailable->is_available);
    }

    public function test_status_accessor()
    {
        $active = Material::factory()->create(['is_active' => true, 'quantity_available' => 5]);
        $this->assertEquals('available', $active->status);
    }

    public function test_soft_deletes()
    {
        $material = Material::factory()->create();
        $material->delete();

        $this->assertSoftDeleted('materials', ['id' => $material->id]);
    }
}
