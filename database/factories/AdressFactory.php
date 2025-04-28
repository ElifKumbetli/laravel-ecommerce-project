<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adress>
 */
class AdressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 3,
            'city' => $this->faker->city,
            'district' => $this->faker->city,
            'zipcode' => fake()->randomDigitNotZero(),
            'address' => $this->faker->address(),
            'is_default' => $this->faker->boolean,
        ];
    }
}
