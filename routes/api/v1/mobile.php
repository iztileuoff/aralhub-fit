<?php

use App\Http\Controllers\Api\V1\Mobile\ModuleController;
use App\Http\Controllers\Api\V1\Mobile\PackController;
use App\Http\Controllers\Api\V1\Mobile\ProfileController;
use App\Http\Controllers\Api\V1\Mobile\TargetController;

Route::group([
    'prefix'     => 'mobile',
    'as'         => 'mobile.',
    'middleware' => 'auth:sanctum',
], function () {
    Route::apiSingleton('profile', ProfileController::class);
    Route::apiResource('targets', TargetController::class)->only('index');
    Route::apiResource('packs', PackController::class)->only('index');
    Route::apiResource('modules', ModuleController::class)->only('index');
});
