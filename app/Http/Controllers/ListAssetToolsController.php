<?php

namespace App\Http\Controllers;

use App\Models\ListAssetToolsModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ListAssetToolsController extends Controller
{
    public function index()
    {
        $assetTools = ListAssetToolsModel::paginate(10); // tampilkan 10 per halaman
        return view('dashboard.assettools.listassettools', compact('assetTools'));
    }

    public function cardindex()
    {
        $assetTools = ListAssetToolsModel::paginate(9); // tampilkan 10 per halaman
        return view('dashboard.assettools.cardlistassettools', compact('assetTools'));
    }

    public function create()
    {
        return view('dashboard.assettools.createassettools');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only('name', 'price');

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        ListAssetToolsModel::create($data);

        return redirect()->route('asset-tools.index')->with('success', 'Asset Tools berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $assetTools = ListAssetToolsModel::findOrFail($id);
        return view('dashboard.assettools.editassettools', compact('assetTools'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $assetTools = ListAssetToolsModel::findOrFail($id);
        $assetTools->name = $request->name;
        $assetTools->price = $request->price;

        if ($request->hasFile('image')) {
            if ($assetTools->image && file_exists(public_path('images/' . $assetTools->image))) {
                unlink(public_path('images/' . $assetTools->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $assetTools->image = $imageName;
        }

        $assetTools->save();

        return redirect()->route('asset-tools.index')->with('success', 'Asset Tools berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $assetTools = ListAssetToolsModel::findOrFail($id);

        // Hapus gambar jika ada
        if ($assetTools->image && file_exists(public_path('images/' . $assetTools->image))) {
            unlink(public_path('images/' . $assetTools->image));
        }

        $assetTools->delete();

        return redirect()->route('asset-tools.index')->with('success', 'Asset Tools berhasil dihapus.');
    }

    public function cetakPDF()
    {
        $assettools = ListAssetToolsModel::all();
        $pdf = Pdf::loadView('assettoolspdf.assettools', compact('assettools'));
        return $pdf->download('laporan_assettools.pdf');
    }

}
