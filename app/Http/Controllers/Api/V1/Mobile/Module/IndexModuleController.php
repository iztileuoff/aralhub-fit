<?php

namespace App\Http\Controllers\Api\V1\Mobile\Module;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Mobile\IndexModuleRequest;
use App\Http\Resources\V1\Mobile\ModuleCollection;
use App\Http\Resources\V1\Mobile\OrderCollection;
use App\Models\Order;
use Illuminate\Http\Request;

class IndexModuleController extends Controller
{
    public function __invoke(IndexModuleRequest $request): ModuleCollection
    {
        $order = Order::find($request->input('order_id'))->load(['modules' => ['lessons:id,module_id,title,youtube_url']]);

        return new ModuleCollection($order->modules);
    }
}
