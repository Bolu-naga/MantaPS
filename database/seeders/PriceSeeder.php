<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
public function run()
{
    $prices = [
        ['duration' => '1 Hari', 'price' => 200000, 'is_highlight' => false],
        ['duration' => '2 Hari', 'price' => 350000, 'is_highlight' => true],
        ['duration' => '3 Hari', 'price' => 500000, 'is_highlight' => false],
        ['duration' => '1 Minggu', 'price' => 1000000, 'is_highlight' => true],
    ];

    foreach ($prices as $p) {
        \App\Models\Price::create($p);
    }
}
}
