<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\BrandsController;
use App\Http\Controllers\Api\StoresController;
use App\Http\Controllers\Api\VendorsController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\ReordersController;
use App\Http\Controllers\Api\CustomersController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\EnterprisesController;
use App\Http\Controllers\Api\ShoppingCartsController;
use App\Http\Controllers\Api\SubCategoriesController;
use App\Http\Controllers\Api\ProductImagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(UsersController::class)->group(function () {
    Route::get('/users',              'index');
    Route::get('/users/{id}',         'show');
});

Route::controller(CustomersController::class)->group(function () {
    Route::get('/customers',              'index');
    Route::get('/customers/{id}',         'show');
    Route::post('/customers',             'store');
});

Route::controller(ShoppingCartsController::class)->group(function () {
    Route::get('/carts',              'index');
    Route::get('/carts/{id}',         'show');
    Route::post('/carts',             'store');
});

Route::controller(BrandsController::class)->group(function () {
    Route::get('/brands',               'index');
    Route::get('/brands/{id}',          'show');
});

Route::controller(CategoriesController::class)->group(function () {
    Route::get('/categories',          'index');
    Route::get('/categories/{id}',     'show');
});

Route::controller(SubCategoriesController::class)->group(function () {
    Route::get('/subcategories',          'index');
    Route::get('/subcategories/{id}',     'show');
});

Route::controller(VendorsController::class)->group(function () {
    Route::get('/vendors',          'index');
    Route::get('/vendors/{id}',     'show');
});

Route::controller(ProductsController::class)->group(function () {
    Route::get('/products',          'index');
    Route::get('/products/{id}',     'show');
    Route::post('/products',         'store');
});

Route::controller(ProductImagesController::class)->group(function () {
    Route::get('/product-images',          'index');
    // Route::get('/product-images/{id}',     'show');
    Route::get('/product-images/{id}',     'getImagesByProduct');
    Route::put('/product-images',          'store');
});

Route::controller(EnterprisesController::class)->group(function () {
    Route::get('/enterprises',          'index');
    Route::put('/enterprises/{id}',     'update');
});

Route::controller(StoresController::class)->group(function () {
    Route::get('/stores',               'index');
    Route::get('/stores/{id}',          'show');
    Route::post('/stores',              'store');
    Route::put('/stores/{id}',          'update');
    Route::delete('/stores/{id}',       'destroy');
});

Route::controller(ReordersController::class)->group(function () {
    Route::get('/reorders',               'index');
    Route::get('/reorders/{id}',          'show');
    Route::post('/reorders',              'store');

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
