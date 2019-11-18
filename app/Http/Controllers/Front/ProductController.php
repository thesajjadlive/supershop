<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=false)
    {
        $data['title'] = 'Product Details';
        $products = new Product();
        $products = $products->with(['brand','category','product_image']);

        if ($id != false){
            $products = $products->where('category_id', $id);
        }

        $products = $products->orderBy('id','DESC')->paginate('12');
        $data['products'] = $products;
        return view('frontend.product.index', $data);
    }


    public function brand($id=false)
    {
        $products = new Product();
        $products = $products->with(['brand','category','product_image']);

        if ($id != false){
            $products = $products->where('brand_id', $id);
        }

        $products = $products->orderBy('id','DESC')->paginate('12');
        $data['products'] = $products;
        return view('frontend.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $data['title'] = 'Product Details';
       // $data['latest_product'] = Product::with(['category','brand'])->orderBy('id','DESC')->limit(6)->get() ;
        $data['featured_product'] = Product::with(['category','brand'])->where('is_featured', 1)->orderBy('id','DESC')->limit(6)->get() ;
        $data['product'] = Product::with('product_image')->findOrFail($id);
        $data['related_product'] = Product::where('id','!=',$id)->where(['category_id'=>$data['product']->category_id])->orderBy('id','DESC')->limit(8)->get();
        return view('frontend.product.details',$data);
    }

    /**
     * show product details in frontend.
     */

    public function cart()
    {
        $data['title'] = 'Cart Details';
        $data['cart'] = session('cart');
        return view('frontend.cart',$data);
    }

    public function clear()
    {
        session()->remove('cart');
        return redirect()->back();
    }

}
