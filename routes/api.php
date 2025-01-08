<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BrandsController;
use App\Http\Controllers\Api\StoresController;
use App\Http\Controllers\Api\VendorsController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\EnterprisesController;
use App\Http\Controllers\Api\SubCategoriesController;
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

Route::controller(EnterprisesController::class)->group(function () {
    Route::get('/enterprises',          'index');
    Route::put('/enterprises/{id}',     'update');
});


Route::controller(StoresController::class)->group(function () {
    Route::get('/stores',               'index');
    Route::get('/stores/{id}',        'show');
    Route::post('/stores',              'store');
    Route::put('/stores/{id}',          'update');
    Route::delete('/stores/{id}',       'destroy');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
