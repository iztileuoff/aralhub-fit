<?php

namespace App\Http\Controllers\Api\V1\Mobile\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Mobile\OrderCollection;
use App\Http\Resources\V1\Mobile\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class ShowOrderController extends Controller
{
    public function __invoke(Order $order): OrderResource
    {
        return new OrderResource($order->load([
            'pack',
            'modules' => ['lessons:id,module_id,title,youtube_url,is_free'],
        ]));
    }
}
