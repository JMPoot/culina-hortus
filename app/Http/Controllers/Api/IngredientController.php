<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\IngredientCollection;
use App\Http\Resources\IngredientResource;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    //
    public function index() 
    {
        return new IngredientCollection(Ingredient::all());
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $ingredient = Ingredient::create($request->all());
        return new IngredientResource($ingredient);
    }

    public function show(Ingredient $ingredient) 
    {
        return new IngredientResource($ingredient);
    }

    public function update(Request $request, Ingredient $ingredient) 
    {
        $ingredient->update($request->all());
        return new IngredientResource($ingredient);
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return '';
    }
}
