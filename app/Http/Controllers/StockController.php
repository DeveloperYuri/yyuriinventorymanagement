<?php

namespace App\Http\Controllers;

use App\Models\ListSparePartModel;
use App\Models\StockTransactionModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class StockController extends Controller
{
    public function stockInIndex()
    {
        $transactions = StockTransactionModel::with('sparePart')->where('type', 'in')->orderByDesc('created_at', 'desc')->paginate(10);
        return view('dashboard.sparepartin.listsparepartin', compact('transactions'));
    }

    public function stockInForm()
    {
        $spareParts = ListSparePartModel::all();
        return view('dashboard.sparepartin.createsparepartin', compact('spareParts'));
    }

    public function storeStockIn(Request $request)
    {
        $request->validate([
            'spare_part_id' => 'required|exists:spare_parts,id',
            'quantity' => 'required|integer|min:1'
        ]);

        StockTransactionModel::create([
            'spare_part_id' => $request->spare_part_id,
            'type' => 'in',
            'quantity' => $request->quantity
        ]);

        return redirect()->route('stock-in.index')->with('success', 'Stok masuk berhasil dicatat.');
    }

    public function stockOutIndex()
    {
        $transactions = StockTransactionModel::with('sparePart')->where('type', 'out')->orderByDesc('created_at', 'desc')->paginate(10);
        return view('dashboard.sparepartout.listsparepartout', compact('transactions'));
    }

    public function stockOutForm()
    {
        $spareParts = ListSparePartModel::all();
        return view('dashboard.sparepartout.createsparepartout', compact('spareParts'));
    }

    public function storeStockOut(Request $request)
    {
        $request->validate([
            'spare_part_id' => 'required|exists:spare_parts,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $sparePart = ListSparePartModel::find($request->spare_part_id);

        if ($request->quantity > $sparePart->stock) {
            return back()->withErrors('Jumlah keluar melebihi stok yang tersedia.');
        }

        StockTransactionModel::create([
            'spare_part_id' => $request->spare_part_id,
            'type' => 'out',
            'quantity' => $request->quantity
        ]);

        return redirect()->route('stock-out.index')->with('success', 'Stok keluar berhasil dicatat.');
    }

    public function exportStockInPDF()
    {
        $stockIns = StockTransactionModel::where('type', 'in')->with('sparePart')->get();
        $pdf = Pdf::loadView('sparepartpdf.stock_in', compact('stockIns'));
        return $pdf->download('laporan_stok_masuk.pdf');
    }

    public function exportStockOutPDF()
    {
        $stockOuts = StockTransactionModel::where('type', 'out')->with('sparePart')->get();
        $pdf = Pdf::loadView('sparepartpdf.stock_out', compact('stockOuts'));
        return $pdf->download('laporan_stok_keluar.pdf');
    }
}
