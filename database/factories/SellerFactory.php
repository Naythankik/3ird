<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seller>
 */
class SellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'username' => $this->faker->userName,
            'address' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'dob' => $this->faker->date,
            'profile' => 'https://source.unsplash.com/random',
            'password' => Hash::make('password')
        ];
    }
}
