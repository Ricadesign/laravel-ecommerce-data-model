<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Features;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::all()->each(function($category) {
            Product::factory()->count(10)->create([
                'category_id' => $category->id
            ])->each(function($product) {
                Features::factory()->create([
                    'product_id' => $product->id
                ]);
            });
        });
    }
}
