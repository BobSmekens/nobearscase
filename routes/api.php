<?php

use App\Http\Controllers\BearController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// Route::resource('bears', BearController::class);

// public Routes
Route::get('/api/bears', [BearApiController::class, 'bearIndex']);
Route::get('/api/bears/{id}', [BearApiController::class, 'show']);
Route::get('/api/bears/search/{name}', [BearApiController::class, 'search']);

// public auth routes
Route::post('/api/register', [AuthController::class, 'register']);
Route::post('/api/login', [AuthController::class, 'login']);

// protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    // protected CRUD routes  
    Route::post('/api/bears', [BearApiController::class, 'store']);
    Route::put('/api/bears/{id}', [BearApiController::class, 'update']);
    Route::delete('/api/bears/{id}', [BearApiController::class, 'destroy']);

    //protected Auth routes
    Route::post('/api/logout', [AuthController::class, 'logout']);
});

// tokens
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});
