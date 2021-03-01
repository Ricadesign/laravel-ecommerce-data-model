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
            'status' => 'received',
            'code' => Str::random(10),
            'shipping_date' => Carbon::now()->addDay(),
            'shipping_type' => 'standard',
            'shipping_address' => preg_replace('/\s+/', ' ', $this->faker->address),
            'refund_deadline' => Carbon::now()->addWeeks(2),
            'subtotal' => 15,
            'total' => 15,
        ];
    }
}
