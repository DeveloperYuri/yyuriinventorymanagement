<?php

namespace App\Http\Controllers;

use App\Models\SparepartinModel;
use Illuminate\Http\Request;

class SparepartinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['getRecord'] = SparepartinModel::getRecord($request);
        return view('dashboard.sparepartin.listsparepartin', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.sparepartin.createsparepartin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sparepartin = request()->validate([
            'name' =>'required',
            'stock' =>'required',
            'location' =>'required',
            'user' =>'required',
            'note' =>'required'
        ]);

        $sparepartin = new SparepartinModel();

        $sparepartin->name = trim($request->name);
        $sparepartin->brand = trim($request->brand);
        $sparepartin->stock = trim($request->stock);
        $sparepartin->location = trim($request->location);
        $sparepartin->user = trim($request->user);
        $sparepartin->note = trim($request->note);
        $sparepartin->save();

        return redirect('/listsparepartin')->with('success', 'Create New Spare Part In Successfully');
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
        $sparepartin = SparepartinModel::findOrFail($id);
        
        return view('dashboard.sparepartin.editsparepartin', compact('sparepartin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sparepartin = SparepartinModel::findorFail($id);

        $sparepartin->update([
            'name' => $request->name,
            'brand' => $request->brand,
            'stock' => $request->stock,
            'location' => $request->location,
            'user' => $request->user,
            'note' => $request->note
        ]);

        return redirect('/listsparepartin')->with('success', 'Update Spare Part In Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sparepartin = SparepartinModel::findorFail($id);
        $sparepartin->delete();

        return redirect('/listsparepartin')->with('error', 'Delete Spare Part In Successfully');
    }
}
