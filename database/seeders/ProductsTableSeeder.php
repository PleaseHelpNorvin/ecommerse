<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->insert([
            [
                'productName' => 'Sofa',
                'description' => 'Comfortable 3-seater sofa.',
                'category_id' => 3,
                'price' => 2520.00,
                'imagePath' => 'product_images/66434ad295223.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'productName' => 'Dining Table',
                'description' => 'Wooden dining table with 6 chairs.',
                'category_id' => 3,
                'price' => 1300.00,
                'imagePath' => 'product_images/66434b11e296d.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'productName' => 'Armchair',
                'description' => 'Comfortable armchair with cushion.',
                'category_id' => 3,
                'price' => 800.00,
                'imagePath' => 'product_images/66434b42cb380.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'productName' => 'Television',
                'description' => '55-inch 4K Ultra HD Smart LED TV.',
                'category_id' => 2,
                'price' => 46143.00,
                'imagePath' => 'product_images/66434b7aeb534.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'productName' => 'Laptop',
                'description' => 'High performance laptop with 16GB RAM.',
                'category_id' => 2,
                'price' => 69301.00,
                'imagePath' => 'product_images/66434ba5463ab.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'productName' => 'Bluetooth Speaker',
                'description' => 'Portable Bluetooth speaker with excellent sound quality.',
                'category_id' => 2,
                'price' => 3464.00,
                'imagePath' => 'product_images/66434bd2c3754.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'productName' => 'Smartphone A',
                'description' => 'Latest model smartphone with 5G capability.',
                'category_id' => 1,
                'price' => 40425.00,
                'imagePath' => 'product_images/66434c43c3362.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'productName' => 'Smartphone B',
                'description' => 'Smartphone with excellent camera quality.',
                'category_id' => 1,
                'price' => 46200.00,
                'imagePath' => 'product_images/66434c8b4146c.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'productName' => 'Smartphone C',
                'description' => 'Affordable smartphone with long battery life.',
                'category_id' => 1,
                'price' => 23100.00,
                'imagePath' => 'product_images/66434cb398b85.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
