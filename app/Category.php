<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    // use LogsActivity;
    protected $fillable = [
        'c_name', 'c_desc', 'c_status', 'c_slug'
    ];

    // protected static $logAttributes =[
    //     'c_name', 'c_desc', 'c_status', 'c_slug'
    // ];

    public function Product(){
        return $this->hasMany('App\Product','category_id','id');
    }

}
