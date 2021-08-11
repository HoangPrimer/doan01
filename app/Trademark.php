<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Trademark extends Model
{
    use LogsActivity;
    protected static $logName = 'Thương Hiệu';

    protected $fillable = [
        'tr_name', 'tr_slug', 'tr_logo', 'tr_desc'
    ];

    public function Product(){
        return $this->hasMany('App\Product','pro_trademark_id','id');
    }
}
