<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use  App\Action_Admin;
use App\User;
use Illuminate\Support\Facades\Auth;
class Order_Controller extends Controller
{
    public function order_new(){
      
        $list_product  =  Order::where('od_status','Chờ Duyệt')->orwhere('od_status','Đã Duyệt')->orderBy('id','desc')->paginate(20);
        return view('backend.order.Oder_New',compact('list_product'));
    }

    public function order_onbyway(){

        $order_onbyway  =  Order::where('TrangThai','Đang Giao')->orderBy('id','desc')->paginate(20);
        return view('backend.Oder.Oder_Onbyway',compact('order_onbyway'));
    }

    public function order_done(){
     
        $order_done  =  Order::where('TrangThai','Đã Giao')->orderBy('id','desc')->paginate(20);
        return view('backend.Oder.Oder_Dilivered',compact('order_done'));
    }

    public function order_details( $id){

        $order_details  =  Order::with('Item')->find($id);
        return view('backend.Oder.Oder_Details',compact('order_details'));
    }

    public function onbyway($id){
        $onbyway = Order::find($id);
        $onbyway->TrangThai = 'Đang Giao';
        $onbyway->save();
        return  redirect()->route('order_new')->with('message','Cập Nhật Thành Công');
    }

    public function done($id){
        $done = Order::find($id);
        $done->TrangThai = 'Đã Giao';
        $done->save();
        $a = $done->Item()->get();
        foreach($a as $b){
             $masp  = $b->MaSP;
             $soluong = $b->SoLuong;
             $find = Product::where('MaSP',$masp)->get();
             foreach($find as $dd){
                $dd->SoLuong -= $soluong;
                $dd->SoLuongBan += $soluong;
                 $dd->save();
             }   
        } 
        return  redirect()->route('order_new')->with('message','Cập Nhật Thành Công');
    }

    public function accept($id){
        $accept = Order::find($id);
        $accept->TrangThai = 'Đã Duyệt';
        $accept->save();
        return  redirect()->route('order_new')->with('message','Cập Nhật Thành Công');
    }

    public function del_oder($id){
        $del_oder = Order::find($id);
        $del_oder->delete();
        return  redirect()->route('order_new')->with('error','Đã Xóa');
    }
}
