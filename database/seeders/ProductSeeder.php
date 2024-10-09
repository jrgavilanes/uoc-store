<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Product::factory()->create([
            'category_id' => 1,
            'name' => 'Sonic the Hedgehog',
            'description' => 'Classic SEGA game featuring Sonic.',
            'image' => 'sonic1.jpg',
            'price' => 120,
            'slug' => Str::slug('Sonic the Hedgehog'),
        ]);

        Product::factory()->create([
            'category_id' => 1,
            'name' => 'Alex Kidd in Miracle World',
            'description' => 'Adventure game with Alex Kidd.',
            'image' => 'alexkid.jpg',
            'price' => 110,
            'slug' => Str::slug('Alex Kidd in Miracle World'),
        ]);

        Product::factory()->create([
            'category_id' => 1,
            'name' => 'Wonder Boy III',
            'description' => 'Action-packed journey in Monster Land.',
            'image' => 'wonderboy3.jpg',
            'price' => 130,
            'slug' => Str::slug('Wonder Boy III'),
        ]);

        Product::factory()->create([
            'category_id' => 1,
            'name' => 'Shinobi',
            'description' => 'Classic ninja action game.',
            'image' => 'shinobi.jpg',
            'price' => 115,
            'slug' => Str::slug('Shinobi'),
        ]);

        Product::factory()->create([
            'category_id' => 1,
            'name' => 'Land of Illusion',
            'description' => 'Fantasy adventure with Mickey Mouse.',
            'image' => 'landofillusion.jpg',
            'price' => 125,
            'slug' => Str::slug('Land of Illusion'),
        ]);

        Product::factory()->create([
            'category_id' => 1,
            'name' => 'Double Dragon',
            'description' => 'Classic beat-em-up action game.',
            'image' => 'doubledragon.jpg',
            'price' => 140,
            'slug' => Str::slug('Double Dragon'),
        ]);

        Product::factory()->create([
            'category_id' => 1,
            'name' => 'R-Type',
            'description' => 'Sci-fi shooting game with intense action.',
            'image' => 'rtype.jpg',
            'price' => 150,
            'slug' => Str::slug('R-Type'),
        ]);

        Product::factory()->create([
            'category_id' => 1,
            'name' => 'OutRun',
            'description' => 'Classic SEGA racing game.',
            'image' => 'outrun.jpg',
            'price' => 135,
            'slug' => Str::slug('OutRun'),
        ]);

        Product::factory()->create([
            'category_id' => 1,
            'name' => 'Streets of Rage',
            'description' => 'Iconic beat-em-up with memorable characters.',
            'image' => 'streetofrage.jpg',
            'price' => 145,
            'slug' => Str::slug('Streets of Rage'),
        ]);

        Product::factory()->create([
            'category_id' => 1,
            'name' => 'Bubble Bobble',
            'description' => 'Puzzle game with cute characters and fun levels.',
            'image' => 'bubblebubble.jpg',
            'price' => 100,
            'slug' => Str::slug('Bubble Bobble'),
        ]);

        // Product::factory()->create([
        //     'category_id' => 1,
        //     'name' => 'Product 1',
        //     'description' => 'Product 1 description',
        //     'image' => 'product1.jpg',
        //     'price' => 100,
        // ]);

        // Product::factory()->create([
        //     'category_id' => 1,
        //     'name' => 'Product 2',
        //     'description' => 'Product 2 description',
        //     'image' => 'product2.jpg',
        //     'price' => 200,
        // ]);

        // Product::factory()->create([
        //     'category_id' => 2,
        //     'name' => 'Product 3',
        //     'description' => 'Product 3 description',
        //     'image' => 'product3.jpg',
        //     'price' => 300,
        // ]);

        // Product::factory()->create([
        //     'category_id' => 2,
        //     'name' => 'Product 4',
        //     'description' => 'Product 4 description',
        //     'image' => 'product4.jpg',
        //     'price' => 400,
        // ]);

        // Product::factory()->create([
        //     'category_id' => 3,
        //     'name' => 'Product 5',
        //     'description' => 'Product 5 description',
        //     'image' => 'product5.jpg',
        //     'price' => 500,
        // ]);

        // Product::factory()->create([
        //     'category_id' => 3,
        //     'name' => 'Product 6',
        //     'description' => 'Product 6 description',
        //     'image' => 'product6.jpg',
        //     'price' => 600,
        // ]);
    }
}
