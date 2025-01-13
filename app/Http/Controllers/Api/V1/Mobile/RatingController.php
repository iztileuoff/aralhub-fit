<?php

namespace App\Http\Controllers\Api\V1\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Mobile\StoreRatingRequest;
use App\Http\Resources\V1\Mobile\RatingResource;
use App\Models\Rating;

class RatingController extends Controller
{
    public function store(StoreRatingRequest $request)
    {
        $data = $request->validated();

        $rating = Rating::firstOrCreate([
            'user_id' => $data['user_id'],
            'module_id' => $data['module_id'],
        ], [
            'rating' => $data['rating'],
        ]);

        return new RatingResource($rating);
    }
}
