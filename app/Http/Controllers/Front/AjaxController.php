<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class AjaxController extends Controller
{
    //assets/frontend/images/no-image.jpg
    public function addToCart($product_id)
    {



        $product = Product::findOrFail($product_id);


        $carts = session('cart');
           $cartStatus = true;
            if($carts != null)
            {
                foreach ($carts as $id=>$cart)
                {
                    if($cart['product_id']== $product->id){
                        $carts[$id]['quantity'] = $cart['quantity']+1;
                        session()->remove('cart');
                        session()->put('cart',$carts);
                        $cartStatus = false;
                        break;
                    }
                }
            }
            if($cartStatus && $product->stock > 0){
                $sesionData['product_id'] = $product->id;
                $sesionData['name'] = $product->name;
                $sesionData['quantity'] = 1;
                $sesionData['price'] = $product->price;
                $sesionData['image'] = isset($product->product_image[0]) ? $product->product_image[0]->file_path : 'assets/frontend/images/no-image.jpg';
                session()->push('cart', $sesionData);
            }

            /*if($product->stock > 0) {
                $sesionData['product_id'] = $product->id;
                $sesionData['name'] = $product->name;
                $sesionData['quantity'] = 1;
                $sesionData['price'] = $product->price;
                $sesionData['image'] = isset($product->product_image[0]) ? $product->product_image[0]->file_path : 'assets/frontend/images/no-image.jpg';
                session()->push('cart', $sesionData);
            }*/




        $data['cart'] = session('cart');
//            dd( $data['cart']);
        $data['headerCartDetailsView'] = view('frontend.ajax.headerCartDetails',$data)->render();
        return $data;
    }



    public function update( Request $request, $product_id)
    {
        $carts = session('cart');
        if($carts != null)
        {
            foreach ($carts as $id=>$cart)
            {
                if($cart['product_id']== $product_id){
                    $carts[$id]['quantity'] = $request->quantity;
                    session()->remove('cart');
                    session()->put('cart',$carts);
                    break;
                }
            }
        }
        return redirect()->back();
    }



    public function delete( $product_id)
    {
        $carts = session('cart');
        if($carts != null)
        {
            foreach ($carts as $id=>$cart)
            {
                if($cart['product_id']== $product_id){
                    unset($carts[$id]);
                    session()->remove('cart');
                    session()->put('cart',$carts);
                    break;
                }
            }
        }
        return redirect()->back();
    }
}
