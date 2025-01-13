<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\StoreNotificationRequest;
use App\Http\Requests\Api\V1\Admin\UpdateNotificationRequest;
use App\Http\Resources\V1\Admin\NotificationCollection;
use App\Http\Resources\V1\Admin\NotificationResource;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $notifications = Notification::orderBy('id', 'desc')
            ->withCount('users')
            ->paginate($request->input('per_page', 10));

        return new NotificationCollection($notifications);
    }

    public function store(StoreNotificationRequest $request)
    {
        return new NotificationResource(Notification::create($request->validated()));
    }

    public function show(Notification $notification)
    {
        return new NotificationResource($notification);
    }

    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        return new NotificationResource(tap($notification)->update($request->validated()));
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();

        return response()->json([
            "message" => "Success."
        ]);
    }
}
