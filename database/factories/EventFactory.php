<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'start_datetime' => fake()->dateTime(),
            'end_datetime' => fake()->dateTime(),
            'location' => fake()->word(),
            'event_type' => fake()->word(),
            'organizer' => fake()->name(),
            'class_id' => null, // Will be set when needed
            'teacher_id' => null, // Will be set when needed
            'attendees' => json_encode([fake()->name(), fake()->name()]),
            'status' => fake()->randomElement(['confirmed', 'pending', 'cancelled']),
            'requires_confirmation' => fake()->boolean(),
            'is_public' => fake()->boolean(),
            'is_recurring' => fake()->boolean(),
            'recurrence_pattern' => fake()->word(),
            'recurrence_end_date' => fake()->optional()->date(),
            'recurring_days' => json_encode([fake()->dayOfWeek(), fake()->dayOfWeek()]),
            'send_reminders' => fake()->boolean(),
            'reminder_hours_before' => fake()->numberBetween(1, 48),
            'documents' => json_encode([fake()->word(), fake()->word()]),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}