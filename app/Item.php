<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'i_order_id','i_product_code','i_amount','i_price', 'i_total',    
    ];


    public function Oder(){
        return $this->belongsTo('App\Oder','i_order_id','id');
    }
  
}
