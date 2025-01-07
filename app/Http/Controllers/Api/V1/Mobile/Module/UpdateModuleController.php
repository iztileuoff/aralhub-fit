<?php

namespace App\Http\Controllers\Api\V1\Mobile\Module;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Mobile\IndexModuleRequest;
use App\Http\Resources\V1\Mobile\ModuleCollection;
use App\Http\Resources\V1\Mobile\OrderCollection;
use App\Models\Module;
use App\Models\Order;
use Illuminate\Http\Request;

class UpdateModuleController extends Controller
{
    public function __invoke(IndexModuleRequest $request, Module $module)
    {
        // TODO
    }
}
