<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Recipe;
use App\Http\Controllers\RecipeController;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $recipes = Recipe::where('published', true)->orderByDesc('rating')->paginate(12);
        return view('index')->with('recipes', $recipes);
        
    }
}
