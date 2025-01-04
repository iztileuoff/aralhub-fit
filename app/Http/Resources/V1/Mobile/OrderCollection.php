<?php

namespace App\Http\Resources\V1\Mobile;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @mixin Module */
class OrderCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'message' => 'Success.',
            'data' => $this->collection,
        ];
    }
}
