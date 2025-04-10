<?php

namespace App\Http\Controllers;

use App\Models\AssettoolsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
        $assettools = AssettoolsModel::findOrFail($id);
        return view('dashboard.assettools.editassettools', compact('assettools'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //get product by ID
         $assettools = AssettoolsModel::findOrFail($id);

         //check if image is uploaded
         if ($request->hasFile('image')) {
 
             //upload new image
             $image = $request->file('image');
             $image->storeAs('assettools', $image->hashName(), 'public');
 
             //delete old image
             Storage::delete('public/assettools/' . $assettools->image);
 
             //update product with new image
             $assettools->update([
                 'image'         => $image->hashName(),
                 'name'   => $request->name,
                 'brand'   => $request->brand,
                 'price'   => $request->price,
                 'stock'   => $request->stock,
                 'location'   => $request->location,
                 'status'   => $request->status,
                 'note'   => $request->note,
             ]);
         } else {
 
             //update product without image
             $assettools->update([
                 'name'   => $request->name,
                 'brand'   => $request->brand,
                 'price'   => $request->price,
                 'stock'   => $request->stock,
                 'location'   => $request->location,
                 'status'   => $request->status,
                 'note'   => $request->note,

             ]);
         }
 
         //redirect to index
         return redirect('/listassettools')->with('success', 'Update Spare Part Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assettools = AssettoolsModel::findorFail($id);
        Storage::delete('public/sparepart/' . $assettools->image);

        $assettools->delete();

        return redirect('/listassettools')->with('error', 'Delete Supplier Successfully');
    }
}
