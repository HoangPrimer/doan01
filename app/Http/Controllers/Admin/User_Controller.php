<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Rate;
use App\User;
use App\Customer;
use App\Action_Admin;
use App\Oder;
class User_Controller extends Controller
{
    public function  list_comment(){

       
        $list_comment  =   Comment::with('User')->with('Product')->orderBy('id','desc')->paginate(20);
        return view('backend.User.list_comment',compact('list_comment'));
    }

    public function  del_comment($id){
        
        $del_comment  =   Comment::with('User')->with('Product')->find($id);
        $del_comment->delete();
        return redirect()->route('list_comment')->with('error','Đã Xóa Bình Luận');
    }

    public function  list_rate(){

        $list_rate  =   Rate::with('User')->with('Product')->orderBy('id','desc')->paginate(20);
        return view('backend.User.list_rate',compact('list_rate'));
    }


    public function  del_rate($id){
      
        $rate = Rate::with('User')->find($id);
        $del_rate  =   Rate::with('User')->with('Product')->find($id);
        $del_rate->delete();
        return redirect()->route('list_rate')->with('error','Đã Xóa Đánh Giá');
    }

    public function  list_user(){
       
        $list_user  =   User::with('Comment')->with('Rate')->where('level','0')->orderBy('id','desc')->paginate(20);
        return view('backend.User.list_user',compact('list_user'));
    }


    public function  del_user($id){
        if(Auth::user()->level === 2){
        $del_user  =   User::with('Comment')->with('Rate')->find($id);
        $del_user->delete();
        return redirect()->route('list_user')->with('error','Đã Xóa Người Dùng');
    }
        else{
            return redirect()->route('list_customer')->with('error','Bạn không có quyền');
        }
    }

    public function  list_customer(){

        $list_customer  =   Customer::with('Oder')->orderBy('id','desc')->paginate(20);
        return view('backend.User.list_customer',compact('list_customer'));
    }

    

    public function  del_customer($id){
        if(Auth::user()->level === 2){
            $customer = Customer::with('Oder')->find($id);
            $customer->delete();
            return redirect()->route('list_customer')->with('error','Đã Xóa Khách Hàng');
        }
        else{
            return redirect()->route('list_customer')->with('error','Bạn không có quyền');
        }
    }
}
