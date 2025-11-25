<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\CategoryController;
use Modules\Admin\Http\Controllers\ProductController;
use Modules\Admin\Http\Controllers\SizeController;
use Modules\Admin\Http\Controllers\BillController;
use Modules\Admin\Http\Controllers\CustomerController;

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('size', SizeController::class);
    Route::resource('bill', BillController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('quantity', CustomerController::class);
});
