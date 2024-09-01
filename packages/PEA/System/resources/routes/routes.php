<?php

Route::group([
    'namespace' => 'PEA\System\Controllers',
    'middleware' => ['web'],
    'as' => 'system::'
], function() {
    include __DIR__ . '/microgrid.php';
    include __DIR__ . '/transformers.php';
    include __DIR__ . '/notification.php';
    include __DIR__ . '/feeder.php';
    include __DIR__ . '/area.php';
});

Route::group([
    'middleware' => ['web']
], function() {

    Route::get('/feeder/list/feeder-phase/{id}', function ($id) {
    return view('system::livewire.feeder-phase.list', ['id' => $id]);
})->name('feeder-phase');

});





