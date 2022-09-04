<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->post('/usr', function (Request $request) {
//     return $request->user();
// });
Route::post('/usr',[UserController::class,'main_method']);
// for images
Route::post('/getImgs', [ImageController::class, 'getImages']);
/* for cart */
Route::post('/cart/list', [CartController::class, 'get_cart']);
Route::post('/cart/add', [CartController::class, 'add_to_cart']);
Route::post('/cart/remove', [CartController::class, 'remove_from_cart']);
/* for user */
// Route::post('/user/')