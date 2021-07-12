<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Support\Facades\DB;
use App\Image;
use App\Product;
use App\Oder;
use App\Action_Admin;
use App\User;
use Illuminate\Support\Facades\Auth;

class Product_Controller extends Controller
{
    use SoftDeletes;

    public function list_product(){
       
        $list  = Product::with('Image')->orderBy('id','desc')->paginate(8);
        return view('backend\product\list',compact('list'));
    }

    public function delete_product($id){
           $delete = Product::find($id);

           if( $delete->Flag_Delete === 0){
                $delete->Flag_Delete = '1';
                $delete->save();
                return redirect()->route('list_product')->with('error','Đã Ẩn Sản Phẩm Khỏi Trang Chủ');
           }
           else{
            $delete->Flag_Delete = '0';
            $delete->save();
            return redirect()->route('list_product')->with('message','Đã Hiện Sản Phẩm');
           }    
    }
    
    public function update_product($id)
    {
       
        $update  = Product::with('Image')->orderBy('id','desc')->find($id);
        return view('backend\product\update',compact('update'));
    }

    public function get_add_product(){
     
        return view('backend.product.add');
    }

    public function updates($id,Request $request){
                $data = $request->validate([
                    'masp' => 'bail|required|min:5|max:20',
                    'nhanhieu' => 'bail|required|min:2|max:20',
                    'nguongoc' => 'bail|required|min:2|max:20',
                    'chatlieuvo' => 'bail|required|min:5|max:50',
                    'chatlieukinh' => 'bail|required|min:5|max:50',
                    'chucnang' => 'bail|required|min:5|max:50',
                    'baohanh' => 'bail|required|min:4',
                    'mota' => 'bail|required|min:5',
                    'anh.*' => 'image',
                    'anh' => 'max:5',
                    ],
                    [
                        'masp.required'=>'Mã sản phẩm không được để trống',
                        'masp.min'=>'Mã sản phẩm tối thiểu 5 ký tự',
                        'masp.max'=>'Mã sản phẩm tối đa 20 ký tự',
                        'nhanhieu.required'=>'Nhãn hiệu không được để trống',
                        'nhanhieu.min'=>'Nhãn hiệu tối thiểu 2 ký tự',
                        'nhanhieu.max'=>'Nhãn hiệu tối đa 20 ký tự',
                        'nguongoc.required'=>'Nguồn gốc không được để trống',
                        'nguongoc.min'=>'Nguồn gốc tối thiểu 2 ký tự',
                        'nguongoc.max'=>'Nguồn gốc tối đa 20 ký tự',
                        'kieumay.required'=>'Kiểu máy không được để trống',
                        'chatlieuvo.required'=>'Chất liệu vỏ không được để trống',
                        'chatlieuvo.min'=>'Chất liệu vỏ tối thiểu 5 ký tự',
                        'chatlieuvo.max'=>'Chất liệu vỏ tối đa 50 ký tự',
                        'chatlieukinh.required'=>'Chất liệu kính không được để trống',
                        'chatlieukinh.min'=>'Chất liệu kính tối thiểu 5 ký tự',
                        'chatlieukinh.max'=>'Chất liệu kính tối đa 50 ký tự',
                        'chucnang.required'=>'Chức năng không được để trống',
                        'chucnang.min'=>'Chức năng tối thiểu 5 ký tự',
                        'baohanh.required'=>'Bảo hành không được để trống',
                        'baohanh.min'=>'Bảo hành tối thiểu 4 ký tự',
                        'anh.max'=>'Chọn tối đa 5 ảnh',
                        'anh.*.image'=>'Có Ảnh không đúng định dạng',
                        'mota.required'=>'Vui lòng nhập mô tả',
                        'mota.min'=>'Mô tả tối thiểu 5 ký tự',  
                    ]
                );
           
                $new =  Product::find($id);
                $new->MaSP = $request->masp;
                $new->ThuongHieu = $request->nhanhieu;
                $new->NguonGoc = $request->nguongoc;
                $new->KieuMay = $request->kieumay;
                $new->KichCo = $request->kichco;
                $new->DoDay = $request->doday;
                $new->ChatLieuVo = $request->chatlieuvo;
                $new->ChatLieuDay = $request->chatlieuday;
                $new->ChatLieuKinh = $request->chatlieukinh;
                $new->DoChiuNuoc = $request->dochiunuoc;
                $new->ChucNang = $request->chucnang;
                $new->BaoHanh = $request->baohanh;
                $new->GioiTinh = $request->gioitinh;
                $new->Hot = $request->hot;
                $new->GiaNhap = $request->gianhap;
                $new->GiaBan = $request->giaban;
                $new->GiaKM = $request->giakm;
                $new->SoLuong = $request->soluong;
                $new->MoTa = $request->mota;
                $new->save();
            if($request->hasFile('anh')){
                $image = Image::where('Product_id',$id)->get();
                 foreach($image as $img){
                   $img->delete();
                }
                foreach($request->file('anh') as $file){
                    $image = new Image;
                    if(isset($file)){
                    
                        $file_name = $file->getClientOriginalName();
                        $name_random = rand(1000000000000,9999999999999).'_'.$file_name;
                    
                        $file->move("./image/Image_Product",$name_random );
                        $image->Product_id = $id;
                        $image->Name = $file_name;
                        $image->File_path = "/image/Image_Product/$name_random";
                        $image->save();
                    }
                }      
            }
            return  redirect()->route('list_product')->with('message','Cập Nhật Sản Phẩm Thành Công');

    }

    public function post_product(Request $request){
        $data = $request->validate([
            'masp' => 'bail|required|unique:products,masp|min:5|max:20',
            'nhanhieu' => 'bail|required|min:5|max:20',
            'nguongoc' => 'bail|required|min:2|max:20',
            'chatlieuvo' => 'bail|required|min:5|max:50',
            'chatlieukinh' => 'bail|required|min:5|max:50',
            'chucnang' => 'bail|required|min:5|max:50',
            'baohanh' => 'bail|required|min:4',
            'mota' => 'bail|required|min:5',
            'anh.*' => 'image',
            'anh' => 'bail|required|max:5',
        ],
        [
                'masp.required'=>'Mã sản phẩm không được để trống',
                'masp.unique'=>'Mã sản phẩm đã tồn tại',
                'masp.min'=>'Mã sản phẩm tối thiểu 5 ký tự',
                'masp.max'=>'Mã sản phẩm tối đa 20 ký tự',
                'nhanhieu.required'=>'Nhãn hiệu không được để trống',
                'nhanhieu.min'=>'Nhãn hiệu tối thiểu 5 ký tự',
                'nhanhieu.max'=>'Nhãn hiệu tối đa 20 ký tự',
                'nguongoc.required'=>'Nguồn gốc không được để trống',
                'nguongoc.min'=>'Nguồn gốc tối thiểu 2 ký tự',
                'nguongoc.max'=>'Nguồn gốc tối đa 20 ký tự',
                'kieumay.required'=>'Kiểu máy không được để trống',
                'chatlieuvo.required'=>'Chất liệu vỏ không được để trống',
                'chatlieuvo.min'=>'Chất liệu vỏ tối thiểu 5 ký tự',
                'chatlieuvo.max'=>'Chất liệu vỏ tối đa 50 ký tự',
                'chatlieukinh.required'=>'Chất liệu kính không được để trống',
                'chatlieukinh.min'=>'Chất liệu kính tối thiểu 5 ký tự',
                'chatlieukinh.max'=>'Chất liệu kính tối đa 50 ký tự',
                'chucnang.required'=>'Chức năng không được để trống',
                'chucnang.min'=>'Chức năng tối thiểu 5 ký tự',
                'baohanh.required'=>'Bảo hành không được để trống',
                'baohanh.min'=>'Bảo hành tối thiểu 4 ký tự',
                'anh.required'=>'Ảnh không được để trống',
                'anh.max'=>'Chọn tối đa 5 ảnh',
                'anh.*.image'=>'Có Ảnh không đúng định dạng',
                'mota.required'=>'Vui lòng nhập mô tả',
                'mota.min'=>'Mô tả tối thiểu 5 ký tự',  
        ]
        );
            $new = new Product();
            $new->MaSP = $request->masp;
            $new->ThuongHieu = $request->nhanhieu;
            $new->NguonGoc = $request->nguongoc;
            $new->KieuMay = $request->kieumay;
            $new->KichCo = $request->kichco;
            $new->DoDay = $request->doday;
            $new->ChatLieuVo = $request->chatlieuvo;
            $new->ChatLieuDay = $request->chatlieuday;
            $new->ChatLieuKinh = $request->chatlieukinh;
            $new->DoChiuNuoc = $request->dochiunuoc;
            $new->ChucNang = $request->chucnang;
            $new->BaoHanh = $request->baohanh;
            $new->GioiTinh = $request->gioitinh;
            $new->Hot = $request->hot;
            $new->GiaNhap = $request->gianhap;
            $new->GiaBan = $request->giaban;
            $new->GiaKM = $request->giakm;
            $new->SoLuong = $request->soluong;
            $new->MoTa = $request->mota;
            $new->save();
            $id = $new ->id;
            if($request->hasFile('anh')){
                foreach($request->file('anh') as $file){
                    $image = new Image;
                    if(isset($file)){
                    
                        $file_name = $file->getClientOriginalName();
                        $name_random = rand(1000000000000,9999999999999).'_'.$file_name;
                    
                        $file->move("./image/Image_Product",$name_random );
                        $image->Product_id = $id;
                        $image->Name = $file_name;
                        $image->File_path = "/image/Image_Product/$name_random";
                        $image->save();
                    }
                }
            }
            return  redirect()->route('add_product')->with('message','Thêm Sản Phẩm Thành Công');
    }
}
