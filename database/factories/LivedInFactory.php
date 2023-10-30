<?php

namespace Database\Factories;

use App\Models\Tenant;
use App\Models\Unit;
use App\Models\Apartment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LivedIn>
 */
class LivedInFactory extends Factory
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
            'unit_id' => Unit::inRandomOrder()->value('id'),
            'start_date' => fake()->date(),
        ];
    }
}
