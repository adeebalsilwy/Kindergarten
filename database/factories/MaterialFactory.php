<?php

namespace Database\Factories;

use App\Models\Material;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    protected $model = Material::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word() . ' ' . $this->faker->word(),
            'description' => $this->faker->sentence(),
            'category' => $this->faker->randomElement([
                'arts_crafts', 'educational_toys', 'reading_materials', 
                'music_movement', 'digital_learning', 'furniture', 'hygiene', 'emergency'
            ]),
            'type' => $this->faker->randomElement(['consumable', 'reusable', 'digital']),
            'quantity_available' => $this->faker->numberBetween(0, 100),
            'quantity_required' => $this->faker->numberBetween(5, 50),
            'unit_cost' => $this->faker->randomFloat(2, 10, 1000),
            'supplier' => $this->faker->company(),
            'storage_location' => $this->faker->word(),
            'is_consumable' => $this->faker->boolean(),
            'is_digital' => $this->faker->boolean(),
            'specifications' => ['color' => $this->faker->colorName(), 'size' => $this->faker->word()],
            'is_active' => true,
            'purchased_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'created_by' => User::factory(),
        ];
    }
}
