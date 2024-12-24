<?php

namespace Database\Seeders;

use App\Models\Target;
use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder
{
    public function run(): void
    {
        Target::create(["name" => "Похудение"]);
        Target::create(["name" => "Набор массы"]);
        Target::create(["name" => "Улучшение выносливости"]);
    }
}
