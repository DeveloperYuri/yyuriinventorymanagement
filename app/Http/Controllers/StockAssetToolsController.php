<?php

namespace App\Http\Controllers;

use App\Models\ListAssetToolsModel;
use App\Models\StockAssetToolsTransactionsModel;
use Illuminate\Http\Request;

class StockAssetToolsController extends Controller
{
    // public function assetInIndex()
    // {
    //     $assetTransactions = StockAssetToolsTransactionsModel::with('assetTools')->where('type', 'in')->orderByDesc('created_at', 'desc')->paginate(10);
    //     return view('dashboard.assettoolsin.listassettoolsin', compact('assetTransactions'));
    // }

    // public function assetInForm()
    // {
    //     // $assetTransactions = ListAssetToolsModel::all();
    //     $assetTools = ListAssetToolsModel::all();

    //     return view('dashboard.assettoolsin.createassettoolsin', compact('assetTools'));
    // }

    // public function storeAssetIn(Request $request)
    // {

    //     // dd($request->all());

    //     $request->validate([
    //         'asset_tool_id' => 'required|exists:asset_tools,id',
    //         'quantity' => 'required|integer|min:1'
    //     ]);

    //     StockAssetToolsTransactionsModel::create([
    //         'asset_tool_id' => $request->asset_tool_id,
    //         'type' => 'in',
    //         'quantity' => $request->quantity
    //     ]);

    //     return redirect()->route('asset-in.index')->with('success', 'Asset masuk berhasil dicatat.');
    // }

    public function stockInIndex()
    {
        $transactions = StockAssetToolsTransactionsModel::with('sparePart')->where('type', 'in')->orderByDesc('created_at', 'desc')->paginate(10);
        return view('dashboard.assettoolsin.listassettoolsin', compact('transactions'));
    }

    public function stockInForm()
    {
        $spareParts = ListAssetToolsModel::all();
        return view('dashboard.assettoolsin.createassettoolsin', compact('spareParts'));
    }

    public function storeStockIn(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'asset_tools_id' => 'required|exists:asset_tools,id',
            'quantity' => 'required|integer|min:1'
        ]);

        StockAssetToolsTransactionsModel::create([
            'asset_tools_id' => $request->asset_tools_id,
            'type' => 'in',
            'quantity' => $request->quantity
        ]);

        return redirect()->route('asset-in.index')->with('success', 'Stok masuk berhasil dicatat.');
    }
}
