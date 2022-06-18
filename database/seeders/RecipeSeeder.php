<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;


class RecipeSeeder extends Seeder
{
    public function run()
    {
        Recipe::factory(100)->create();
    }
}
