<?php

namespace App\Http\Controllers\Api;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIngredientRequest;
use App\Http\Resources\IngredientResource;
use App\Http\Resources\IngredientCollection;

class IngredientController extends Controller
{
    //
    public function index() 
    {
        return (new IngredientCollection(Ingredient::paginate()))->response();
    }

    public function store(StoreIngredientRequest $request) 
    {
        $ingredient = Ingredient::create($request->validated());
        return (new IngredientResource($ingredient))->response(Response::HTTP_CREATED);
    }

    public function show(Ingredient $ingredient) 
    {
        return (new IngredientResource($ingredient))->response();
    }

    public function update(StoreIngredientRequest $request, Ingredient $ingredient) 
    {
        $ingredient->update($request->validated());
        return (new IngredientResource($ingredient))->response();
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
