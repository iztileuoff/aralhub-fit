<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\SendCodeRequest;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class SendCodeController extends Controller
{
    public function __invoke(SendCodeRequest $request)
    {
        $user = User::firstOrCreate([
            'phone' => $request->phone
        ]);

        $sanitizePhoneNumber = preg_replace('/[^0-9]/', '', $request->phone);
//        $eskizService = new EskizService($sanitizePhoneNumber);

        $pinCode = 1234;
//        $pinCode = rand(1000,9999);
//        $message = "Ваш код подтверждения Fit: {$pinCode}";
//        $eskizService->sendSms($message);

        Cache::forget($user->phone);
        Cache::put($user->phone, $pinCode, now()->addMinutes(3));

        return response()->json([
            'message' => 'Success.',
        ]);
    }
}
