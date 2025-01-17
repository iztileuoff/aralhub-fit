<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Admin\UserCollection;
use App\Http\Resources\V1\Admin\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::when($request->input('search'), function ($query) use ($request) {
            $query->search($request->input('search'));
        })
            ->orderBy('id', 'desc')
            ->paginate($request->input('per_page', 10));

        return new UserCollection($users);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }
}
