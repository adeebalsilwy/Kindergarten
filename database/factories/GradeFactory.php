<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\Children;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grade::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'child_id' => Children::factory(),
            'subject' => fake()->word(),
            'score' => fake()->randomElement(['A+', 'A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D', 'F']),
            'date' => fake()->date(),
            'comments' => fake()->optional()->sentence(),
            'evaluator_id' => null, // Will be set when needed
        ];
    }
}