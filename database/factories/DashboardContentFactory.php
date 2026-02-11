<?php

namespace Database\Factories;

use App\Models\DashboardContent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DashboardContent>
 */
class DashboardContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DashboardContent::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'section' => fake()->word(),
            'key' => fake()->word(),
            'content' => json_encode(['en' => fake()->sentence(), 'ar' => fake()->sentence()]),
            'is_active' => fake()->boolean(),
            'order' => fake()->numberBetween(0, 100),
            'metadata' => json_encode(['type' => fake()->word()]),
        ];
    }
}