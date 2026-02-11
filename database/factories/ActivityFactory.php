<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'scheduled_date' => fake()->date(),
            'estimated_duration' => fake()->numberBetween(30, 240), // in minutes
            'location' => fake()->word(),
            'teacher_id' => null, // Will be set when needed
            'class_id' => null, // Will be set when needed
            'curriculum_id' => null, // Will be set when needed
            'activity_type' => fake()->word(),
            'difficulty_level' => fake()->randomElement(['easy', 'medium', 'hard']),
            'required_materials' => json_encode([fake()->word(), fake()->word()]),
            'learning_objectives' => json_encode([fake()->sentence(), fake()->sentence()]),
        ];
    }
}