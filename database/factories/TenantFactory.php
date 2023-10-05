<?php

namespace Database\Factories;

use App\Models\Apartment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenant>
 */
class TenantFactory extends Factory
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
            'occupation' => fake()->jobTitle(),
            'number' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
        ];
    }
}
