<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Order;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    public function definition()
    {
        static $products = null;

        if (is_null($products)) {
            $products = Product::pluck('id')->toArray();
        }

        return [
            'customer_name' => $this->faker->name(),
            'product_id' => $this->faker->randomElement($products),
            'product_quantity' => $this->faker->numberBetween(1, 1000),
            'status' => $this->faker->randomElement([Order::NEW, Order::COMPLETED]),
            'comment' => $this->faker->optional()->text(),
        ];
    }
}
