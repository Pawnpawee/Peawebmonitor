<?php
use PEA\System\Controllers\MicrogridController;


Route::group([
    'middleware' => ['web'],
    'as' => 'microgrid.'
], function() {
    
    Route::get('/microgrid/list',[MicrogridController::class, 'list'])->name('list');
});

