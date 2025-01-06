<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Target;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            "name" => "Bektemir",
            'phone' => "998999560918",
        ]);

        User::create([
            "name" => "Berdaq",
            'phone' => "998941480515",
        ]);
    }
}
