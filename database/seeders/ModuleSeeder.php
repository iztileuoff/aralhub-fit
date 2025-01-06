<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    public function run(): void
    {
        Module::create(['title' => 'module 1', 'pack_id' => 1]);
        Module::create(['title' => 'module 2', 'pack_id' => 1]);
        Module::create(['title' => 'module 3', 'pack_id' => 1]);
        Module::create(['title' => 'module 4', 'pack_id' => 1]);

        Module::create(['title' => 'module 1', 'pack_id' => 2]);
        Module::create(['title' => 'module 2', 'pack_id' => 2]);
        Module::create(['title' => 'module 3', 'pack_id' => 2]);
        Module::create(['title' => 'module 4', 'pack_id' => 2]);

        Module::create(['title' => 'module 1', 'pack_id' => 3]);
        Module::create(['title' => 'module 2', 'pack_id' => 3]);
        Module::create(['title' => 'module 3', 'pack_id' => 3]);
        Module::create(['title' => 'module 4', 'pack_id' => 3]);
    }
}
