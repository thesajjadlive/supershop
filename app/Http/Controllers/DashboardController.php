<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['title']='Dashboard';
        return view('backend.dashboard',$data);
    }

    public function user_list()
    {
        $data['title'] = 'User List';
        $data['users'] = User::orderBy('id','DESC')->paginate(10);
        $data['serial'] = managePagination($data['users']);
        return view('backend.user',$data);
    }

    public function test()
    {
        $data['title'] = 'Test';
        return 'This route is created for test purpose from Dashboard Controller';
    }
}
