<?php

namespace App\Http\Controllers\Api\V1\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Mobile\UpdateProfileRequest;
use App\Http\Resources\V1\Mobile\UserResource;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request): UserResource
    {
        return new UserResource(auth()->user()->load('target'));
    }

    public function update(UpdateProfileRequest $request): UserResource
    {
        return new UserResource(tap($request->user())->update($request->validated()));
    }
}
