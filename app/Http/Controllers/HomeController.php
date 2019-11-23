<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['latest_product'] = Product::with(['category','brand'])->orderBy('id','DESC')->limit(6)->get() ;
        $data['featured_product'] = Product::with(['category','brand'])->where('is_featured', 1)->orderBy('id','DESC')->limit(6)->get();
        $data['categories'] = Category::orderBy('id','DESC')->limit(7)->get() ;
        return view('frontend.home',$data);
    }
}
