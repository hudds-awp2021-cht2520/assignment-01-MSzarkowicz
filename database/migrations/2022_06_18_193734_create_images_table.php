<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')->constrained();
            $table->string('title')->sentence();
            $table->string('author')->nullable();
            $table->string('source')-> nullable();
            $table->text('image_path')->unique();
            $table->string('alt_text')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('images');
    }
};
