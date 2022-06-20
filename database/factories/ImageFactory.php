<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ImageFactory extends Factory
{
    public function definition()
    {
        return [
            'recipe_id' => $this->faker->unique()->numberBetween(1, 100),
            'title' => $this->faker->sentence(4),
            'author' => $this->faker->name(),
            'image_path' => $this->faker->imageUrl(640, 360, 'recipe', true),
            'source' => $this->faker->domainName(),
            'alt_text' => $this->faker->sentence(4)
        ];
    }
}


