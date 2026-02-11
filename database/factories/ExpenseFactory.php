<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expense::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'category' => fake()->word(),
            'description' => fake()->sentence(),
            'amount' => fake()->randomFloat(2, 50, 1000),
            'expense_date' => fake()->date(),
            'vendor' => fake()->company(),
            'receipt_number' => fake()->uuid(),
            'payment_method' => fake()->randomElement(['cash', 'bank_transfer', 'check']),
            'reference_number' => fake()->uuid(),
            'status' => fake()->randomElement(['pending', 'approved', 'paid', 'rejected']),
            'created_by' => null, // Will be set when needed
            'assigned_to' => null, // Will be set when needed
        ];
    }
}