<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;


class ImageSeeder extends Seeder
{
    public function run()
    {
        Image::factory(100)->create();
    }
}
