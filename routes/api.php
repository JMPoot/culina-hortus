<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CookbookController;
use App\Http\Controllers\Api\IngredientController;
use App\Http\Controllers\Api\RecipeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/recipes', [RecipeController::class, 'store']);
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update']);
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy']);

    Route::post('/cookbooks', [CookbookController::class, 'store']);
    Route::put('/cookbooks/{cookbook}', [CookbookController::class, 'update']);
    Route::delete('/cookbooks/{cookbook}', [CookbookController::class, 'destroy']);
});

Route::apiResource('ingredients', IngredientController::class);

Route::get('/recipes', [RecipeController::class, 'index']);
Route::get('/recipes/{recipe}', [RecipeController::class, 'show']);

Route::get('/cookbooks', [CookbookController::class, 'index']);
Route::get('/cookbooks/{cookbook}', [CookbookController::class, 'show']);

Route::post('/tokens', [AuthController::class, 'login']);
Route::post('/tokens/revoke/{user}', [AuthController::class, 'revoke']);
