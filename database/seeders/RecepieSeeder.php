<?php

namespace Database\Seeders;

use App\Models\Recepie;
use Illuminate\Database\Seeder;

class RecepieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recepie::factory()
            ->count(5)
            ->create();
    }
}
