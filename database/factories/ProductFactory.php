<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition()
    {
        static $categories = null;

        if (is_null($categories)) {
            $categories = Category::pluck('id')->toArray();
        }

        return [
            'name' => $this->faker->word(),
            'category_id' => $this->faker->randomElement($categories),
            'description' => $this->faker->optional()->text(),
            'price' => $this->faker->randomFloat(2, 0, 10000),
        ];
    }
}
