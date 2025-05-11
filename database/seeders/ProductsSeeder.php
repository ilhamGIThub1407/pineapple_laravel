<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_name' => 'Samsung Galaxy A80',
            'product_description' => 'Join BLACKPINK in the #EraofLIVE',
            'product_image/video' => 'images/products/Samsung_A80.mp4'
        ]);

        Product::create([
            'product_name' => 'iPhone 14 Pro',
            'product_description' => '',
            'product_image/video' => 'images/products/Iphone_14pro.mp4'
        ]);

        Product::create([
            'product_name' => 'iPhone 15 Pro',
            'product_description' => '',
            'product_image/video' => 'images/products/Iphone_15pro.mp4'
        ]);

        Product::create([
            'product_name' => 'Galaxy x BTS La Parfumerie',
            'product_description' => 'Samsung DeX',
            'product_image/video' => 'images/products/Samsung_dex.mp4'
        ]);

        Product::create([
            'product_name' => '',
            'product_description' => '',
            'product_image/video' => 'images/products/Samsung_S20.mp4'
        ]);

        Product::create([
            'product_name' => '',
            'product_description' => 'MORE COMING SOON',
            'product_image/video' => ''
        ]);
    }
}
