<?php

namespace App\Http\Controllers;

use App\Models\ListAssetToolsModel;
use App\Models\StockAssetTransactionModel;
use Illuminate\Http\Request;

class StockAssetController extends Controller
{
    public function stockInIndex()
    {
        $transactions = StockAssetTransactionModel::with('assetTools')->where('type', 'in')->orderByDesc('created_at', 'desc')->paginate(10);
        return view('dashboard.assettoolsin.listassettoolsin', compact('transactions'));
    }

    public function stockInForm()
    {
        $spareParts = ListAssetToolsModel::all();

        return view('dashboard.assettoolsin.createassettoolsin', compact('spareParts'));
    }

    public function storeStockIn(Request $request)
    {
        $request->validate([
            'asset_tools_id' => 'required|exists:asset_tools,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // dd($request->all());

        StockAssetTransactionModel::create([
            'asset_tools_id' => $request->asset_tools_id,
            'type' => 'in',
            'quantity' => $request->quantity
        ]);

        return redirect()->route('asset-in.index')->with('success', 'Stok masuk berhasil dicatat.');
    }

    public function stockOutIndex()
    {
        $transactions = StockAssetTransactionModel::with('assetTools')->where('type', 'out')->orderByDesc('created_at', 'desc')->paginate(10);
        return view('dashboard.assettoolsout.listassettoolsout', compact('transactions'));
    }

    public function stockOutForm()
    {
        $spareParts = ListAssetToolsModel::all();
        return view('dashboard.assettoolsout.createassettoolsout', compact('spareParts'));
    }

    public function storeStockOut(Request $request)
    {
        $request->validate([
            'asset_tools_id' => 'required|exists:asset_tools,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $sparePart = ListAssetToolsModel::find($request->asset_tools_id);

        if ($request->quantity > $sparePart->stock) {
            return back()->withErrors('Jumlah keluar melebihi stok yang tersedia.');
        }

        StockAssetTransactionModel::create([
            'asset_tools_id' => $request->asset_tools_id,
            'type' => 'out',
            'quantity' => $request->quantity
        ]);

        return redirect()->route('asset-out.index')->with('success', 'Stok keluar berhasil dicatat.');
    }

}
