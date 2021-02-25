<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => 'completed',
            'code' => Str::random(10),
            'shipping_date' => Carbon::now()->addDay(),
            'shipping_type' => 'standard',
            'refund_limit_date' => Carbon::now()->addWeeks(2),
            'subtotal' => 10,
            'total' => 10,
        ];
    }
}