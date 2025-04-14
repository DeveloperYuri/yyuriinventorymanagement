<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListSparePartModel extends Model
{

    use HasFactory;

    protected $table = 'spare_parts';

    protected $fillable = ['name', 'stock', 'image', 'price'];
    
    public function transactions()
    {
        return $this->hasMany(StockTransactionModel::class);
    }
}
