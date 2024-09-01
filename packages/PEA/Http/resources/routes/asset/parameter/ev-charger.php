<?php

use PEA\Http\Controllers\Asset\Parameter\EVChargerController;

Route::group([
    'prefix' => 'ev-charger',
    'as' => '.ev-charger'
], function (){

    Route::get('/list', [EVChargerController::class, 'index'])
        ->name('.list');
    Route::get('/create', [EVChargerController::class, 'create'])
        ->name('.create');
    Route::post('/store', [EVChargerController::class, 'store'])
        ->name('.store');
    Route::get('/edit', [EVChargerController::class, 'edit'])
        ->name('.edit');
    Route::patch('/update', [EVChargerController::class, 'update'])
        ->name('.update');
    Route::delete('/delete', [EVChargerController::class, 'delete'])
        ->name('.delete');

});