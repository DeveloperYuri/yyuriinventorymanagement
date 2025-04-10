<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login.index');
    }

    public function login_post(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if (Auth::user()->is_role == 2) {
                // echo "User";
                return redirect()->intended('dashboardsuperadmin');
            } else if (Auth::user()->is_role == 1) {
                // echo "Admin";
                return redirect()->intended('dashboardadmin');
            } 
            else if (Auth::user()->is_role == 0) {
                // echo "Super Admin";
                return redirect()->intended('dashboardusers');
            } 
            else {
                return redirect('login')->with('error', 'No Available Email.. Please Check');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter the correct credentials');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }

    public function loginuser(){
        return view('user');
    }
    public function loginsuperadmin(){
        return view('superadmin');
    }
    public function loginadmin(){
        return view('admin');
    }


}
