<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function listatk(){
        return view('dashboard.atk.listatk');
    }

    public function atkin(){
        return view('dashboard.atk.atkin');
    }

    public function atkout(){
        return view('dashboard.atk.atkout');
    }

    public function profile(){
        return view('dashboard.users.listusers');
    }
    
}
