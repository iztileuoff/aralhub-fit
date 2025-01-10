<?php

namespace App\Http\Resources\V1\Mobile;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Message */
class MessageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'is_sender_user' => $this->is_sender_user,
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}
