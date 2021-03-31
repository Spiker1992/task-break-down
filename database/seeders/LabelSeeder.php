<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    protected array $labels = [[
        'name' => 'FE',
    ], [
        'name' => 'BE',
    ], [
        'name' => 'Performance',
    ]];

    public function run()
    {
        Label::insert($this->labels);
    }
}
