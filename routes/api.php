<?php

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

Route::post('register', [App\Http\Controllers\Api\RegisterController::class, 'register']);
Route::post('login', [App\Http\Controllers\Api\RegisterController::class, 'login']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->get('allProduct', [App\Http\Controllers\Api\ProductController::class, 'all']);
Route::middleware('auth:api')->get('products/{id}/search', [App\Http\Controllers\Api\ProductoController::class, 'search']);
Route::middleware('auth:api')->get('products/{id}/destroy', [App\Http\Controllers\Api\ProductoController::class, 'destroy']);
Route::middleware('auth:api')->post('products/create', [App\Http\Controllers\Api\ProductoController::class, 'create']);
Route::get('returnProducts', [App\Http\Controllers\Api\ProductController::class, 'all']);
