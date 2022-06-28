<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
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
            'name' => 'Store Name',
            'type' => $this->faker->randomElement(['LLC', 'IE', 'SLS', 'LEPL', 'JSC']),
            'org_name' => 'ORG Name',
            'identification' => '123456789',
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'street' => $this->faker->streetName(),
            'website' => $this->faker->url(),
            'description' => $this->faker->text(400),
        ];
    }
}
