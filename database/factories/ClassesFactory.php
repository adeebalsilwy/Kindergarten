<?php

namespace Database\Factories;

use App\Models\Classes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classes>
 */
class ClassesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Classes::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word().' '.fake()->numberBetween(1, 12),
            'code' => fake()->unique()->bothify('CLS-??'),
            'description' => fake()->sentence(),
            'teacher_id' => null, // Will be set when needed
            'age_group' => fake()->randomElement(['toddlers', 'preschool', 'pre_k', 'kindergarten']),
            'capacity' => fake()->numberBetween(10, 30),
            'current_students' => fake()->numberBetween(0, 25),
            'start_time' => fake()->time(),
            'end_time' => fake()->time(),
            'room_number' => fake()->buildingNumber(),
            'monthly_fee' => fake()->randomFloat(2, 500, 2000),
            'is_active' => true,
            'curriculum' => fake()->randomElement(['Mathematics', 'Science', 'Language Arts', 'Social Studies', 'Art', 'Music']),
        ];
    }
}