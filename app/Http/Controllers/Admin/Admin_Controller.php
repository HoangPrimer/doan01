<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Action_Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Admin_Controller extends Controller
{
    public function  list_admin(){
        $id = Auth::id();
        $user = User::find($id);
        $list_admin  =   User::with('Comment')->with('Rate')->where('level','1')->orwhere('level','2')->orderBy('id','desc')->paginate(20);
        $neww = Order::where('TrangThai','Chờ Duyệt')->get();
        return view('backend.Admin.list',compact('list_admin','neww','user'));
    }

    public function  del_admin($id){
        if(Auth::user()->level === 2 ){
        $del_admin  =   User::with('Comment')->with('Rate')->find($id);
        $del_admin->delete();
        return redirect()->route('list_admin')->with('error','Đã Xóa Admin');
        }
        else{
            return redirect()->route('list_admin')->with('error','Bạn Không Có Quyền');
        }
    }

    public function  list_history(){
      
      
    }

    ////////////////////////////////////////////////////////////////////


   

}
