<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku_code',
        'sku_name',
        'mrp',
        'distributor_price',
        'volume',
        'unit'
    ];
}
