<?php

namespace App\Http\Controllers;

use App\Models\AssettoolsModel;
use Illuminate\Http\Request;

class AssettoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assettools = AssettoolsModel::all();

        return view('dashboard.assettools.listassettools', compact('assettools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.assettools.createassettools');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $image->storeAs('assettools', $image->hashName(), 'public');
        
        //create product
        AssettoolsModel::create([
            'image'         => $image->hashName(),
            'name'   => $request->name,
            'brand'   => $request->brand,
            'price'   => $request->price,
            'stock'   => $request->stock,
            'location'   => $request->location,
            'status'   => $request->status,
            'note'   => $request->note,
        ]);

        //redirect to index
        return redirect('/listassettools')->with('success', 'Create New Asset Tools Successfully');
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
        $brand = AssettoolsModel::findorFail($id);
        $brand->delete();

        return redirect('/listassettools')->with('error', 'Delete Supplier Successfully');
    }
}
