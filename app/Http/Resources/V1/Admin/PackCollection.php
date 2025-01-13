<?php

namespace App\Http\Resources\V1\Admin;

use App\Models\Pack;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @mixin Pack */
class PackCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'message' => 'Success.',
            'data' => $this->collection,
        ];
    }
}
