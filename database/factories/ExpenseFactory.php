<?php

namespace Database\Factories;

use App\Models\Apartment;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tenant_id' => Tenant::inRandomOrder()->value('id'),
            'apartment_id' => Apartment::inRandomOrder()->value('id'),
            'description' => fake()->paragraph(2),
            'price' => fake()->randomNumber(),
        ];
    }
}
