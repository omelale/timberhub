<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {return view('welcome');})->name('home');
Route::resource('products', ProductController::class);
