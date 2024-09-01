<?php

return [
    App\Providers\AppServiceProvider::class,
    \SocialiteProviders\Manager\ServiceProvider::class, // add
    PEA\Http\Providers\HttpServiceProvider::class,
    PEA\Event\Support\EventServiceProvider::class,
    Spatie\Html\HtmlServiceProvider::class,
    PEA\Admin\Providers\AdminServiceProvider::class,
    PEA\System\Providers\SystemServiceProvider::class,
    PEA\MeterSource\Providers\MeterServiceProvider::class
];