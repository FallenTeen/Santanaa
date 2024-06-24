<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard(){
        return view('user.dashboard');
    }
    public function lihatOrder(){
        return view('user.order');
    }
    public function buatReport(){
        return view('user.report');
    }
}
