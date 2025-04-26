<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    
    protected $table = 'products';


    public $incrementing = true;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'notes',
    ];
}
