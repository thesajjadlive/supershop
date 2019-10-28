<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'User List';
        $data['users'] = User::orderBy('id','DESC')->withTrashed()->paginate(10);
        $data['serial'] = managePagination($data['users']);
        return view('backend.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Create User";
        return view('backend.user.create', $data);
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
            'name' => 'required',
            'type' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);
        $user = $request->except('_token', 'password');
        $user['password'] = bcrypt($request->password);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = time().'SS'.rand(0000,9999).$file->getClientOriginalName();
            $file->move('images/users/', $file_name);
            $user['image'] = 'images/users/' . $file_name;
        }


        User::create($user);
        session()->flash('message', 'User created successfully');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title']="Edit User";
        $data['user']=User::findOrFail($id);
        return view('backend.user.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'confirmed'
        ]);
        $user_req = $request->except('_token');

         if ($request->has('password'))
         {
             $user_req['password'] = bcrypt($request->password);
         }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = time().'SS'.rand(0000,9999).$file->getClientOriginalName();
            $file->move('images/users/', $file_name);
            File::delete($user->image);
            $user_req['image'] = 'images/users/' . $file_name;
        }


        $user->update($user_req);
        session()->flash('message', 'User Updated successfully');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('message','User Deleted Successfully');
        return redirect()->route('user.index');
    }


    public function restore($id)
    {
        $coupon = User::onlyTrashed()->findOrFail($id);
        $coupon->restore();
        session()->flash('message','User Restored Successfully');
        return redirect()->route('user.index');
    }

    public function delete($id)
    {
        $coupon = User::onlyTrashed()->findOrFail($id);
        $coupon->forceDelete();
        session()->flash('message','User Permanently Removed');
        return redirect()->route('user.index');
    }
}
