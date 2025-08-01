<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RazorpayController;



Route::get('/',[RazorpayController::class, 'index'])->name('home');
Route::get('/razorpay', [RazorpayController::class, 'razorpayForm']);
Route::post('razorpay/payment', [RazorpayController::class, 'payment'])->name('razorpay.payment');
Route::get('/payment-success', [RazorpayController::class, 'paymentSuccess'])->name('razorpay.payment.success');