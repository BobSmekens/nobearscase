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
Route::get('/bears', [BearController::class, 'index']);
Route::get('/bears/{id}', [BearController::class, 'show']);
Route::get('/bears/search/{name}', [BearController::class, 'search']);

// public auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    // protected CRUD routes  
    Route::post('/bears', [BearController::class, 'store']);
    Route::put('/bears/{id}', [BearController::class, 'update']);
    Route::delete('/bears/{id}', [BearController::class, 'destroy']);

    //protected Auth routes
    Route::post('/logout', [AuthController::class, 'logout']);
});

// tokens
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});
