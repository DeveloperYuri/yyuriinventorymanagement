<?php

namespace App\Http\Controllers;

use App\Models\SparePartModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $image->storeAs('sparepart', $image->hashName(), 'public');

        // $image = $request->file('image');
        // $image->storeAs('public/sparepart', $image->hashName());

        //create product
        SparePartModel::create([
            'image'         => $image->hashName(),
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
        $sparepart = SparePartModel::findOrFail($id);
        return view('dashboard.sparepart.editsparepart', compact('sparepart'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //get product by ID
        $sparepart = SparePartModel::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('sparepart', $image->hashName(), 'public');

            //delete old image
            Storage::delete('public/sparepart/' . $sparepart->image);

            //update product with new image
            $sparepart->update([
                'image'         => $image->hashName(),
                'description'   => $request->description,
                'brand_id'   => $request->brand_id,
                'price'   => $request->price,
                'stock'   => $request->stock,
                'location'   => $request->location,
                'status'   => $request->status,
            ]);
        } else {

            //update product without image
            $sparepart->update([
                'description'   => $request->description,
                'brand_id'   => $request->brand_id,
                'price'   => $request->price,
                'stock'   => $request->stock,
                'location'   => $request->location,
                'status'   => $request->status,
            ]);
        }

        //redirect to index
        return redirect('/listsparepart')->with('success', 'Update Spare Part Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sparepart = SparePartModel::findOrFail($id);

        // dd($sparepart);

        // dd($sparepart->image);
        // dd(Storage::files('public/sparepart'));

        // dd([
        //     'file_in_storage' => Storage::files('public/sparepart'),
        //     'file_in_db' => $sparepart->image,
        // ]);


        //delete image
        Storage::delete('public/sparepart/' . $sparepart->image);


        //delete product
        $sparepart->delete();

        return redirect('/listsparepart')->with('error', 'Delete Spare Part In Successfully');
    }
}
