<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    
    public function register()
    {
        return view('register');
    }
    public function authenticating(request $request)
    {
        dd('ini adalah aku raja meksiko');
    }
}