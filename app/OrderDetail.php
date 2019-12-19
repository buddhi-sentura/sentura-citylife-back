<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';
    protected $fillable =
        [
            'order_id',
            'item_code',
            'qty',
        ];

//    public function User(){
//        return $this->belongsTo('App/User');
//    }
//
//    public function product(){
//        return $this->belongsToMany('App\Item')->withPivot('item_code');
//    }
}
