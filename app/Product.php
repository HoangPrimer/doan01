<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    use LogsActivity;
    protected $fillable = [
        'pro_code', 'pro_slug', 'pro_category_id', 'pro_trademark_id', 'pro_user_id',
        'pro_source', 'pro_machine_type', 'pro_size', 'pro_thickness', 
        'pro_shell_material', 'pro_rope_material',
        'pro_glass_material', 'pro_waterproof', 'pro_function', 'pro_guarantee', 'pro_gender',
        'pro_hot', 'pro_price_entry', 'pro_price', 'pro_sale', 'pro_amount', 'pro_amount_sell',
        'pro_desc', 'pro_status',
    ];
    protected static $logAttributes  =[
        'pro_code', 'pro_slug', 'pro_category_id', 'pro_trademark_id', 'pro_user_id',
        'pro_source', 'pro_machine_type', 'pro_size', 'pro_thickness', 'pro_shell_material', 'pro_rope_material',
        'pro_glass_material', 'pro_waterproof', 'pro_function', 'pro_guarantee', 'pro_gender',
        'pro_hot', 'pro_price_entry', 'pro_price', 'pro_sale', 'pro_amount', 'pro_amount_sell','pro_manufacturing',
        'pro_desc', 'pro_status',
    ];
    protected static $logName = 'San pham';

    public function Comment()
    {
        return $this->hasMany('App\Comment', 'cm_product_id', 'id');
    }

    public function Image()
    {
        return $this->hasMany('App\Image', 'img_product_id', 'id');
    }
    public function Rate()
    {
        return $this->hasMany('App\Rate', 'r_product_id', 'id');
    }


    public function User()
    {
        return $this->belongsTo('App\User', 'pro_user_id', 'id');
    }

    public function Category()
    {
        return $this->belongsTo('App\Category', 'pro_category_id', 'id');
    }

    public function Trademark()
    {
        return $this->belongsTo('App\Trademark', 'pro_trademark_id', 'id');
    }
}
