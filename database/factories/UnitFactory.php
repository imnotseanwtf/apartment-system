<?php

namespace Database\Factories;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
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
            'monthly_rent' => fake()->numberBetween(100, 1000),
            'security_deposit' => fake()->numberBetween(100, 1000),
            'advance_electricity' => fake()->numberBetween(100, 1000),
            'advance_water' => fake()->numberBetween(100, 1000),
            'apartment_id' => Apartment::inRandomOrder()->value('id'),
        ];
    }
}
