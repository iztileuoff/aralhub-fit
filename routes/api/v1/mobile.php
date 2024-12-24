<?php

use App\Http\Controllers\Api\V1\Mobile\ProfileController;

Route::group([
    'prefix'     => 'mobile',
    'as'         => 'mobile.',
], function () {
    Route::apiSingleton('profile', ProfileController::class);

});
