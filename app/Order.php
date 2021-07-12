<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'TrangThai', 'TongTien', 'HinhThucThanhToan','GhiChu','Name','Address','Phone','Gender','Email'
    ];
   
    public function Item(){
        return $this->hasMany('App\Item','Order_id','id');
    }
    public function Customer(){
        return $this->belongsTo('App\Oder','Customer_id','id');
    }
}
