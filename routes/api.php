<?php

use App\Enums\RoleEnum;
use App\Http\Controllers\AutheticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventaryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authetication;
use App\Http\Middleware\CheckRole;
//use App\Http\Middleware\StockMiddleware;

Route::post('login', [AutheticationController::class, 'login'])->withoutMiddleware(Authetication::class);

Route::middleware([Authetication::class, CheckRole::class . ':' . RoleEnum::CLIENT->value])->group(function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/inventories', [InventaryController::class, 'index']);
});

Route::middleware([Authetication::class, CheckRole::class . ':' . RoleEnum::EMPLOYEE->value])->group(function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::patch('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'delete']);
    Route::get('/orders', [OrderController::class, 'index']);
});

Route::middleware([Authetication::class, CheckRole::class . ':' . RoleEnum::ADMIN->value])->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/suppliers', SupplierController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/profiles', ProfileController::class);
});
