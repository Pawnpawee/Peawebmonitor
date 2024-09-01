<?php

namespace PEA\System\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use PEA\System\Livewire\Area\AddArea;
use PEA\System\Livewire\Area\DelArea;
use PEA\System\Livewire\Area\EditArea;
use PEA\System\Livewire\Area\ListArea;
use PEA\System\Livewire\Area\SearchArea;
use PEA\System\Livewire\Microgrid\EditGrid;
use PEA\System\Livewire\Microgrid\AddGrid;
use PEA\System\Livewire\Microgrid\DelGrid;
use PEA\System\Livewire\Microgrid\SearchGrid;
use PEA\System\Livewire\Microgrid\TableGrid;
use PEA\System\Livewire\Microgrid\ViewGrid;
use PEA\System\Livewire\Transformers\AddTransformers;
use PEA\System\Livewire\Transformers\DelTransformers;
use PEA\System\Livewire\Transformers\EditTransformers;
use PEA\System\Livewire\Transformers\ListTransformers;
use PEA\System\Livewire\Transformers\SearchTransformers;
use PEA\System\Livewire\Transformers\ViewTransformers;
use PEA\System\Livewire\Notification\AddNoti;
use PEA\System\Livewire\Notification\DelNoti;
use PEA\System\Livewire\Notification\EditNoti;
use PEA\System\Livewire\Notification\ListNoti;
use PEA\System\Livewire\Notification\SearchNoti;
use PEA\System\Livewire\Notification\ViewNoti;
use PEA\System\Livewire\Feeder\AddFeeder;
use PEA\System\Livewire\Feeder\DelFeeder;
use PEA\System\Livewire\Feeder\EditFeeder;
use PEA\System\Livewire\Feeder\ListFeeder;
use PEA\System\Livewire\Feeder\SearchFeeder;
use PEA\System\Livewire\FeederPhase\AddFeederPhase;
use PEA\System\Livewire\FeederPhase\DelFeederPhase;
use PEA\System\Livewire\FeederPhase\EditFeederPhase;
use PEA\System\Livewire\FeederPhase\ListFeederPhase;
use PEA\System\Livewire\FeederPhase\SearchFeederPhase;
use PEA\System\Livewire\FeederPhase\ViewFeederPhase;


class SystemServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'system');
		$this->loadRoutesFrom(__DIR__ . '/../resources/routes/routes.php');
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
        Livewire::component('add-grid', AddGrid::class);
        Livewire::component('table-grid', TableGrid::class);
        Livewire::component('edit-grid', EditGrid::class);
        Livewire::component('del-grid', DelGrid::class);
        Livewire::component('search-grid', SearchGrid::class);
        Livewire::component('view-grid', ViewGrid::class);

        Livewire::component('add-transformer', AddTransformers::class);
        Livewire::component('list-transformer', ListTransformers::class);
        Livewire::component('search-transformer', SearchTransformers::class);
        Livewire::component('edit-transformer', EditTransformers::class);
        Livewire::component('del-transformer', DelTransformers::class);
        Livewire::component('view-transformer', ViewTransformers::class);

        Livewire::component('list-noti', ListNoti::class);
        Livewire::component('add-noti', AddNoti::class);
        Livewire::component('search-noti', SearchNoti::class);
        Livewire::component('edit-noti', EditNoti::class);
        Livewire::component('del-noti', DelNoti::class);
        Livewire::component('view-noti', ViewNoti::class);

        Livewire::component('list-feeder', ListFeeder::class);
        Livewire::component('add-feeder', AddFeeder::class);
        Livewire::component('search-feeder', SearchFeeder::class);
        Livewire::component('edit-feeder', EditFeeder::class);
        Livewire::component('del-feeder', DelFeeder::class);

        Livewire::component('list-phase', ListFeederPhase::class);
        Livewire::component('add-phase', AddFeederPhase::class);
        Livewire::component('search-phase', SearchFeederPhase::class);
        Livewire::component('edit-phase', EditFeederPhase::class);
        Livewire::component('del-phase', DelFeederPhase::class);
        Livewire::component('view-phase', ViewFeederPhase::class);

        Livewire::component('add-area', AddArea::class);
        Livewire::component('list-area', ListArea::class);
        Livewire::component('edit-area', EditArea::class);
        Livewire::component('del-area', DelArea::class);
        Livewire::component('search-area', SearchArea::class);
        

    }
}
