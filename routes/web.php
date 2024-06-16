<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('{user}/tambah-product', [ProductController::class, 'create'])->name('products.create');
Route::post('{user}/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('{user}/product/{product}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('{user}/product/{product}/update', [ProductController::class, 'update'])->name('products.update');
Route::post('{user}/product/{product}/delete', [ProductController::class, 'delete'])->name('products.delete');

Route::get('admin/{user}/list-products', [AdminController::class, 'index'])->name('admin.index');

Route::get('profile/{user}', [UserController::class, 'index'])->name('users.index');
