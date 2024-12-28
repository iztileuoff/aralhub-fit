<?php

use App\Http\Controllers\Api\V1\Mobile\Lesson\IndexFreeLessonController;
use App\Http\Controllers\Api\V1\Mobile\Lesson\IndexRandomFreeLessonController;
use App\Http\Controllers\Api\V1\Mobile\LessonController;
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
    Route::apiResource('lessons', LessonController::class)->only('index', 'show');

    Route::get('random-free-lessons', IndexRandomFreeLessonController::class)->name('random-free-lessons');
    Route::get('free-lessons', IndexFreeLessonController::class)->name('free-lessons');
});
