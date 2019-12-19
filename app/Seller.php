<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $table = 'seller';
    protected $fillable =
    [
        'first_name',
        'last_name',
        'address',
        'nic',
        'mobile_number',
        'tell_number',
        'password',
        'confirmation_flag',
        'active_flag',
        'company_name',
        'current_date'
    ];
}
