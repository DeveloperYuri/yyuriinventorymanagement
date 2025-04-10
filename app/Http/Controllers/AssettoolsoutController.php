<?php

namespace App\Http\Controllers;

use App\Models\AssettoolsoutModel;
use Illuminate\Http\Request;

class AssettoolsoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['getRecord'] = AssettoolsoutModel::getRecord($request);
        return view('dashboard.assettoolsout.listassettoolsout', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.assettoolsout.createassettoolsout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $assettoolsout = request()->validate([
            'name' =>'required',
            'stock' =>'required',
            'location' =>'required',
            'user_id' =>'required',
            'note' =>'required'
        ]);

        $assettoolsout = new AssettoolsoutModel();

        $assettoolsout->name = trim($request->name);
        $assettoolsout->brand = trim($request->brand);
        $assettoolsout->stock = trim($request->stock);
        $assettoolsout->location = trim($request->location);
        $assettoolsout->user_id = trim($request->user_id);
        $assettoolsout->note = trim($request->note);
        $assettoolsout->save();

        return redirect('/listassettoolsout')->with('success', 'Create New Asset Tools Out Successfully');
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
        $assettoolsout = AssettoolsoutModel::findOrFail($id);
        
        return view('dashboard.assettoolsout.editassettoolsout', compact('assettoolsout'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $assettoolsout = AssettoolsoutModel::findorFail($id);

        $assettoolsout->update([
            'name' => $request->name,
            'brand' => $request->brand,
            'stock' => $request->stock,
            'location' => $request->location,
            'user_id' => $request->user_id,
            'note' => $request->note
        ]);

        return redirect('/listassettoolsout')->with('success', 'Update Asset Tools Out Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assettoolsout = AssettoolsoutModel::findorFail($id);
        $assettoolsout->delete();

        return redirect('/listassettoolsout')->with('error', 'Delete Asset Tools In Successfully');
    }
}
