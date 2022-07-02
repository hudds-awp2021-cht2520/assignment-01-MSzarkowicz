<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('lang/{lang}', ['as' => 'lang.change', 'uses' => 'App\Http\Controllers\LocaleController@langChange']);

Route::resource('recipes', RecipeController::class)->middleware(['auth']);

Route::get('/recipe/{recipe}', [RecipeController::class, 'show'])->name('recipe.show');

Route::resource('/', HomeController::class)
->only(['index'])
->middleware(['auth']);

require __DIR__.'/auth.php';

