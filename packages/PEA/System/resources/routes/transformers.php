<?php


Route::group([
    'middleware' => ['web'],
    'prefix' => 'transformers',
    'as' => 'transformers.'
], function() {
    
    Route::get('list', function () {
        return view('system::livewire.transformers.list');
    })->name('list');
    
});
