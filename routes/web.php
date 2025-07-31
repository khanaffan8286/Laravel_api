<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RazorpayController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/razorpay', [RazorpayController::class, 'index']);
Route::post('razorpay/payment', [RazorpayController::class, 'payment'])->name('razorpay.payment');
Route::get('/payment-success', [RazorpayController::class, 'paymentSuccess'])->name('razorpay.payment.success');