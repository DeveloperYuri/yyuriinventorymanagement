<?php

namespace App\Exports;

use App\Models\StockTransactionModel;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class StockSparePartInExport implements FromView
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
        $query = StockTransactionModel::where('type', 'in')->with('sparePart');

        if ($this->start_date) {
            $query->whereDate('created_at', '>=', $this->start_date);
        }

        if ($this->end_date) {
            $query->whereDate('created_at', '<=', $this->end_date);
        }

        $stockIns = $query->get();

        return view('sparepartexcel.sparepart_in', compact('stockIns'));
    }
}

