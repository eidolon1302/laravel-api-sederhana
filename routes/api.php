<?php

use App\Http\Controllers\Api\FilmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('film', [FilmController::class, 'index']);
// Route::get('film/{id}', [FilmController::class, 'show']);
// Route::post('film', [FilmController::class, 'store']);
// Route::put('film/{id}', [FilmController::class, 'update']);
// Route::delete('film/{id}', [FilmController::class, 'destroy']);


Route::apiResource('film', FilmController::class);