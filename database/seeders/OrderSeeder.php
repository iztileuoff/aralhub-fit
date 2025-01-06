<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Pack;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $order = Order::create([
            'user_id' => 2,
            'pack_id' => 1,
            'amount' => 8000000,
            'status' => 'new',
        ]);

        $order = Order::create([
            'user_id' => 2,
            'pack_id' => 2,
            'amount' => 8000015,
            'status' => 'success',
        ]);

        $pack = Pack::find(2)->load('modules');
        $positionNumber = 1;

        foreach ($pack->modules as $module) {
            $order->accesses()->create([
                'module_id' => $module->id,
                'pack_id' => $pack->id,
                'user_id' => 2,
                'is_view_finished' => false,
                'is_available' => $positionNumber == 1,
                'position_number' => $positionNumber++,
            ]);
        }

        $order = Order::create([
            'user_id' => 2,
            'pack_id' => 3,
            'amount' => 9000050,
            'status' => 'finished',
        ]);

        $pack = Pack::find(3)->load('modules');
        $positionNumber = 1;

        foreach ($pack->modules as $module) {
            $order->accesses()->create([
                'module_id' => $module->id,
                'pack_id' => $pack->id,
                'user_id' => 2,
                'is_view_finished' => true,
                'is_available' => false,
                'position_number' => $positionNumber++,
            ]);
        }
    }
}
