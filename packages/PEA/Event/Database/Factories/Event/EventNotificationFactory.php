<?php

namespace PEA\Event\Database\Factories\Event;

use Illuminate\Database\Eloquent\Factories\Factory;
use PEA\Event\Models\Event\Event;
use PEA\Event\Models\Event\EventNotification;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventNotificationFactory extends Factory
{
    protected $model = EventNotification::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'template_id' => fake()->randomNumber(),
            'event_id' => Event::factory(),
            'type' => fake()->randomElement(['sms','email']),
        ];
    }
}
