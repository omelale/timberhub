<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;

Route::get('/', function () {return view('welcome');})->name('home');
Route::resource('products', ProductController::class);
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/{supplier}', [SupplierController::class, 'show'])->name('suppliers.show');
Route::get('/suppliers/{supplier}/products', [SupplierController::class, 'addProducts'])->name('suppliers.addProducts');
Route::post('/suppliers/{supplier}/products', [SupplierController::class, 'postAddProducts'])->name('suppliers.postAddProducts');
