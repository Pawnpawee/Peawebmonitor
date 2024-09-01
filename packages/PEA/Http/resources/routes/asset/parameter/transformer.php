<?php

use PEA\Http\Controllers\Asset\Parameter\TransformerController;

Route::group([
    'prefix' => 'transformer',
    'as' => '.transformer'
], function (){

    Route::get('/list', [TransformerController::class, 'index'])
        ->name('.list');
    Route::get('/create', [TransformerController::class, 'create'])
        ->name('.create');
    Route::post('/store', [TransformerController::class, 'store'])
        ->name('.store');
    Route::get('/edit', [TransformerController::class, 'edit'])
        ->name('.edit');
    Route::patch('/update', [TransformerController::class, 'update'])
        ->name('.update');
    Route::delete('/delete', [TransformerController::class, 'delete'])
        ->name('.delete');

});