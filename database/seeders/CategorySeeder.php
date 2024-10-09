<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'name' => 'Sega',
            'description' => 'Discover classic SEGA games! Relive iconic adventures and arcade action from the golden age of gaming!',
            'image' => 'sega.jpg',
            'slug' => Str::slug('Sega'),
        ]);

        Category::factory()->create([
            'name' => 'Nintendo',
            'description' => "Explore classic 8-bit Nintendo games! Relive iconic adventures and retro fun from gaming's golden era!",
            'image' => 'nintendo.jpg',
            'slug' => Str::slug('Nintendo'),
        ]);

        Category::factory()->create([
            'name' => 'TurboGrafx',
            'description' => 'Discover TurboGrafx classics! Relive epic 16-bit adventures and unique retro gaming thrills!',
            'image' => 'turbografx.jpg',
            'slug' => Str::slug('TurboGrafx'),
        ]);

        Category::factory()->create([
            'name' => 'Playstation',
            'description' => 'Explore iconic PlayStation 1 games! Relive classic adventures and timeless 3D gaming moments!',
            'image' => 'playstation.jpg',
            'slug' => Str::slug('Playstation'),
        ]);
    }
}
