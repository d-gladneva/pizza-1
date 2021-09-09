<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SettingsController;

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

Route::get('/', function () {
    $categories = Category::orderBy('position')->orderBy('id')->get();
    return view('pizza')->with(compact('categories'));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::resources([
        'products'   =>  ProductController::class,
        'categories' =>  CategoryController::class,
    ]);
    Route::resource('images', ImageController::class)
        ->only('index', 'destroy');
    Route::resource('settings', SettingsController::class)
        ->only('index', 'update');
});
