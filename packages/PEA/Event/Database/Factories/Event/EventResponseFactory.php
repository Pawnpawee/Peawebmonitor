<?php
namespace PEA\Event\Database\Factories\Event;

use Illuminate\Database\Eloquent\Factories\Factory;
use PEA\Event\Models\Event\EventNotification;
use PEA\Event\Models\Event\EventResponse;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventResponseFactory extends
    Factory
{
    protected $model = EventResponse::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_notification_id' => EventNotification::factory(),
            'comment' => fake()->sentence,
        ];
    }

}
