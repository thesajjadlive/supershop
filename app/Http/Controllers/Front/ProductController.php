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
    public function index()
    {
        $data['title'] = 'Product Details';
        return view('frontend.product.details', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $data['latest_product'] = Product::with(['category','brand'])->orderBy('id','DESC')->limit(6)->get() ;
        $data['featured_product'] = Product::with(['category','brand'])->where('is_featured', 1)->orderBy('id','DESC')->limit(6)->get() ;
        $data['product'] = Product::with('product_image')->findOrFail($id);
        return view('frontend.product.details',$data);
    }

    /**
     * show product details in frontend.
     */

}
