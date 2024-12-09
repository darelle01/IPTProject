<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class LoginPageController extends Controller
{
    public function ViewLoginPage(Request $request){
    
        return view('LoginFolder.LoginPage');
    }
}
