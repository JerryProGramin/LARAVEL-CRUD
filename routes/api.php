<?php

use App\Enums\RoleEnum;
use App\Http\Controllers\AutheticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InventaryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authetication;
use App\Http\Middleware\CheckRole;
use Src\User\Infrastructure\Controller\UserController as SrcUserController;
use Src\Category\Infrastructure\Controller\CategoryController as SrcCategoryController;
use Src\Supplier\Infrastructure\Controller\SupplierController as SrcSupplierController;
use Src\Product\Infrastructure\Controller\ProductController as SrcProductController;
use Src\Inventory\Infrastructure\Controller\InventoryController as SrcInventoryController;
use Src\OrderProduct\Infrastructure\Controller\OrderProductController as SrcOrderProductController;
use Src\Order\Infrastructure\Controller\OrderController as SrcOrderController;


Route::post('login', [AutheticationController::class, 'login'])->withoutMiddleware(Authetication::class);

// Route::middleware([Authetication::class, CheckRole::class . ':' . RoleEnum::CLIENT->value])->group(function () {
//     Route::get('/products', [ProductController::class, 'index']);
//     Route::get('/products/{id}', [ProductController::class, 'show']);
//     Route::post('/orders', [OrderController::class, 'store']);
// });

// Route::middleware([Authetication::class, CheckRole::class . ':' . RoleEnum::EMPLOYEE->value])->group(function () {
//     Route::post('/products', [ProductController::class, 'store']);
//     Route::patch('/products/{id}', [ProductController::class, 'update']);
//     Route::delete('/products/{id}', [ProductController::class, 'delete']);
//     Route::get('/orders', [OrderController::class, 'index']);
//     Route::get('/inventories', [InventaryController::class, 'index']);
// });

// Route::middleware([Authetication::class, CheckRole::class . ':' . RoleEnum::ADMIN->value])->group(function () {
//     //Route::resource('/users', UserController::class);
//     //Route::resource('/categories', CategoryController::class);
//     Route::resource('/suppliers', SupplierController::class);
//     Route::resource('/roles', RoleController::class);
//     Route::resource('/profiles', ProfileController::class);
// });

Route::group([
    'prefix' => 'users',
    'controller' => SrcUserController::class,
], static function () {
    Route::get('/', 'index');
});

Route::group([
    'prefix' => 'categories',
    'controller' => SrcCategoryController::class,
], static function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::patch('/{id}', 'update');
    Route::delete('/{id}', 'delete');
});

Route::group([
    'prefix' => 'suppliers',
    'controller' => SrcSupplierController::class,
], static function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::patch('/{id}', 'update');
    Route::delete('/{id}', 'delete');
});

Route::group([
    'prefix' => 'products',
    'controller' => SrcProductController::class,
], static function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::patch('/{id}', 'update');
    Route::delete('/{id}', 'delete');
});

Route::group([
    'prefix' => 'inventories',
    'controller' => SrcInventoryController::class,
], static function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});

Route::group([
    'prefix' => 'orders',
    'controller' => SrcOrderController::class,
], static function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
});

Route::group([
    'prefix' => 'order_products',
    'controller' => SrcOrderProductController::class,
], static function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});

Route::group([
    'prefix' => 'images',
    'controller' => ImageController::class,
], function () {
    Route::post('/users/{user}', 'saveUser');
    Route::get('/users/{user}', 'getUser');
    Route::post('/users/{user}/base64', 'saveBase64User');

    Route::post('/products/{product}', 'saveProduct');
    Route::get('/products/{product}', 'getProduct');
    Route::post('/products/{product}/base64', 'saveBase64Product');
});

Route::group([
    'prefix' => 'clients',
    'controller' => ClientController::class,
], function () {
    Route::post('/individual', 'storeIndividual');
    Route::post('/company', 'storeCompany');
});