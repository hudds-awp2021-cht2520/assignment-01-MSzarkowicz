<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->text('body');
            $table->integer('rating')->default(5);
            $table->integer('prep_time_in_min')->default(30);
            $table->boolean('published')->default(false);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
