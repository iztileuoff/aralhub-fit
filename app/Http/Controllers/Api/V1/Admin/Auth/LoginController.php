<?php

namespace App\Http\Controllers\Api\V1\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\LoginRequest;
use App\Http\Resources\V1\Admin\AdminResource;
use App\Http\Resources\V1\Mobile\UserResource;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $admin = Admin::where('phone', $request->phone)->first();

        if (!$admin || !Hash::check($request->input('password'), $admin->password)) {
            throw ValidationException::withMessages([
                'phone' => 'Incorrect phone or password!',
            ]);
        }

        $device = substr($request->userAgent() ?? '', 0, 255);
        $accessToken = $admin->createToken($device)->plainTextToken;

        return response()->json([
            'message' => 'Success.',
            'data' => [
                'admin' => new AdminResource($admin),
                'access_token' => $accessToken,
                'token_type' => 'Bearer'
            ]
        ]);
    }
}
