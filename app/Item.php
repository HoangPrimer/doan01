<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'Oder_id','SoLuong', 'TongTien', 'Gia',
    ];
    public function Oder(){
        return $this->belongsTo('App\Oder','Oder_id','id');
    }
  
}
