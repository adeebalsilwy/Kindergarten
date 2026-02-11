<?php

namespace Database\Factories;

use App\Models\Children;
use App\Models\Classes;
use App\Models\Guardian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Children>
 */
class ChildrenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Children::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'dob' => fake()->dateTimeBetween('-10 years', '-3 years'),
            'gender' => fake()->randomElement(['male', 'female']),
            'class_id' => null, // Will be set when needed
            'parent_id' => null, // Will be set when needed
            'second_parent_id' => null,
            'photo_path' => null,
            'fees_required' => fake()->randomFloat(2, 500, 2000),
            'fees_paid' => fake()->randomFloat(2, 0, 500),
            'emergency_contact_name' => fake()->name(),
            'emergency_contact_phone' => fake()->phoneNumber(),
            'emergency_contact_relation' => fake()->word(),
            'medical_conditions' => null,
            'allergies' => null,
            'medications' => null,
            'blood_type' => fake()->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'enrollment_date' => fake()->dateTimeThisYear(),
            'expected_graduation_date' => fake()->dateTimeBetween('+1 year', '+3 years'),
            'enrollment_status' => fake()->randomElement(['active', 'inactive', 'graduated']),
            'nationality' => fake()->country(),
            'religion' => fake()->word(),
            'special_needs' => null,
            'last_attended_at' => null,
        ];
    }
}