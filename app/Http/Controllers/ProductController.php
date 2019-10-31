<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Product List';
        //$data['Products'] = Product::withTrashed()->orderBy('id','DESC')->paginate(10);

        $product = new Product();
        $product = $product->withTrashed();

        //search Product
        if ($request->has('search') && $request->search != null){
            $product = $product->where('name','like','%'.$request->search.'%');
        }

        //search via status
        if ($request->has('status') && $request->status != null){
            $product = $product->where('status',$request->status);
        }


        $product = $product->orderBy('id','DESC')->paginate(10);

        //next pages search issue resolved (this must be after paginate)
        if (isset($request->status) || $request->search) {
            $render['status'] = $request->status;
            $render['search'] = $request->search;
            $category = $product->appends($render);
        }


        $data['products'] =$product;
        $data['serial'] = managePagination($product);

        return view('backend.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add New Product';
        $data['categories']= Category::orderBy('name')->pluck('name','id');
        $data['brands']= Brand::orderBy('name')->pluck('name','id');
        return view('backend.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
            'size'=>'nullable',
            'color'=>'nullable',
            'description'=>'nullable',
            'price'=>'required|numeric',
            'stock'=>'required|numeric',
            'status'=>'required',
            'images.*'=>'required|image'
        ]);
        //Product create
        $product = $request->except('_token','images.*');
        $product = Product::create($product);

        //Multiple image upload
        if (count($request->images))
        {
            foreach ($request->images as $image)
            {
                $product_image['product_id'] = $product->id;
                $file_name = $product->id.'-'.time().'-'.rand(0000,9999).'.'.$image->getClientoriginalExtension();
                $image->move('images/products/',$file_name);
                $product_image['file_path'] = 'images/products/'.$file_name;
                ProductImage::create($product_image);
            }
        }


        session()->flash('message','Product Created Successfully');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'Product Details';
        $data['product'] = Product::with(['category','brand','product_image'])->findOrFail($id);

        return view('backend.product.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data['title'] = 'Edit Product';
        $data['product'] = $product;
        $data['categories']= Category::orderBy('name')->pluck('name','id');
        $data['brands']= Brand::orderBy('name')->pluck('name','id');
        return view('backend.product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
            'size'=>'nullable',
            'color'=>'nullable',
            'description'=>'nullable',
            'price'=>'required|numeric',
            'stock'=>'required|numeric',
            'status'=>'required'
        ]);

        $product_data = $request->except('_token');
        if(!$request->has('is_featured'))
        {
            $product_data['is_featured'] = 0;
        }

        $product->update($product_data);

        //Multiple image update
        if ($request->hasFile('file_path') && count($request->images))
        {
            foreach ($request->images as $image)
            {
                $product_image['product_id'] = $product->id;
                $file_name = $product->id.'-'.time().'-'.rand(0000,9999).'.'.$image->getClientoriginalExtension();
                $image->move('images/products/',$file_name);
                $product_image['file_path'] = 'images/products/'.$file_name;
                ProductImage::create($product_image);
            }
        }


        session()->flash('message','Product Updated Successfully');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
       $product->delete();
       session()->flash('message','Product Deleted Successfully');
       return redirect()->route('product.index');
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        session()->flash('message','Product Restored Successfully');
        return redirect()->route('product.index');
    }

    public function delete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();
        session()->flash('message','Product Removed Permanently');
        return redirect()->route('product.index');
    }

    public function delete_image($image_id)
    {
        $image = ProductImage::findOrFail($image_id);
        File::delete($image->file_path);
        $image->delete();
        session()->flash('message','Product image has been deleted.');
        return redirect()->back();
    }
}
