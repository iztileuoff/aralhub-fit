<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Target;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            "name" => "Admin",
            'phone' => "998999560918",
            "password" => "12345678",
            'is_super_admin' => true,
        ]);
    }
}
