<?php

namespace App\Http\Controllers\Api;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class RecipeController extends Controller
{
    public function index() 
    {
        return response(null, Response::HTTP_NOT_IMPLEMENTED);
    }

    public function store(Request $request) 
    {
        return response(null, Response::HTTP_NOT_IMPLEMENTED);
    }

    public function show(Recipe $recipe)
    {
        return response(null, Response::HTTP_NOT_IMPLEMENTED);
    }

    public function update(Request $request, Recipe $recipe)
    {
        return response(null, Response::HTTP_NOT_IMPLEMENTED);
    }

    public function destory(Recipe $recipe) 
    {
        return response(null, Response::HTTP_NOT_IMPLEMENTED);
    }
}
