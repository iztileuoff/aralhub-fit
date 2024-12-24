<?php

namespace App\Http\Controllers\Api\V1\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Mobile\TargetCollection;
use App\Models\Target;

class TargetController extends Controller
{
    public function index(): TargetCollection
    {
        $targets = Target::get();

        return new TargetCollection($targets);
    }
}
