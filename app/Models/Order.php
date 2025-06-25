<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'address',
        'address2',
        'country',
        'city',
        'zip',
    ];

    // Define a relationship with order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
