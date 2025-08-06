<?php

namespace App\Exports;

use App\Models\StockAssetTransactionModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AssetToolsInExport implements FromView
{
    protected $start_date;
    protected $end_date;

    public function __construct($start_date = null, $end_date = null)
    {
        $this->start_date = $start_date;
        $this->end_date   = $end_date;
    }

    public function view(): View
    {
        $query = StockAssetTransactionModel::where('type', 'in')->with('assetTools');

        if ($this->start_date) {
            $query->whereDate('created_at', '>=', $this->start_date);
        }
        if ($this->end_date) {
            $query->whereDate('created_at', '<=', $this->end_date);
        }

        $assetstockIns = $query->get();

        return view('assettoolsexcel.assettools_in', compact('assetstockIns'));
    }
}

