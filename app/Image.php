<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
       
    protected $fillable = [
        'img_product_id', 'img_name', 'img_file_path',
    ];
    public function Product(){
        return $this->belongsTo('App\Product','img_product_id','id');
    }
}
