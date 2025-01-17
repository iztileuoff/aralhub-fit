<?php

namespace App\Listeners;

use App\Events\OrderPaid;
use App\Models\Order;
use App\Models\Pack;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateOrderAccess
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
    public function handle(OrderPaid $event): void
    {
        $order = Order::find($event->orderId);

        $pack = Pack::find(2)->load('modules');
        $positionNumber = 1;
        $userId = $order->user_id;

        foreach ($pack->modules as $module) {
            $order->accesses()->create([
                'module_id' => $module->id,
                'pack_id' => $pack->id,
                'user_id' => $userId,
                'is_view_finished' => false,
                'is_available' => $positionNumber == 1,
                'position_number' => $positionNumber++,
            ]);
        }
    }
}
