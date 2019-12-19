<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $fillable =
    [
        'item_code',
        'item_name',
        'item_price',
        'item_qty',
        'item_description',
        'discount',
        'active_flag',
        'current_date'
    ];

}
