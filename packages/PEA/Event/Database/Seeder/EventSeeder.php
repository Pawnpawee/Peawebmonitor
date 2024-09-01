<?php

namespace PEA\Event\Database\Seeder;

use Illuminate\Database\Seeder;
use PEA\Event\Models\Event\Event;
use PEA\Event\Models\Event\EventNotification;
use PEA\Event\Models\Event\EventResponse;

class EventSeeder extends Seeder
{
    public function run()
    {
        Event::factory()
            ->count(10)
            ->create()
            ->each(function (Event $event) {
                $notifications = EventNotification::factory()
                    ->count(rand(1, 5)) // Each event has 1 to 5 notifications
                    ->make();

                $event->notifications()->saveMany($notifications);

                $notifications->each(function (EventNotification $notification) {
                    $responses = EventResponse::factory()
                        ->count(rand(1, 3)) // Each notification has 1 to 3 responses
                        ->make();

                    $notification->responses()->saveMany($responses);
                });
            });
    }
}
