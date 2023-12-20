<?php

namespace Database\Factories;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $seller_id = Seller::pluck('id');
        $seller_email = Seller::pluck('email');

        $categories = [];

        foreach (config('product.categories') as $key => $value) {
            $categories[] = $key;
        }

        return [
            'email' => fake()->randomElement($seller_email),
            'sellers_id' => fake()->randomElement($seller_id),
            'name' => fake()->name(),
            'brand' => fake()->randomElement(['hp','celio','adidas','nike','versace','skechers','gucci']),
            'category' => fake()->randomElement($categories),
            'description' => fake()->sentence,
            'feature' => fake()->title,
            'quantity' => fake()->numberBetween(1,100),
            'price' => fake()->numberBetween(2000,9999999)
        ];
    }
}
