<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'date_of_birth' => fake()->date(),
            'gender' => fake()->randomElement(['male', 'female']),
            'qualification' => fake()->word(),
            'experience' => fake()->sentence(),
            'salary' => fake()->randomFloat(2, 2000, 8000),
            'hire_date' => fake()->date(),
            'photo_path' => null,
            'is_active' => true,
            'notes' => fake()->optional()->sentence(),
            'specialization' => fake()->word(),
            'experience_years' => fake()->numberBetween(0, 30),
        ];
    }
}