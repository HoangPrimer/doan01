<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'email', 'phone','address','gender',
    ];
    public function Oder(){
        return $this->hasMany('App\Oder','Customer_id','id');
    }
}
