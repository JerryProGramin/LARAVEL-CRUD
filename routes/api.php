<?php

use App\Http\Controllers\AutheticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authetication;
use App\Http\Middleware\StockMiddleware;
use App\Http\Middleware\RoleMiddleware;


Route::post('login', [AutheticationController::class, 'login'])->withoutMiddleware(Authetication::class);

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
    'prefix' => 'roles',
    'controller' => RoleController::class,
], static function () {
    Route::get('/', 'index');
    Route::get('/{role}', 'show');
    Route::post('/', 'store');
    Route::patch('/{role}', 'update');
    Route::delete('/{role}', 'delete');
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
    Route::get('/{product}', 'show')->middleware(StockMiddleware::class);
    Route::post('/', 'store');
    Route::patch('/{product}', 'update');
    Route::delete('/{product}', 'delete');
});

// Route::group([
//     'prefix' => 'products',
//     'middleware' => RoleMiddleware::class,
//     'controller' => ProductController::class,
// ], function () {
//     Route::get('/', 'index')->name('products.index');
//     Route::post('/', 'store')->name('products.store');
//     Route::patch('/{product}', 'update')->name('products.update');
//     Route::delete('/{product}', 'delete')->name('products.delete');
// });


// Route::middleware([Authetication::class])->group(function () {

//     // Rutas para CLIENT (solo puede listar productos)
//     Route::get('/products', [ProductController::class, 'index'])->middleware([RoleMiddleware::class . ':client']);
//     Route::get('/products/{id}', [ProductController::class, 'show'])->middleware([RoleMiddleware::class . ':client']);
    

//     // Rutas para EMPLOYEE (puede hacer CRUD de productos)
//     Route::group(['middleware' => [RoleMiddleware::class . ':employee']], function () {
//         Route::post('/products', [ProductController::class, 'store']);
//         Route::put('/products/{id}', [ProductController::class, 'update']);
//         Route::delete('/products/{id}', [ProductController::class, 'delete']);
//     });

//     // Rutas para ADMIN (tiene acceso completo)
//     Route::group(['middleware' => [RoleMiddleware::class . ':admin']], function () {
//         Route::resource('/users', UserController::class);
//         Route::resource('/products', ProductController::class);
//         Route::resource('/orders', ProfileController::class);
//         Route::resource('/categories', CategoryController::class);
//         // Más rutas para otras tablas
//     });
// });
