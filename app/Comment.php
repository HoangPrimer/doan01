<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'User_id','Product_id', 'Content',
    ];
    public function Product(){
        return $this->belongsTo('App\Product','Product_id','id');
    }
    public function User(){
        return $this->belongsTo('App\User','User_id','id');
    }
}
