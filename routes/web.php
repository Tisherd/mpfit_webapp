<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return Inertia::render('AboutProject', []);
});

Route::resource('products', ProductController::class)->names('products');

Route::resource('orders', OrderController::class)->names('orders');
Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
