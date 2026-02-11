<?php

namespace Database\Factories;

use App\Models\Fee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fee>
 */
class FeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'amount' => fake()->randomFloat(2, 100, 1000),
            'description' => fake()->sentence(),
            'is_active' => true,
            'frequency' => fake()->randomElement(['once', 'monthly', 'yearly']),
            'category' => fake()->randomElement(['registration', 'tuition', 'materials', 'activity', 'transportation']),
            'due_date' => fake()->optional()->date(),
        ];
    }
}