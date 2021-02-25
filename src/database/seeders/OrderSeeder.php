<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Address;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create();

        $user->orders()->saveMany(
            Order::factory()->count(3)->make()
        );

        $user->addresses()->saveMany([
          Address::factory()->make(),
          Address::factory()->make(['favorite' => false]),
        ]);

        Order::all()->each(function($order) {
            $order->products()->attach(
                Product::whereIn('id', [1, 2, 3])->get(),
                ['quantity' => 1, 'price' => 5]
            );
        });
    }
}
