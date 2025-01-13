<?php

namespace App\Http\Resources\V1\Admin;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @mixin Module */
class ModuleCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'message' => 'Success.',
            'data' => $this->collection,
        ];
    }
}
