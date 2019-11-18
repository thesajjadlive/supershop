<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'customer_id',
        'order_number',
        'total_price',
        'date',
        'status',
        'payment_status',
        'payment_type'
    ];
}
