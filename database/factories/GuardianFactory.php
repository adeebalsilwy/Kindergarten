<?php

namespace Database\Factories;

use App\Models\Guardian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guardian>
 */
class GuardianFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Guardian::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'phone' => fake()->optional()->phoneNumber(),
            'address' => fake()->optional()->address(),
            'relationship' => fake()->randomElement(['Father', 'Mother', 'Guardian', 'Grandfather', 'Grandmother', 'Uncle', 'Aunt']),
        ];
    }
}