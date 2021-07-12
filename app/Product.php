<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Product extends Model
{
    use LogsActivity;
    protected $fillable = [
       'MaSP', 'ThuongHieu', 'NguonGoc','KieuMay','KichCo', 'DoDay', 'ChatLieuVo',
       'ChatLieuDay','ChatLieuKinh', 'DoChiuNuoc', 'ChucNang','BaoHanh',
       'GioiTinh', 'Hot', 'Gia','GiaKM','MoTa','Flag_Delete',
   ];
   protected static $logAttributes = ['MaSP', 'ThuongHieu', 'NguonGoc','KieuMay','KichCo', 'DoDay', 'ChatLieuVo',
   'ChatLieuDay','ChatLieuKinh', 'DoChiuNuoc', 'ChucNang','BaoHanh','GiaNhap','Flag_delete','TongDanhGia','TongSao',
   'GioiTinh', 'Hot', 'GiaBan','GiaKM','MoTa'];

   protected static $logName = 'custom';


   public function Comment(){
       return $this->hasMany('App\Comment','Product_id','id');
   }

   public function Image(){
       return $this->hasMany('App\Image','Product_id','id');
   }
   public function Rate(){
       return $this->hasMany('App\Rate','Product_id','id');
   }
}
