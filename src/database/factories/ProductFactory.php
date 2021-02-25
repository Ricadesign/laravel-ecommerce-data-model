<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $name = ucfirst($this->faker->words(3, true)),
            'slug' =>  Str::slug($name),
            'short_description' => $this->faker->sentence(3, false),
            'description' => $this->faker->paragraph(3, false),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'stock' => 100,
            'visible' => true
        ];
    }
}
