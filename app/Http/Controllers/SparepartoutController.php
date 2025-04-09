<?php

namespace App\Http\Controllers;

use App\Models\SparepartoutModel;
use Illuminate\Http\Request;

class SparepartoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['getRecord'] = SparepartoutModel::getRecord($request);
        return view('dashboard.sparepartout.listsparepartout', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.sparepartout.createsparepartout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sparepartout = request()->validate([
            'name' =>'required',
            'stock' =>'required',
            'location' =>'required',
            'user' =>'required',
            'note' =>'required'
        ]);

        $sparepartout = new SparepartoutModel();

        $sparepartout->name = trim($request->name);
        $sparepartout->brand = trim($request->brand);
        $sparepartout->stock = trim($request->stock);
        $sparepartout->location = trim($request->location);
        $sparepartout->user = trim($request->user);
        $sparepartout->note = trim($request->note);
        $sparepartout->save();

        return redirect('/listsparepartout')->with('success', 'Create New Spare Part Out Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sparepartout = SparepartoutModel::findorFail($id);
        $sparepartout->delete();

        return redirect('/listsparepartout')->with('error', 'Delete Spare Part Out Successfully');
    }
}
