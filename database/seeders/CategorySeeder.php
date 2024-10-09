<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'name' => 'Category 1',
            'description' => 'Category 1 description',
            'image' => 'category1.jpg',
        ]);

        Category::factory()->create([
            'name' => 'Category 2',
            'description' => 'Category 2 description',
            'image' => 'category2.jpg',
        ]);

        Category::factory()->create([
            'name' => 'Category 3',
            'description' => 'Category 3 description',
            'image' => 'category3.jpg',
        ]);
    }
}
