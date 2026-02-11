<?php

namespace Database\Factories;

use App\Models\AccountingEntry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccountingEntry>
 */
class AccountingEntryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccountingEntry::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->sentence(),
            'debit' => fake()->randomFloat(2, 0, 1000),
            'credit' => fake()->randomFloat(2, 0, 1000),
            'entry_date' => fake()->date(),
            'reference' => fake()->uuid(),
            'account_type' => fake()->word(),
        ];
    }
}