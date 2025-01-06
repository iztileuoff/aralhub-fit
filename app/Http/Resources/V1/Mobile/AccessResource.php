<?php

namespace App\Http\Resources\V1\Mobile;

use App\Models\Access;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Access */
class AccessResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'order_id' => $this->order_id,
            'order' => new OrderResource($this->whenLoaded('order')),
            'pack_id' => $this->pack_id,
            'pack' => new PackResource($this->whenLoaded('pack')),
            'user_id' => $this->user_id,
            'user' => new UserResource($this->whenLoaded('user')),
            'is_view_finished' => $this->is_view_finished,
            'is_available' => $this->is_available,
            'module_id' => $this->module_id,
            'module' => new ModuleResource($this->whenLoaded('module')),
            'position_number' => $this->position_number,
        ];
    }
}
