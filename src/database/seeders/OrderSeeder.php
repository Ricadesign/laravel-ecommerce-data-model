<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create()->orders()->saveMany(
            Order::factory()->count(3)->make()
        );

        Order::all()->each(function($order) {
            $order->products()->attach(
                Product::whereIn('id', [1, 2, 3])->get(),
                ['quantity' => 1, 'price' => 5]
            );
        });
    }
}
