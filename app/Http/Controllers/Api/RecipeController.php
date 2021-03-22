<?php

namespace App\Http\Controllers\Api;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeCollection;
use App\Http\Resources\RecipeResource;

class RecipeController extends Controller
{
    public function index() 
    {
        return (new RecipeCollection(Recipe::paginate()))->response();
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);
        
        $recipe = Recipe::create($request->all());
        return (new RecipeResource($recipe))->response(Response::HTTP_CREATED);
    }

    public function show(Recipe $recipe)
    {
        return (new RecipeResource($recipe))->response();
    }

    public function update(Request $request, Recipe $recipe)
    {
        $recipe->update($request->all());
        return (new RecipeResource($recipe))->response();
    }

    public function destory(Recipe $recipe) 
    {
        $recipe->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
