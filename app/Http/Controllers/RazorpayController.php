<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    public function index(){

    return view('razorpay');
    }

    public function payment(Request $request){

       $amount=  $request->input('amount');
       $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
       $orderdata =[
        'receipt' => 'order_'.rand(1000,9999),
        'amount'  => $amount * 100,
        'currency' => 'INR',
        'payment_capture' => 1, // auto capture
       ];
       $order = $api->order->create($orderdata);
       return view('payment',['orderId'=> $order['id'], 'amount' =>$amount * 100]);
    }

    public function paymentSuccess(Request $request){

        $orderId = $request->query('order_id');
        $paymentId = $request->query('payment_id');
        return view('payment-success',compact('orderId', 'paymentId'));
    }
}
