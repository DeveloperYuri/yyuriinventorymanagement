<?php

namespace App\Http\Controllers;

use App\Models\ListSparePartModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ListSparePartController extends Controller
{
    public function index()
    {
        $spareParts = ListSparePartModel::paginate(10); // tampilkan 10 per halaman
        return view('dashboard.sparepart.listsparepart', compact('spareParts'));
    }

    public function create()
    {
        return view('dashboard.sparepart.createlistsparepart');
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

        ListSparePartModel::create($data);

        return redirect()->route('spare-parts.index')->with('success', 'Spare part berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $sparePart = ListSparePartModel::findOrFail($id);
        return view('dashboard.sparepart.editsparepart', compact('sparePart'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $sparePart = ListSparePartModel::findOrFail($id);
        $sparePart->name = $request->name;
        $sparePart->price = $request->price;

        if ($request->hasFile('image')) {
            if ($sparePart->image && file_exists(public_path('images/' . $sparePart->image))) {
                unlink(public_path('images/' . $sparePart->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $sparePart->image = $imageName;
        }

        $sparePart->save();

        return redirect()->route('spare-parts.index')->with('success', 'Spare part berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $sparePart = ListSparePartModel::findOrFail($id);

        // Hapus gambar jika ada
        if ($sparePart->image && file_exists(public_path('images/' . $sparePart->image))) {
            unlink(public_path('images/' . $sparePart->image));
        }

        $sparePart->delete();

        return redirect()->route('spare-parts.index')->with('success', 'Spare part berhasil dihapus.');
    }

    public function cetakPDF()
    {
        $spareparts = ListSparePartModel::all();
        $pdf = Pdf::loadView('sparepartpdf.sparepart', compact('spareparts'));
        return $pdf->download('laporan_sparepart.pdf');
    }
}
