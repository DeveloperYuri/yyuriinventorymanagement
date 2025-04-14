<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAssetToolsTransactionsModel extends Model
{
    use HasFactory;

    protected $table = 'asset_tools_transactions';

    protected $fillable = ['asset_tools_id', 'type', 'quantity'];

    public function sparePart()
    {
        return $this->belongsTo(ListAssetToolsModel::class);
    }

    protected static function booted()
    {
        static::created(function ($transaction) {
            $sparePart = $transaction->sparePart;
            if ($transaction->type == 'in') {
                $sparePart->increment('stock', $transaction->quantity);
            } else {
                $sparePart->decrement('stock', $transaction->quantity);
            }
        });
    }
}
