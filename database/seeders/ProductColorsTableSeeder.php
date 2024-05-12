<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductColor;

class ProductColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ProductColor::create([
            'name' => 'Red',
            'code' => '#FF0000',
        ]);

        ProductColor::create([
            'name' => 'Blue',
            'code' => '#0000FF',
        ]);

        ProductColor::create([
            'name' => 'Green',
            'code' => '#00FF00',
        ]);
    }
}
