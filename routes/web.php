<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PurchaseOrdersController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\UnitsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin');
})->name('admin');



Route::resource('/categories', CategoriesController::class);
Route::resource('/units', UnitsController::class);
Route::resource('/suppliers', SuppliersController::class);
Route::resource('/products', ProductsController::class);
Route::resource('/orders', PurchaseOrdersController::class);
Route::get('/get-products/{categoryId}', [PurchaseOrdersController::class, 'getProducts']);

