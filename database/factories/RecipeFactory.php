<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    public function definition()
    {
        return [

            'title' => $this->faker->unique()->sentence(),
            'body' => $this->faker->text(),
            'rating' => $this->faker->numberBetween(1, 5),
            'prep_time_in_min' => $this->faker->numberBetween(15, 60),
            'published' => $this->faker->boolean(80)
        ];
    }
}


