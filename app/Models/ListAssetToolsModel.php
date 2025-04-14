<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListAssetToolsModel extends Model
{
    use HasFactory;

    protected $table = 'asset_tools';

    protected $fillable = ['name', 'stock', 'image', 'price'];
    
    public function transactions()
    {
        return $this->hasMany(StockAssetToolsTransactionsModel::class);
    }
}
