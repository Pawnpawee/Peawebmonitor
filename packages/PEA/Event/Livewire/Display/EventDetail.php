<?php

namespace PEA\Event\Livewire\Display;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use PEA\Event\Domain\Event\Event;

class EventDetail extends
    Component
{
    use WithPagination;

    public $event;
    public $responses;

    public function mount($event)
    {
        $this->event = $event;
        $this->responses = $event->responses;
    }
    public function render()
    {
        return view('event::livewire.display.event-detail');
    }

}
