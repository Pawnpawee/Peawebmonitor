<?php

namespace PEA\Event\Livewire\Display;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use PEA\Event\Models\Event\Event;


class EventList extends
    Component
{
    use WithPagination;

    #[Url(as: 'q')]
    public array $filters = [
        'status' => '',
        'seeder_id' => '',
        'name' => '',
        'event_id' => ''
    ];

    public function render()
    {
        $events = Event::filter($this->filters)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('event::livewire.display.event-list', compact('events'));
    }

}
