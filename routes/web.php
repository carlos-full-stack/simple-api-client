<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [IndexController::class, 'showIndex'])->name('index');;

Route::get('/new', [ProductController::class, 'newProduct'])->name('product.new');

Route::post('/new', [ProductController::class, 'saveProduct'])->name('product.save');

Route::get('/product/{id}', [ProductController::class, 'showProduct'])->name('product.show');

Route::get('/product/edit/{id}', [ProductController::class, 'editProduct'])->name('product.edit');

Route::put('/product/update/{id}', [ProductController::class, 'updateProduct'])->name('product.update');

Route::delete('/delete/{id}', [ProductController::class, 'deleteProduct'])->name('product.delete');
