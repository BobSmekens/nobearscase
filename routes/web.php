<?php

use App\Http\Controllers\BearController;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\WebAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

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
/////////////////////limit from app/providers/routeserviceprovider/////////////
Route::middleware(['throttle:global'])->group(function () {
    /////////////////////// import file and reset table//////////////////////
    Route::get('/import', [ImportController::class, 'importForm']);
    Route::post('/import', [ImportController::class, 'import']);
    Route::get('/reset', [ImportController::class, 'resetTable']);

    Route::get('/index', [BearController::class, 'bearIndex']);
    Route::get('/json', [JsonController::class, 'bearJson']);
    Route::get('/table', [JsonController::class, 'bearTable']);
    Route::get('/sortclosest', [BearController::class, 'sortClosest']);
    Route::get('/sortfurthest', [BearController::class, 'sortFurthest']);


    ///////////////////////////     CRUD    ///////////////////////////////////
    Route::get('/createbear', [BearController::class, 'storeShow']);
    Route::post('/createbear', [BearController::class, 'store']);

    Route::get('/updatebear/{id}', [BearController::class, 'showUpdate']);
    Route::post('/updatebear/{id}', [BearController::class, 'update']);

    Route::get('/bear/{id}', [BearController::class, 'show']);
    Route::post('/bear/{id}/update', [BearController::class, 'update']);
    Route::post('/bear/{id}/delete', [BearController::class, 'destroy']);

    //////////////////////////  download json ///////////////////////////

    Route::get('/jsonDownload', [JsonController::class, 'downloadJson']);

    ////////////////////////users routes////////////////////
    Route::get('/', [WebAuthController::class, 'showRegister']);

    Route::get('/registerUser', [WebAuthController::class, 'showRegister']);
    Route::get('/loginUser', [WebAuthController::class, 'showLogin']);
    Route::get('/logoutUser', [WebAuthController::class, 'logout']);

    Route::post('/registerUser', [WebAuthController::class, 'register']);
    Route::post('/loginUser', [WebAuthController::class, 'login']);

    // tokens
    Route::post('/tokens/create', function (Request $request) {
        $token = $request->user()->createToken($request->token_name);

        return ['token' => $token->plainTextToken];
    });
});
