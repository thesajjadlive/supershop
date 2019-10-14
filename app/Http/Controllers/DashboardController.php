<?php

namespace App\Http\Controllers;

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
        return 'This route is created for test purpose from Dashboard Controller';
    }
}
