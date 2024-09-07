<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([
    'prefix' => 'categories',
    'controller' => CategoryController::class,
], static function () {
    Route::get('/', 'index');
    Route::get('/{categories}', 'show');
    Route::post('/', 'store');
    Route::patch('/{categories}', 'update');
    Route::delete('/{categories}', 'delete');
});
