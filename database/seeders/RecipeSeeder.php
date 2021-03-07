<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipe::factory()
            ->count(10)
            ->create();

        foreach (Recipe::all() as $recipe) {
            $ingredients = Ingredient::inRandomOrder()->take(rand(1,3))->pluck('id');
            $recipe->ingredients()->attach($ingredients);
        }
    }
}
