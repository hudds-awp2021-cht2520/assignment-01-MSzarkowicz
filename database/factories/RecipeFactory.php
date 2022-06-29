<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id'=> $this->faker->numberBetween(1, 25),
            'title' => $this->faker->unique()->words(4, true),
            'body' => $this->faker->text(600, true),
            'rating' => $this->faker->numberBetween(1, 5),
            'prep_time_in_min' => $this->faker->numberBetween(15, 60),
            'published' => $this->faker->boolean(80)
        ];
    }
}


