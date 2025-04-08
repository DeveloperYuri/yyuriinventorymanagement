<?php

namespace App\Http\Controllers;

use App\Models\SparePartModel;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spareparts = SparePartModel::all();

        return view('dashboard.sparepart.listsparepart', compact('spareparts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.sparepart.createlistsparepart');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $image->storeAs('public/sparepart', $image->hashName());

        //create product
        SparePartModel::create([
            'image'         => $image->hashName(),
            'partnumber'   => $request->partnumber,
            'description'   => $request->description,
            'brand_id'   => $request->brand_id,
            'price'   => $request->price,
            'stock'   => $request->stock,
            'location'   => $request->location,
            'status'   => $request->status,
        ]);

        //redirect to index
        return redirect('/listsparepart')->with('success', 'Create New Users Successfully');
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
        //
    }
}
