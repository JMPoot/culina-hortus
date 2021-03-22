<?php

namespace App\Http\Controllers\Api;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Resources\RecipeCollection;
use App\Http\Resources\RecipeResource;

class RecipeController extends Controller
{
    public function index() 
    {
        return (new RecipeCollection(Recipe::paginate()))->response();
    }

    public function store(StoreRecipeRequest $request) 
    {
        $recipe = Recipe::create($request->validated());
        return (new RecipeResource($recipe))->response(Response::HTTP_CREATED);
    }

    public function show(Recipe $recipe)
    {
        return (new RecipeResource($recipe))->response();
    }

    public function update(StoreRecipeRequest $request, Recipe $recipe)
    {
        $recipe->update($request->validated());
        return (new RecipeResource($recipe))->response();
    }

    public function destory(Recipe $recipe) 
    {
        $recipe->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
