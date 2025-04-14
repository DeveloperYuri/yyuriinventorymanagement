<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAssetTransactionModel extends Model
{

    use HasFactory;

    protected $table = 'stock_asset_transactions';

    protected $fillable = ['asset_tools_id', 'type', 'quantity'];

    public function assetTools()
    {
        return $this->belongsTo(ListAssetToolsModel::class, 'asset_tools_id'); // Relasi ke ListAssetToolsModel
    }

    protected static function booted()
    {
        static::created(function ($transaction) {
            // Ubah dari $transaction->sparePart menjadi $transaction->assetTools
            $assetTools = $transaction->assetTools; // Ambil relasi assetTools
            if ($transaction->type == 'in') {
                $assetTools->increment('stock', $transaction->quantity); // Menambah stok
            } else {
                $assetTools->decrement('stock', $transaction->quantity); // Mengurangi stok
            }
        });
    }

    // use HasFactory;

    // protected $table = 'stock_asset_transactions';

    // protected $fillable = ['asset_tools_id', 'type', 'quantity'];

    // public function sparePart()
    // {
    //     return $this->belongsTo(ListAssetToolsModel::class);
    // }

    // protected static function booted()
    // {
    //     static::created(function ($transaction) {
    //         $sparePart = $transaction->sparePart;
    //         if ($transaction->type == 'in') {
    //             $sparePart->increment('stock', $transaction->quantity);
    //         } else {
    //             $sparePart->decrement('stock', $transaction->quantity);
    //         }
    //     });
    // }
}
