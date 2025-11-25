<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\HomeController;
use Modules\User\Http\Controllers\PageController;
use Modules\User\Http\Controllers\CartController;
use Modules\User\Http\Controllers\PaymentController;
use Modules\User\Http\Controllers\VnPayController;

Route::get('/', [PageController::class, 'getProduct'])->name('page.getProduct');

Route::get('category/{key}', [PageController::class, 'getAllCategories']);
Route::match(['get', 'post'], '/detailProduct/{id_name}', [PageController::class, 'getDetail']);
Route::get('search', [PageController::class, 'search'])->name('search');
Route::get('manageOrder', [PageController::class, 'manageOrder'])->name('manageOrder');
Route::get('cancelOrder/{id}', [PageController::class, 'cancelOrder'])->name('cancelOrder');

Route::get('showCart', [CartController::class, 'index'])->name('showCart');
Route::post('addCart', [CartController::class, 'cart'])->name('cart');
Route::post('up', [CartController::class, 'up'])->name('up');
Route::post('down', [CartController::class, 'down'])->name('down');
Route::post('remove', [CartController::class, 'remove'])->name('remove');
Route::get('destroy', [CartController::class, 'destroy'])->name('destroy');
Route::get('checkout', [CartController::class, 'getCheckOut'])->name('checkout');

Route::get('formCustomer', [PaymentController::class, 'getFormCustomers'])->name('formCustomer');
Route::post('payment', [PaymentController::class, 'payment'])->name('payment');
Route::get('paySuccess', [PaymentController::class, 'paySuccess'])->name('paySuccess');

Route::get('formCustomerVnPay', [VnPayController::class, 'getFormCustomersVnPay'])->name('formCustomerVnPay');
Route::post('vnPayment', [VnPayController::class, 'payment'])->name('paymentVnPay');
Route::get('vnpay', [VnPayController::class, 'vnpay'])->name('vnpay');
