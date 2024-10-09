<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->create([
            'category_id' => 1,
            'name' => 'Product 1',
            'description' => 'Product 1 description',
            'image' => 'product1.jpg',
            'price' => 100,
        ]);

        Product::factory()->create([
            'category_id' => 1,
            'name' => 'Product 2',
            'description' => 'Product 2 description',
            'image' => 'product2.jpg',
            'price' => 200,
        ]);

        Product::factory()->create([
            'category_id' => 2,
            'name' => 'Product 3',
            'description' => 'Product 3 description',
            'image' => 'product3.jpg',
            'price' => 300,
        ]);

        Product::factory()->create([
            'category_id' => 2,
            'name' => 'Product 4',
            'description' => 'Product 4 description',
            'image' => 'product4.jpg',
            'price' => 400,
        ]);

        Product::factory()->create([
            'category_id' => 3,
            'name' => 'Product 5',
            'description' => 'Product 5 description',
            'image' => 'product5.jpg',
            'price' => 500,
        ]);

        Product::factory()->create([
            'category_id' => 3,
            'name' => 'Product 6',
            'description' => 'Product 6 description',
            'image' => 'product6.jpg',
            'price' => 600,
        ]);
    }
}
