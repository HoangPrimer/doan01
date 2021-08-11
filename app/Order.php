<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Order extends Model
{

    use LogsActivity;
    protected static $logName = 'Đơn Hàng';

    protected $fillable = [
        'od_customer_id','od_status','od_name','od_phone','od_address','od_gender','od_email','od_total','od_payment','od_note','od_code'
    ];
   
    public function Item(){
        return $this->hasMany('App\Item','i_order_id','id');
    }
    public function Customer(){
        return $this->belongsTo('App\Oder','od_customer_id','id');
    }
}
