<?php

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*Route::get('/games',[\App\Http\Controllers\GameController::class,'index']);
Route::post('/insertgame',[\App\Http\Controllers\GameController::class,'store']);*/

Route::resource('games', GameController::class);

