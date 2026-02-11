<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Children;
use App\Models\Fee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'child_id' => null, // Will be set when needed
            'fee_id' => null, // Will be set when needed
            'amount' => fake()->randomFloat(2, 50, 500),
            'payment_method' => fake()->randomElement(['cash', 'bank_transfer', 'credit_card', 'check', 'online']),
            'payment_date' => fake()->date(),
            'reference_number' => fake()->uuid(),
            'status' => fake()->randomElement(['completed', 'pending', 'failed', 'refunded']),
            'receipt_number' => fake()->uuid(),
        ];
    }
}