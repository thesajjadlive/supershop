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


    public function test()
    {
        $data['title'] = 'Test';
        return User::all();
    }
}
