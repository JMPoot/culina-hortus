<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingredient::factory()
            ->count(20)
            ->create();
    }
}
