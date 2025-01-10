<?php

namespace App\Http\Resources\V1\Mobile;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @mixin Message */
class MessageCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'message' => 'Success.',
            'data' => $this->collection,
        ];
    }
}
