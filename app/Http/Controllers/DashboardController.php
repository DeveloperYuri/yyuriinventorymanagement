<?php

namespace App\Http\Controllers;

use App\Models\AssettoolsModel;
use App\Models\ListAssetToolsModel;
use App\Models\ListSparePartModel;
use App\Models\SparePartModel;
use App\Models\SupplierModel;
use App\Models\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(){
        $data['getSparepart'] = ListSparePartModel::count();
        $data['getAssettools'] = ListAssetToolsModel::count();
        $data['getSupplier'] = SupplierModel::count();

        return view('dashboard.index', $data);
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
