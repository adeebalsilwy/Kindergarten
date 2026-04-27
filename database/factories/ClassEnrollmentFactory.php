<?php

namespace Database\Factories;

use App\Models\ClassEnrollment;
use App\Models\Classes;
use App\Models\Children;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassEnrollmentFactory extends Factory
{
    protected $model = ClassEnrollment::class;

    public function definition(): array
    {
        return [
            'class_id' => Classes::factory(),
            'child_id' => Children::factory(),
            'enrollment_date' => $this->faker->date(),
            'withdrawal_date' => null,
            'status' => $this->faker->randomElement(['active', 'inactive', 'transferred', 'completed']),
            'reason' => $this->faker->sentence(),
            'created_by' => User::factory(),
        ];
    }
}
