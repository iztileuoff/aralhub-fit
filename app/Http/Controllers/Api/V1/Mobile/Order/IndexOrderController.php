<?php

namespace App\Http\Controllers\Api\V1\Mobile\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Mobile\OrderCollection;
use Illuminate\Http\Request;

class IndexOrderController extends Controller
{
    public function __invoke(Request $request): OrderCollection
    {
        $orders = auth()->user()->orders()
            ->where('status', 'success')
            ->with('pack')
            ->orderBy('id', 'desc')
            ->get();

        return new OrderCollection($orders);
    }
}
