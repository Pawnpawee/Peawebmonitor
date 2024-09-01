<?php

namespace PEA\Event\Database\Factories\Event;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use PEA\Event\Models\Event\Event;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'assignee_id' => fake()->randomNumber(),
            'device_id' => fake()->randomNumber(),
            'event' => fake()->randomElement(['uca', 'oca', 'uv', 'oc', 'po', 'normal']),
            'value' => fake()->randomNumber(2),
            'first_response_at' => fake()->dateTime,
            'state' => fake()->randomElement(['alarm', 'warning']),
            'token' => Str::random(),
        ];
    }
}
