<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ProductMiddleware;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group([
    'prefix' => 'users',
    'controller' => UserController::class,
], static function () {
    Route::get('/', 'index');
    Route::get('/{user}', 'show');
    Route::post('/', 'store');
    Route::patch('/{user}', 'update');
    Route::delete('/{user}', 'delete');
});

Route::group([
    'prefix' => 'profiles',
    'controller' => ProfileController::class,
], static function () {
    Route::get('/', 'index');
    Route::get('/{profile}', 'show');
    Route::post('/', 'store');
    Route::patch('/{profile}', 'update');
    Route::delete('/{profile}', 'delete');
});

Route::group([
    'prefix' => 'categories',
    'controller' => CategoryController::class,
], static function () {
    Route::get('/', 'index');
    Route::get('/{category}', 'show');
    Route::post('/', 'store');
    Route::patch('/{category}', 'update');
    Route::delete('/{category}', 'delete');
});

Route::group([
    'prefix' => 'suppliers',
    'controller' => SupplierController::class,
], static function () {
    Route::get('/', 'index');
    Route::get('/{supplier}', 'show');
    Route::post('/', 'store');
    Route::patch('/{supplier}', 'update');
    Route::delete('/{supplier}', 'delete');
});

Route::group([
    'prefix' => 'products',
    'controller' => ProductController::class,
], static function () {
    Route::get('/', 'index');
    Route::get('/{product}', 'show')->middleware(ProductMiddleware::class);
    Route::post('/', 'store');
    Route::patch('/{product}', 'update');
    Route::delete('/{product}', 'delete');
});