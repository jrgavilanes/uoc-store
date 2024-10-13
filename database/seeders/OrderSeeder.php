<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = Order::factory()->create([
            'user_id' => 2,
            'email' => User::find(2)->email,
            'address' => User::find(2)->address,
        ]);

        $order->orderLines()->create([
            'product_id' => 1,
            'quantity' => 1,
            'price' => 100,
        ]);

        $order->orderLines()->create([
            'product_id' => 2,
            'quantity' => 2,
            'price' => 200,
        ]);

        $order2 = Order::factory()->create([
            'user_id' => null,
            'email' => 'guest@mio.com',
            'address' => 'guest address',
        ]);

        $order2->orderLines()->create([
            'product_id' => 3,
            'quantity' => 3,
            'price' => 300,
        ]);

        $order2->orderLines()->create([
            'product_id' => 4,
            'quantity' => 4,
            'price' => 400,
        ]);


    }
}
