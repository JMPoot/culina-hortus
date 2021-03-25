<?php

namespace App\Http\Controllers\Api;

use App\Models\Cookbook;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCookbookRequest;
use App\Http\Requests\UpdateCookbookRequest;
use App\Http\Resources\CookbookResource;
use App\Http\Resources\CookbookCollection;

class CookbookController extends Controller
{
    public function index() 
    {
        return (new CookbookCollection(Cookbook::paginate()))->response();
    }

    public function store(StoreCookbookRequest $request) 
    {
        $cookbook = Cookbook::create($request->validated() + ['user_id' => $request->user()->id]);
        $cookbook->recipes()->attach($request->recipes);

        return (new CookbookResource($cookbook))->response(Response::HTTP_CREATED);
    }

    public function show(Cookbook $cookbook) 
    {
        return (new CookbookResource($cookbook))->response();
    }
    
    public function update(UpdateCookbookRequest $request, Cookbook $cookbook) 
    {
        $cookbook->update($request->validated());
        return (new CookbookResource($cookbook))->response();
    }

    public function destroy(Cookbook $cookbook) 
    {
        $cookbook->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
