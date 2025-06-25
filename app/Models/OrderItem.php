<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'product_price',
        'product_image',
        'quantity',
        'total_price',
    ];

    // Define a relationship with the order model
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Define a relationship with the product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
