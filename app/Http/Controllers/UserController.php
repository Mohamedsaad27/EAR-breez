<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        return view('user.home');
    }

    public function shop(){
        return view('user.shop');
    }

    public function order(){
        return view('user.orders');
    }
}
