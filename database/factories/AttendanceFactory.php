<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\Children;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attendance::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'child_id' => Children::factory(),
            'date' => fake()->date(),
            'status' => fake()->randomElement(['present', 'absent', 'sick', 'late', 'excused']),
            'check_in_time' => fake()->optional()->time(),
            'check_out_time' => fake()->optional()->time(),
            'absence_reason' => fake()->optional()->sentence(),
        ];
    }
}