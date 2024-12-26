<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Mobile\UpdateProfileRequest;
use App\Http\Resources\V1\Admin\AdminResource;
use App\Http\Resources\V1\Mobile\UserResource;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request): AdminResource
    {
        return new AdminResource(auth()->user());
    }

    public function update(UpdateProfileRequest $request): AdminResource
    {
        return new AdminResource(tap($request->user())->update($request->validated()));
    }
}
