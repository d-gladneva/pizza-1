<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;

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
Route::get('/products', [ProductController::class, 'indexAPI'])->name('products_api');
Route::get('/categories', [CategoryController::class, 'indexAPI'])->name('categories_api');
Route::post('/orders', OrderController::class)->name('orders_api');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
