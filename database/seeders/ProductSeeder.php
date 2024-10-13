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


        Product::factory()->create([
            'category_id' => 2,
            'name' => 'Castlevania',
            'description' => 'Classic platformer with gothic themes and challenging gameplay.',
            'image' => 'castlevania.jpg',
            'price' => 100,
            'slug' => Str::slug('Castlevania'),
        ]);

        Product::factory()->create([
            'category_id' => 2,
            'name' => 'The Legend of Zelda',
            'description' => 'Adventure game featuring exploration, puzzles, and iconic characters.',
            'image' => 'legendofzelda.jpg',
            'price' => 90,
            'slug' => Str::slug('The Legend of Zelda'),
        ]);

        Product::factory()->create([
            'category_id' => 2,
            'name' => 'Donkey Kong',
            'description' => 'Arcade classic featuring the famous Mario and challenging obstacles.',
            'image' => 'donkeykong.jpg',
            'price' => 95,
            'slug' => Str::slug('Donkey Kong'),
        ]);

        Product::factory()->create([
            'category_id' => 2,
            'name' => 'Kirby\'s Adventure',
            'description' => 'Fun platformer with Kirby, a character with unique abilities to inhale enemies.',
            'image' => 'kirbyadventure.jpg',
            'price' => 105,
            'slug' => Str::slug('Kirby\'s Adventure'),
        ]);

        Product::factory()->create([
            'category_id' => 2,
            'name' => 'Mega Man 2',
            'description' => 'Action platformer with challenging stages and robot masters.',
            'image' => 'megaman2.jpg',
            'price' => 115,
            'slug' => Str::slug('Mega Man 2'),
        ]);

        Product::factory()->create([
            'category_id' => 2,
            'name' => 'Tetris',
            'description' => 'Classic puzzle game that requires skill and quick thinking.',
            'image' => 'tetris.jpg',
            'price' => 80,
            'slug' => Str::slug('Tetris'),
        ]);

        Product::factory()->create([
            'category_id' => 2,
            'name' => 'Contra',
            'description' => 'Run and gun action game with intense levels and enemies.',
            'image' => 'contra.jpg',
            'price' => 90,
            'slug' => Str::slug('Contra'),
        ]);

        Product::factory()->create([
            'category_id' => 2,
            'name' => 'Super Mario Bros 3',
            'description' => 'One of the best Mario platformers with innovative gameplay and levels.',
            'image' => 'mario3.jpg',
            'price' => 120,
            'slug' => Str::slug('Super Mario Bros 3'),
        ]);

        Product::factory()->create([
            'category_id' => 2,
            'name' => 'Super Mario Bros',
            'description' => 'The classic Mario game that defined platformers for generations.',
            'image' => 'mario.jpg',
            'price' => 85,
            'slug' => Str::slug('Super Mario Bros'),
        ]);

        Product::factory()->create([
            'category_id' => 3,
            'name' => 'R-Type 2',
            'description' => 'Classic side-scrolling shooter with intense action and challenging gameplay.',
            'image' => 'rtype2.jpg',
            'price' => rand(90, 130),
            'slug' => Str::slug('R-Type 2'),
        ]);

        Product::factory()->create([
            'category_id' => 3,
            'name' => 'Batman',
            'description' => 'Action game based on the iconic DC Comics character, featuring Gotham City.',
            'image' => 'batman.jpg',
            'price' => rand(90, 130),
            'slug' => Str::slug('Batman'),
        ]);

        Product::factory()->create([
            'category_id' => 3,
            'name' => 'Gradius',
            'description' => 'Space shooter with innovative power-up system and memorable soundtrack.',
            'image' => 'gradius.jpg',
            'price' => rand(90, 130),
            'slug' => Str::slug('Gradius'),
        ]);

        Product::factory()->create([
            'category_id' => 3,
            'name' => 'Ninja Spirit',
            'description' => 'Action platformer with ninja combat and unique gameplay mechanics.',
            'image' => 'ninjaspirit.jpg',
            'price' => rand(90, 130),
            'slug' => Str::slug('Ninja Spirit'),
        ]);

        Product::factory()->create([
            'category_id' => 3,
            'name' => 'Street Fighter II',
            'description' => 'Famous fighting game that introduced special moves and combos.',
            'image' => 'streetfighter2.jpg',
            'price' => rand(90, 130),
            'slug' => Str::slug('Street Fighter II'),
        ]);

        Product::factory()->create([
            'category_id' => 3,
            'name' => 'Splatterhouse',
            'description' => 'Horror-themed beat \'em up with gruesome enemies and dark environments.',
            'image' => 'splatterhouse.jpg',
            'price' => rand(90, 130),
            'slug' => Str::slug('Splatterhouse'),
        ]);




    }
}
