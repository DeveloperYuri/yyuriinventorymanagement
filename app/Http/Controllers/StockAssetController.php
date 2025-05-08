<?php

namespace App\Http\Controllers;

use App\Exports\AssetToolsHistoryInOutExport;
use App\Exports\AssetToolsHistoryPerItemExport;
use App\Models\ListAssetToolsModel;
use App\Models\StockAssetTransactionModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Carbon;

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
            'quantity' => 'required|integer|min:1',
            'user' => 'required|string|max:255'
        ]);

        // dd($request->all());

        StockAssetTransactionModel::create([
            'asset_tools_id' => $request->asset_tools_id,
            'type' => 'in',
            'quantity' => $request->quantity,
            'user' => $request->user
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
            'quantity' => 'required|integer|min:1',
            'user' => 'required|string|max:255'
        ]);

        $sparePart = ListAssetToolsModel::find($request->asset_tools_id);

        if ($request->quantity > $sparePart->stock) {
            return back()->withErrors('Jumlah keluar melebihi stok yang tersedia.');
        }

        StockAssetTransactionModel::create([
            'asset_tools_id' => $request->asset_tools_id,
            'type' => 'out',
            'quantity' => $request->quantity,
            'user' => $request->user
        ]);

        return redirect()->route('asset-out.index')->with('success', 'Stok keluar berhasil dicatat.');
    }

    public function exportStockInPDF()
    {
        $stockIns = StockAssetTransactionModel::where('type', 'in')->with('assetTools')->get();
        $pdf = Pdf::loadView('assettoolspdf.stock_in', compact('stockIns'));
        return $pdf->download('laporan_asset_masuk.pdf');
    }

    public function exportStockOutPDF()
    {
        $stockOuts = StockAssetTransactionModel::where('type', 'out')->with('assetTools')->get();
        $pdf = Pdf::loadView('assettoolspdf.stock_out', compact('stockOuts'));
        return $pdf->download('laporan_asset_keluar.pdf');
    }

    public function history(Request $request)
    {
        $query = StockAssetTransactionModel::with('assetTools')->orderByDesc('created_at');

        if ($request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $transactions = $query->paginate(20);

        return view('dashboard.assettoolshistory.history', compact('transactions'));
    }

    public function exportHistoryPDF(Request $request)
    {
        $query = StockAssetTransactionModel::with('assetTools')->orderByDesc('created_at');

        if ($request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $transactions = $query->get();

        $pdf = Pdf::loadView('assettoolspdf.stock_history', compact('transactions'))->setPaper('A4', 'portrait');
        return $pdf->download('laporan_riwayat_assettools.pdf');
    }

    public function viewHistoryPerItem(Request $request, $id)
    {
        $assetTools = ListAssetToolsModel::findOrFail($id);

        $query = StockAssetTransactionModel::where('asset_tools_id', $id);

        if ($request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // Perhitungan total dari semua data (tidak terpengaruh pagination)
        $allTransactions = $query->get();
        $totalStock = $allTransactions->reduce(function ($carry, $item) {
            return $carry + ($item->type === 'in' ? $item->quantity : -$item->quantity);
        }, 0);

        // Pagination
        $transactions = $query->orderByDesc('created_at')->paginate(20);

        return view('dashboard.assettools.detailassettools', compact('assetTools', 'transactions', 'totalStock'));
    }

    public function exportHistoryPerItemPDF($id, Request $request)
    {
        $assetTools = ListAssetToolsModel::findOrFail($id);

        $query = StockAssetTransactionModel::where('asset_tools_id', $id)->orderByDesc('created_at');

        if ($request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // Ambil semua transaksi tanpa pagination untuk PDF
        $transactions = $query->get();

        // Perhitungan total stok (tidak terpengaruh pagination)
        $totalStock = $transactions->reduce(function ($carry, $item) {
            return $carry + ($item->type === 'in' ? $item->quantity : -$item->quantity);
        }, 0);

        $startDate = $request->start_date ? \Carbon\Carbon::parse($request->start_date)->format('d F Y') : null;
        $endDate = $request->end_date ? \Carbon\Carbon::parse($request->end_date)->format('d F Y') : null;

        // Buat PDF dengan data transaksi dan total stok
        $pdf = Pdf::loadView('assettoolspdf.detailassettools', compact('assetTools', 'transactions', 'startDate', 'endDate'))
        ->setPaper('A4', 'portrait');

        return $pdf->download('riwayat_detail_assettools' . $assetTools->name . '.pdf');
    }

    public function exportHistoryPerItemExcel($id, Request $request)
    {
        $assetTools = ListAssetToolsModel::findOrFail($id);
        $query = StockAssetTransactionModel::where('asset_tools_id', $id)->orderByDesc('created_at');

        if ($request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $transactions = $query->get();

        $startDate = $request->start_date ? Carbon::parse($request->start_date)->format('d F Y') : null;
        $endDate = $request->end_date ? Carbon::parse($request->end_date)->format('d F Y') : null;

        return Excel::download(
            new AssetToolsHistoryPerItemExport($assetTools, $transactions, $startDate, $endDate),
            'riwayat_assettools_peritem' . $assetTools->name . '.xlsx'
        );
    }

    public function exportHistoryExcel(Request $request)
    {
        return Excel::download(
            new AssetToolsHistoryInOutExport($request->start_date, $request->end_date),
            'laporan_riwayat_assettoolsinout.xlsx'
        );
    }
}
