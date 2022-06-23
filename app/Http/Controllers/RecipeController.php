<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $recipes = Recipe::where('user_id', Auth::id())->latest('updated_at')->paginate(2);

        return view('recipes.index')->with('recipes', $recipes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRecipeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipeRequest $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        Auth::user()->recipe()->create([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return to_route('recipes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        if($recipe ->user_id != Auth::id()){
            return abort(403);
        }
        
        return view('recipes.show')->with('recipe', $recipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        if($recipe ->user_id != Auth::id()){
            return abort(403);
        }
        
        return view('recipes.edit')->with('recipe', $recipe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecipeRequest  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {   
        if($recipe ->user_id != Auth::id()){
            return abort(403);
        }

        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        Auth::user()->recipe()->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return to_route('recipes.show', $recipe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        if($recipe ->user_id != Auth::id()){
            return abort(403);
        }

        $recipe->delete();

        return to_route('recipes.index');
    }
}
