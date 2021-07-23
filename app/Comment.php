<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'cm_user_id','cm_product_id','cm_content',
    ];
    public function Product(){
        return $this->belongsTo('App\Product','cm_product_id','id');
    }
    public function User(){
        return $this->belongsTo('App\User','cm_user_id','id');
    }
}
