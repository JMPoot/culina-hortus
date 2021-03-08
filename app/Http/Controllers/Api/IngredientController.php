<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    //
    public function index() 
    {
        return Ingredient::all();
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $ingredient = Ingredient::create($request->all());
        return $ingredient;
    }

    public function show($id) 
    {
        return Ingredient::findOrFail($id);
    }

    public function update(Request $request, $id) 
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->update($request->all());

        return $ingredient;
    }

    public function destroy($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
        return '';
    }
}
