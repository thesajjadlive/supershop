<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //assets/frontend/images/no-image.jpg
    public function addToCart($product_id)
    {

        $product = Product::findOrFail($product_id);
        if($product->stock > 0) {
            $sesionData['product_id'] = $product->id;
            $sesionData['name'] = $product->name;
            $sesionData['quantity'] = 1;
            $sesionData['price'] = $product->price;
            $sesionData['image'] = isset($product->product_image[0]) ? $product->product_image[0]->file_path : 'assets/frontend/images/no-image.jpg';
            session()->push('cart', $sesionData);
        }
        $data['cart'] = session('cart');
        $data['headerCartDetailsView'] = view('frontend.ajax.headerCartDetails',$data)->render();
        return $data;
    }
}
