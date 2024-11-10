<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
            'address' => 'admin address',
        ]);

        User::factory()->create([
            'name' => 'user1',
            'email' => 'user1@test.com',
            'password' => bcrypt('password'),
            'address' => 'user1 address',
        ]);

        User::factory()->create([
            'name' => 'user2',
            'email' => 'user2@test.com',
            'password' => bcrypt('password'),
            'address' => 'user2 address',
        ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
        ]);

    }
}
