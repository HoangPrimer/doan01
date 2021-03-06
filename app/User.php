<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use Notifiable;
    use LogsActivity;
    protected static $logName = 'Danh Mục';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','image','email','password','level','phone','address','gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Comment(){
        return $this->hasMany('App\Comment','cm_user_id','id');
    }

    public function Rate(){
        return $this->hasMany('App\Rate','r_user_id','id');
    }

    public function Product(){
        return $this->hasMany('App\Product','pro_user_id','id');
    }
    
}
