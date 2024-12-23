<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Resources\V1\Mobile\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $code = Cache::get($request->phone);

        if ($request->verification_code != $code) {
            throw ValidationException::withMessages([
                'code' => 'Kiritken kodıńız qáte.'
            ]);
        }

        Cache::forget($request->phone);
        $user = User::where('phone', $request->phone)->first();
        $user->tokens()->delete();

        $device = substr($request->userAgent() ?? '', 0, 255);
        $accessToken = $user->createToken($device)->plainTextToken;

        return response()->json([
            'message' => 'Success.',
            'data' => [
                'user' => new UserResource($user),
                'access_token' => $accessToken,
                'token_type' => 'Bearer'
            ]
        ]);
    }
}
