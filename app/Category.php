<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use LogsActivity;
    protected static $logName = 'Danh Mục';

    protected $fillable = [
        'c_name', 'c_desc', 'c_status', 'c_slug'
    ];

    public function Product(){
        return $this->hasMany('App\Product','pro_category_id','id');
    }

}
