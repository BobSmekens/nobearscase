<?php

use App\Http\Controllers\BearController;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\WebAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/import', [ImportController::class, 'importForm']);
Route::post('/import', [ImportController::class, 'import']);

Route::get('/index', [BearController::class, 'bearIndex']);
Route::get('/json', [JsonController::class, 'bearJson']);
Route::get('/table', [JsonController::class, 'bearTable']);

Route::get('/jsonDownload', [JsonController::class, 'downloadJson']);


Route::get('/', function () {
    return view('welcome');
});

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