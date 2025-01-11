<?php

namespace App\Http\Controllers\Api\V1\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Mobile\NotificationCollection;
use App\Http\Resources\V1\Mobile\ShowNotificationResource;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $notifications = Notification::orderBy('id', 'desc')
            ->withCount('users')
            ->select('id', 'title', 'created_at')
            ->cursorPaginate($request->input('per_page', 15));

        return new NotificationCollection($notifications);
    }

    public function show(Notification $notification)
    {
        $notification->users()->syncWithoutDetaching([auth()->user()->id]);

        return new ShowNotificationResource($notification);
    }
}
