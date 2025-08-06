<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockInDetail extends Model
{
    use HasFactory;

    protected $table = 'stock_in_details';

    protected $fillable = [
        'stock_in_header_id',
        'product',
        'qty'
    ];

    public function header()
    {
        return $this->belongsTo(StockInHeader::class, 'stock_in_header_id');
    }
}
