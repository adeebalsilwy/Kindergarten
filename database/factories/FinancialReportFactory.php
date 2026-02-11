<?php

namespace Database\Factories;

use App\Models\FinancialReport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FinancialReport>
 */
class FinancialReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FinancialReport::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'report_type' => fake()->randomElement(['general', 'monthly', 'quarterly', 'annual']),
            'generated_by' => null, // Will be set when needed
            'period_start' => fake()->date(),
            'period_end' => fake()->date(),
            'data' => [],
        ];
    }
}