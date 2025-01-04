<?php

namespace App\Http\Controllers\Api\V1\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Mobile\StoreOrderRequest;
use App\Http\Resources\V1\Mobile\OrderCollection;
use App\Http\Resources\V1\Mobile\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = auth()->user()->orders()
            ->with('pack')
            ->orderBy('id', 'desc')
            ->get();

        return new OrderCollection($orders);
    }

    public function store(StoreOrderRequest $request)
    {
        return new OrderResource(Order::create($request->validated()));
    }
}
