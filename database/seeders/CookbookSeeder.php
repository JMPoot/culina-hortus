<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\Cookbook;
use Illuminate\Database\Seeder;

class CookbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cookbook::factory()
            ->count(3)
            ->create();

        foreach (Cookbook::all() as $cookbook) {
            $recipes = Recipe::inRandomOrder()->take(rand(2, 5))->pluck('id');
            $cookbook->recipes()->attach($recipes);
        }
    }
}
