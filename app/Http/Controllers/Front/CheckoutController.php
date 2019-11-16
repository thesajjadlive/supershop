<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $data['cart'] = session('cart');

        return view('frontend.checkout.index',$data);
    }
}
