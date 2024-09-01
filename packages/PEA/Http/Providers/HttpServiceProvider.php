<?php

namespace PEA\Http\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use PEA\Http\Livewire\Dashboard\Map;
use PEA\Http\Livewire\Dashboard\EventSideBar;

class HttpServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'http');
		$this->loadRoutesFrom(__DIR__ . '/../resources/routes/routes.php');
        // $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        if (!app()->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__ . '/../resources/config.php', 'pea');
        }
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerLivewireComponents();
    }

    protected function registerLivewireComponents()
    {
        Livewire::component('dashboard::map', Map::class);
        Livewire::component('dashboard::event-sidebar', EventSideBar::class);

    }
}
