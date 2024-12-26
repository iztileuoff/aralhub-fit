<?php

namespace App\Http\Resources\V1\Mobile;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Module */
class ModuleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'pack_id' => $this->pack_id,
            'pack' => new PackResource($this->whenLoaded('pack')),
        ];
    }
}
