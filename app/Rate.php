<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{

    protected $fillable = [
        'r_user_id','r_product_id', 'r_star', 'r_content',
    ];
    public function Product(){
        return $this->belongsTo('App\Product','r_product_id','id');
    }
    public function User(){
        return $this->belongsTo('App\User','r_user_id','id');
    }
}
