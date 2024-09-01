<?php


Route::group([
    'middleware' => ['web'],
    'as' => 'area.'
], function() {
    
    Route::get('/area/list', function () {
        return view('system::livewire.area.list');
    })->name('list');
});

