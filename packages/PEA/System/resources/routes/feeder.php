<?php

Route::group([
    'middleware' => ['web'],
    'as' => 'feeder.'
], function() {

    Route::get('/feeder/list', function () {
        return view('system::livewire.feeder.list');
    })->name('list');
});