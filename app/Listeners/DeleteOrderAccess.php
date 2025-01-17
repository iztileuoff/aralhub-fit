<?php

namespace App\Listeners;

use App\Events\OrderCancelled;
use App\Events\OrderPaid;
use App\Models\Order;
use App\Models\Pack;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeleteOrderAccess
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
        $order->accesses()->delete();
    }
}
