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
        return [
            'name' => $this->faker->word(),
            'category_id' => $this->faker->randomElement(Category::pluck('id')->toArray()),
            'description' => $this->faker->optional()->text(),
            'price' => $this->faker->randomFloat(2, 0, 99999999),
        ];
    }
}
