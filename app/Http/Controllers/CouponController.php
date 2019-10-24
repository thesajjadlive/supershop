<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Coupon List';
        //$data['coupons'] = Coupon::withTrashed()->orderBy('id','DESC')->paginate(10);

        $coupon = new Coupon();
        $coupon = $coupon->withTrashed();

        //search coupon
        if ($request->has('search') && $request->search != null){
            $coupon = $coupon->where('name','like','%'.$request->search.'%');
        }



        $coupon = $coupon->orderBy('id','DESC')->paginate(10);

        //next pages search issue resolved (this must be after paginate)
        if (isset($request->status) || $request->search) {
            $render['search'] = $request->search;
            $coupon = $coupon->appends($render);
        }


        $data['coupons'] =$coupon;
        $data['serial'] = managePagination($coupon);

        return view('backend.coupon.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add New Coupon';
        return view('backend.coupon.create',$data);
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
            'code'=>'required',
            'value'=>'required',
            'min_limit'=>'required'
        ]);
        $coupon = $request->except('_token');
        Coupon::create($coupon);
        session()->flash('message','Coupon Created Successfully');
        return redirect()->route('coupon.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        $data['title'] = 'Edit Coupon';
        $data['coupon'] = $coupon;
        return view('backend.coupon.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'code'=>'required',
            'value'=>'required',
            'min_limit'=>'required'
        ]);
        $coupon_data = $request->except('_token','_method');
        $coupon->update($coupon_data);
        session()->flash('message','Coupon Edited Successfully');
        return redirect()->route('coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        session()->flash('message','Coupon Deleted Successfully');
        return redirect()->route('coupon.index');
    }


    public function restore($id)
    {
        $coupon = Coupon::onlyTrashed()->findOrFail($id);
        $coupon->restore();
        session()->flash('message','Coupon Restored Successfully');
        return redirect()->route('coupon.index');
    }

    public function delete($id)
    {
        $coupon = Coupon::onlyTrashed()->findOrFail($id);
        $coupon->forceDelete();
        session()->flash('message','Coupon Permanently Removed');
        return redirect()->route('coupon.index');
    }
}
