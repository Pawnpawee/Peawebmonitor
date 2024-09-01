<?php

namespace PEA\Event\Support;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use PEA\Event\Livewire\Display\EventDetail;
use PEA\Event\Livewire\Display\EventList;

class EventServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'event');
        $this->loadRoutesFrom(__DIR__.'/../resources/routes/routes.php');
    }

    public function boot()
    {
        Livewire::component('livewire::display.event-list', EventList::class);
        Livewire::component('livewire::display.event-detail', EventDetail::class);
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
    }
}
