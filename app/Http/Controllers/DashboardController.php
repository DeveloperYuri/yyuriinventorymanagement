<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function sparepart(){
        return view('dashboard.sparepart.listsparepart');
    }

    public function sparepartin(){
        return view('dashboard.sparepart.sparepartin');
    }

    public function sparepartout(){
        return view('dashboard.sparepart.sparepartout');
    }

    public function listassettools(){
        return view('dashboard.assettools.listassettools');
    }

    public function assettoolsin(){
        return view('dashboard.assettools.assettoolsin');
    }

    public function assettoolsout(){
        return view('dashboard.assettools.assettoolsout');
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

    public function listsupplier(){
        return view('dashboard.supplier.listsupplier');
    }

    public function listusers(){
        return view('dashboard.users.listusers');
    }
    
}
