<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'zone',
        'region',
        'territory',
        'distributor',
        'sku_code',
        'sku_name',
        'unit_price',
        'quantity',
        'total_price'
    ];
}
