<?php

namespace App\Http\Controllers\Api;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeResource;
use App\Http\Resources\RecipeCollection;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;

class RecipeController extends Controller
{
    public function index() 
    {
        return (new RecipeCollection(Recipe::paginate()))->response();
    }

    public function store(StoreRecipeRequest $request) 
    {
        $recipe = Recipe::create($request->validated() + ['user_id' => $request->user()->id]);
        return (new RecipeResource($recipe))->response(Response::HTTP_CREATED);
    }

    public function show(Recipe $recipe)
    {
        return (new RecipeResource($recipe))->response();
    }

    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        if ($request->user()->cannot('update', $recipe)) {
            abort(Response::HTTP_UNAUTHORIZED, 'Unauthorized');
        }

        $recipe->update($request->validated());
        return (new RecipeResource($recipe))->response();
    }

    public function destroy(Request $request, Recipe $recipe) 
    {
        if ($request->user()->cannot('delete', $recipe)) {
            abort(Response::HTTP_UNAUTHORIZED, 'Unauthorized');
        }

        $recipe->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
