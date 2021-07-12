<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
       
    protected $fillable = [
        'Product_id', 'Name', 'File_Path',
    ];
    public function Product(){
        return $this->belongsTo('App\Product','Product_id','id');
    }
}
