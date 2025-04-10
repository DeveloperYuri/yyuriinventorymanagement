<?php

namespace App\Http\Controllers;

use App\Models\AssettoolsinModel;
use Illuminate\Http\Request;

class AssettoolsinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['getRecord'] = AssettoolsinModel::getRecord($request);
        return view('dashboard.assettoolsin.listassettoolsin', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.assettoolsin.createassettoolsin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $assettoolsin = request()->validate([
            'name' =>'required',
            'stock' =>'required',
            'location' =>'required',
            'user_id' =>'required',
            'note' =>'required'
        ]);

        $assettoolsin = new AssettoolsinModel();

        $assettoolsin->name = trim($request->name);
        $assettoolsin->brand = trim($request->brand);
        $assettoolsin->stock = trim($request->stock);
        $assettoolsin->location = trim($request->location);
        $assettoolsin->user_id = trim($request->user_id);
        $assettoolsin->note = trim($request->note);
        $assettoolsin->save();

        return redirect('/listassettoolsin')->with('success', 'Create New Asset Tools In Successfully');
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
        $assettoolsin = AssettoolsinModel::findOrFail($id);
        
        return view('dashboard.assettoolsin.editassettoolsin', compact('assettoolsin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $assettoolsin = AssettoolsinModel::findorFail($id);

        $assettoolsin->update([
            'name' => $request->name,
            'brand' => $request->brand,
            'stock' => $request->stock,
            'location' => $request->location,
            'user_id' => $request->user_id,
            'note' => $request->note
        ]);

        return redirect('/listassettoolsin')->with('success', 'Update Asset Tools In Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assettoolsin = AssettoolsinModel::findorFail($id);
        $assettoolsin->delete();

        return redirect('/listassettoolsin')->with('error', 'Delete Asset Tools In Successfully');
    }
}
