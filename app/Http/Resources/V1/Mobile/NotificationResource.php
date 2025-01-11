<?php

namespace App\Http\Resources\V1\Mobile;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Notification */
class NotificationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'is_viewed' => $this->whenCounted('users'),
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}
