<?php

namespace Database\Factories;

use App\Models\Features;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeaturesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Features::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [];
    }
}
