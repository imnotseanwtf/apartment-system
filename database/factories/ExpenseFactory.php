<?php

namespace Database\Factories;

use App\Models\Apartment;
use App\Models\Expense;
use App\Models\LivedIn;
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
        $billsArray = ['Electricity', 'Water' , 'Others'];

        return [
            'lived_in_id' => LivedIn::inRandomOrder()->value('id'),
            'Bills' => $billsArray[array_rand($billsArray)] ,
            'price' => fake()->randomNumber(),
        ];
    }
}
