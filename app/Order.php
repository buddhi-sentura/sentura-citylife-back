<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable =
    [
        'total_price',
        'order_discount',
        'order_date',
        'order_customer_confermation_flag',
        'order_complete_flag'
    ];
}
