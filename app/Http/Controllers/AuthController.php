<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // cek user status = active
            if(Auth::user()->status != 'active'){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not active yet. Please contact admin!');
                return redirect('/login');
            }

            $request->session()->regenerate();
            if(Auth::user()->role_id == 1) {
                return redirect ('dashboard');
            }

            if(Auth::user()->role_id == 2) {
                return redirect ('profile');
            }
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Login Invalid');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function registerprocess(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|unique:mahasiswa|max:20',
            'name' => 'required|max:255',
            'username' => 'required|unique:mahasiswa|max:255',
            'password' => 'required|max:255',
            'program_studi' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'required',
        ]);

        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());

        Session::flash('status', 'Success');
        Session::flash('message', 'Register success. Wait admin for approval');
        return redirect('register');
    }
}