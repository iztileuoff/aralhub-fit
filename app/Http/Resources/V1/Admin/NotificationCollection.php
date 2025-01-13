<?php

namespace App\Http\Resources\V1\Admin;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @mixin Notification */
class NotificationCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'message' => 'Success.',
            'data' => $this->collection,
        ];
    }
}
