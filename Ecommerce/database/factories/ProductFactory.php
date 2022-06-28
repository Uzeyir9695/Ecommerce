<?php

namespace Database\Factories;

use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'subcategory_id' => Subcategory::pluck('id')->random(),
            'name' => $this->faker->word(),
            'price' => $this->faker->randomElement(['1000', '2000', '3000', '4000', '5000']),
            'quantity' => $this->faker->randomElement(['10', '20', '50', '100', '150', '200', '250', '300', '400', '500']),
            'discount' => $this->faker->randomElement(['0', '10', '20', '30', '40', '50', '70', '90']),
            'description' => $this->faker->text(400),
        ];
    }
}
