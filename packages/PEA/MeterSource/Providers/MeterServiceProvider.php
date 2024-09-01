<?php

namespace PEA\MeterSource\Providers;

use Illuminate\Support\ServiceProvider;
use PEA\MeterSource\Console\Commands\MeterSourceSchedule;

class MeterServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (!app()->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__ . '/../resources/config.php', 'pea');
        }
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerCommands();
    }

    protected function registerCommands()
    {
        if (app()->runningInConsole()) {
            $this->commands([MeterSourceSchedule::class]);
        }
    }
}
