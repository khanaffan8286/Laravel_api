<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Razorpay\Api\Api;
use App\Models\OrderIdModel;

class RazorpayController extends Controller
{
  public function index()
{
    // Paginate, don't use get() if you want pagination links in your view
    $orders = OrderIdModel::select([
        'name',
        'email',
        'amount',
        'order_id',
        'payment_id',
        'contact'
    ])->latest()->paginate(15);

    return view('welcome', compact('orders'));
}

    public function razorpayForm(){
        return view('razorpay');
    }

    public function payment(Request $request){
       $name = $request->input('name');
       $email = $request->input('email');
       $contact = $request->input('contact');
       $amount=  $request->input('amount');
       $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
       $orderdata =[
        'receipt' => 'order_'.rand(1000,9999),
        'amount'  => $amount * 100,
        'currency' => 'INR',
        'payment_capture' => 1, // auto capture
       ];
       $order = $api->order->create($orderdata);
       return view('payment',['orderId'=> $order['id'], 'amount' =>$amount * 100,'name' => $name, 'email' => $email, 'contact' => $contact]);
    }

    public function paymentSuccess(Request $request){

        $orderId = $request->query('order_id');
        $paymentId = $request->query('payment_id');
        $name = $request->query('name');
        $email = $request->query('email');
        $contact = $request->query('contact');
        $amount = $request->query('amount');
        OrderIdModel::create([
            'order_id' => $orderId,
            'payment_id' => $paymentId,
            'name' => $name,
            'email' => $email,
            'contact' => $contact,
            'amount' => $amount
        ]);
        return view('payment-success',compact('orderId', 'paymentId', 'name', 'email', 'contact', 'amount'));
    }
}
