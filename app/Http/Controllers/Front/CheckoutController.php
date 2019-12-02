<?php

namespace App\Http\Controllers\Front;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{


    public function __construct()
    {
        $this->middleware('customer');
    }


    public function index()
    {
        $data['cart'] = session('cart');

        return view('frontend.checkout.index',$data);
    }

    public function payment($customer_id,$order_id)
    {
        $data['customer'] = Customer::findOrFail($customer_id);
        $data['order'] = Order::findOrFail($order_id);
        $data['details'] = OrderDetail::findOrFail($order_id);
        $data['cart'] = session('cart');
        session()->remove('cart');
        session()->flash('message','Order has been placed successfully');
        return view('frontend.checkout.payment',$data);
    }
}
