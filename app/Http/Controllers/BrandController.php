<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data['title'] = 'Brand List';
        //$data['brands'] = Brand::withTrashed()->orderBy('id','DESC')->paginate(10);

        $brand = new Brand();
        $brand = $brand->withTrashed();

        //search brand
        if ($request->has('search') && $request->search != null){
            $brand = $brand->where('name','like','%'.$request->search.'%');
        }

        //search via status
        if ($request->has('status') && $request->status != null){
            $brand = $brand->where('status',$request->status);
        }


        $brand = $brand->orderBy('id','DESC')->paginate(10);
        $data['brands'] =$brand;
        $data['serial'] = 1;

        return view('backend.brand.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add New Brand';
        return view('backend.brand.create',$data);
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
            'status'=>'required'
        ]);
        $brand = $request->except('_token');
        Brand::create($brand);
        session()->flash('message','Brand Created Successfully');
        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $data['title'] = 'Edit Brand';
        $data['brand'] = $brand;
        return view('backend.brand.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name'=>'required',
            'status'=>'required'
        ]);
        $brand_data = $request->except('_token','_method');
        $brand->create($brand_data);
        session()->flash('message','Brand Edited Successfully');
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        session()->flash('message','Brand Deleted Successfully');
        return redirect()->route('brand.index');
    }


    public function restore($id)
    {
        $brand = Brand::onlyTrashed()->findOrFail($id);
        $brand->restore();
        session()->flash('message','Brand Restored Successfully');
        return redirect()->route('brand.index');
    }

    public function delete($id)
    {
        $brand = Brand::onlyTrashed()->findOrFail($id);
        $brand->forceDelete();
        session()->flash('message','Brand Permanently Removed');
        return redirect()->route('brand.index');
    }
}
