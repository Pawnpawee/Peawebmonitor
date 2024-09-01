<?php


Route::group([
    'middleware' => ['web'],
    'prefix' => 'notification',
    'as' => 'notification.'
], function() {
    
    Route::get('/', function () {
        return view('system::livewire.notification.notification');
    })->name('index');

});
