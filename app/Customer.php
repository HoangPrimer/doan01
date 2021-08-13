<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'ct_name', 'ct_email', 'ct_phone','ct_address','ct_gender',
    ];
    public function Order(){
        return $this->hasMany('App\Order','od_customer_id','id');
    }
}
