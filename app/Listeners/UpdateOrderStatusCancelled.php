<?php

namespace App\Listeners;

use App\Events\OrderCancelled;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateOrderStatusCancelled
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCancelled $event): void
    {
        $order = Order::find($event->orderId);

        $order->status = 'cancelled';
        $order->save();
    }
}
