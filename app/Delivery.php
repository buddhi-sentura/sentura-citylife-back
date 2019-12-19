<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'delivery';
    protected $fillable = 
    [
        'customer_first_name',
        'customer_last_name',
        'dilivary_address',
        'contact_number',
        'home_town',
        'post_code'
    ];
}
