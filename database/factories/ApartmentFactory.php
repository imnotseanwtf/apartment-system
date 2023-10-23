<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apartment>
 */
class ApartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'address' => fake()->address(),
            'base_price' => fake()->numberBetween(100 , 1000),
            'security_deposit'=> fake()->numberBetween(100,1000),
            'advance_electricity'=> fake()->numberBetween(100,1000),
            'advance_water'=> fake()->numberBetween(100,1000),
            'description' => fake()->paragraph(5),
        ];
    }
}
