<?php

namespace Database\Seeders;

use App\Models\LivedIn;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivedInSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LivedIn::factory(3)->create();
    }
}
