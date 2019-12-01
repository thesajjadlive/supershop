<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Mail\OrderPlaceMail;
use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'street_address' => 'required',
            'district' => 'required',
            'zip' => 'required',
        ]);

        //customer store
        $data = $request->except('_token', 'shipping-method');
        Customer::create($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         //Transaction start
         DB::beginTransaction();
         try {

             //customer id
             $customer_id = Auth::guard('customer')->user()->id;


             //order store
             $order['order_number'] = 'OID-' . time();
             $order['customer_id'] = $customer_id;
             $order['date'] = now();
             $order_id = Order::insertGetId($order);

             //dd($order_id);


             //order details store
             $cart = session('cart');
             $total = 0;
             if (count($cart)) {
                 foreach ($cart as $item) {
                     $product = Product::findOrFail($item['product_id']);
                     if ($product->stock>=$item['quantity']){
                     $ordre_details['order_id'] = $order_id;
                     $ordre_details['product_id'] = $item['product_id'];
                     $ordre_details['product_name'] = $item['name'];
                     $ordre_details['price'] = $item['price'];
                     $ordre_details['quantity'] = $item['quantity'];
                     $ordre_details['shipping'] = $item['quantity'] * 30;
                     $ordre_details['total'] = $item['quantity'] * $item['price'];

                     OrderDetail::create($ordre_details);

                     $total += $ordre_details['total']+$ordre_details['shipping'];

                     //product stock update
                         $product->stock = $product->stock-$item['quantity'];
                         $product->save();
                 }
                     else{
                     session()->flash('message',ucfirst($item['name']).' '.'is out of stock');
                     return redirect()->route('cart');
                     }
                 }
             }

             Order::findOrFail($order_id)->update(['total_price' => $total]);

        //Transaction end
            DB::commit();

            //Confirmation mail send
             $customer = Customer::findOrFail($customer_id);
            Mail::to($customer->email)->send(new OrderPlaceMail($order_id));

            return redirect()->route('payment',[$customer_id,$order_id]);

         }catch (\Exception $exception)
         {
             DB::rollBack();
             Log::error('CustomerController@store Message-'.$exception->getMessage());
             session()->flash('message','Something Went Wrong');
             return redirect()->back();
         }
        //Transaction end

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
