<?php

namespace Database\Seeders;

use App\Models\Pack;
use Illuminate\Database\Seeder;

class PackSeeder extends Seeder
{
    public function run(): void
    {
        Pack::create(['title' => 'Пакет 1', 'price' => 80000]);
        Pack::create(['title' => 'Пакет 2', 'price' => 80000.15]);
        Pack::create(['title' => 'Пакет 3', 'price' => 90000.50]);
    }
}
