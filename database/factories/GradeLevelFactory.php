<?php

namespace Database\Factories;

use App\Models\GradeLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradeLevelFactory extends Factory
{
    protected $model = GradeLevel::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word() . ' Grade',
            'code' => $this->faker->unique()->regexify('[A-Z]{2}[0-9]{2}'),
            'description' => $this->faker->sentence(),
            'min_age' => $this->faker->numberBetween(2, 5),
            'max_age' => $this->faker->numberBetween(5, 8),
            'order' => $this->faker->unique()->numberBetween(1, 10),
        ];
    }
}
