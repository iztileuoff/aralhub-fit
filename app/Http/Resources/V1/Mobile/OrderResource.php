<?php

namespace App\Http\Resources\V1\Mobile;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Order */
class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user' => new UserResource($this->whenLoaded('user')),
            'pack_id' => $this->pack_id,
            'pack' => new PackResource($this->whenLoaded('pack')),
            'amount' => $this->amount / 100,
            'status' => $this->status,
            'modules' => ModuleResource::collection($this->whenLoaded('modules')),
            'payments' => [
                'payme_url' => $this->payme_url,
            ],
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}
