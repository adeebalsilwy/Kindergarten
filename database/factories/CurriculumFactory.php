<?php

namespace Database\Factories;

use App\Models\Curriculum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curriculum>
 */
class CurriculumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Curriculum::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'code' => fake()->unique()->word(),
            'description' => fake()->paragraph(),
            'objectives' => fake()->paragraph(),
            'learning_outcomes' => fake()->paragraph(),
            'grade_level' => fake()->word(),
            'subject_area' => fake()->word(),
            'topics' => json_encode([fake()->word(), fake()->word(), fake()->word()]),
            'materials_needed' => json_encode([fake()->word(), fake()->word()]),
            'curriculum_type' => fake()->randomElement(['standard', 'advanced', 'remedial']),
            'duration_weeks' => fake()->numberBetween(4, 24),
            'assessment_methods' => json_encode([fake()->word(), fake()->word()]),
            'is_active' => true,
            'published_at' => fake()->optional()->dateTime(),
        ];
    }
}