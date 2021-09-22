<?php

use App\Http\Controllers\BearController;
use Illuminate\Http\Request;
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
Route::resource('bears', BearController::class);
Route::get('/bears/search/{name}', [BearController::class, 'search']);

// Route::get('/bears', [BearController::class, 'index']);
// Route::post('/bears', [BearController::class, 'store']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
