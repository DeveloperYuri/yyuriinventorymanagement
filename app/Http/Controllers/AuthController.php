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
                return redirect()->intended('dashboard');
            } else if (Auth::user()->is_role == 1) {
                // echo "Admin";
                return redirect()->intended('dashboard');
            } 
            else if (Auth::user()->is_role == 0) {
                // echo "Super Admin";
                return redirect()->intended('dashboard');
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
}
