<?php

namespace App\Http\Controllers\Api;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\IngredientResource;
use App\Http\Resources\IngredientCollection;

class IngredientController extends Controller
{
    //
    public function index() 
    {
        return (new IngredientCollection(Ingredient::paginate()))->response();
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $ingredient = Ingredient::create($request->all());
        return (new IngredientResource($ingredient))->response(Response::HTTP_CREATED);
    }

    public function show(Ingredient $ingredient) 
    {
        return (new IngredientResource($ingredient))->response();
    }

    public function update(Request $request, Ingredient $ingredient) 
    {
        $ingredient->update($request->all());
        return (new IngredientResource($ingredient))->response();
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
