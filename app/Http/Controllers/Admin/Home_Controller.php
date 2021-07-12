<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\User;
use App\Action_Admin;
use Illuminate\Support\Facades\Validator;

class Home_Controller extends Controller
{
    public function home()
    {
        $id = Auth::id();
        $user = User::find($id);
        $neww = Order::where('TrangThai','Chờ Duyệt')->get();

        $hot = Order::with('Item')->where('TrangThai','Đã Giao')->get();
        $top_product = Product::orderBy('SoLuongBan','desc')->paginate(5);
     
        return view('backend\home',compact('neww','user','top_product'));
    }
    public function change_profile(Request $request){
        if(request()->ajax()){
            $data = Validator::make($request->all(),
                [
                    'name'=>'bail|required|min:3',
                    'phone'=>'bail|required|numeric|digits:10',
                    'gender'=>'bail|required',
                    'address'=>'bail|required|min:10',
                  
                ],
                [
                    'name.required' => 'Vui lòng nhập tên!',
                    'name.min' => 'Tên không được nhỏ hơn 3 ký tự',
                    'phone.required' => 'Vui lòng nhập số điện thoại!',
                    'phone.numeric' => 'Chỉ nhập được số',
                    'phone.digits' => 'Vui lòng nhập số điện thoại đủ 10 số!',
                    'gender.required' => 'Vui lòng chọn giới tính!',
                    'address.required' => 'Vui lòng nhập địa chỉ!',
                    'address.min' => 'Địa chỉ không nhỏ hơn 10 ký tự!',                 
                ],
            );
            if($data ->fails()){
                return response()->json([
                    'code'=>200,
                    'name'=>$data->errors()->get('name'),
                    'phone'=>$data->errors()->get('phone'),
                    'gender'=>$data->errors()->get('gender'),
                    'address'=>$data->errors()->get('address'),
                ],200);
            }
            else{

                $user =  User::find($request->id);
               
                $user->name=$request->name;
                $user->phone=$request->phone;
                $user->gender=$request->gender;
                $user->address=$request->address;
                $user->save();
                
                $load = view('backend.Admin.info2',compact('user'))->render();
                $loads = view('backend.Admin.info',compact('user'))->render();
                return  response()->json(
                    [
                        'code'=>500,
                        'viewinfo' => $load,
                        'viewinfos' => $loads,
                    ],200
                );
            }
        }
       
    }
    public function add_admin(Request $request){
        $data = Validator::make($request->all(),
      
           [
               'name'=>'bail|required|min:2',
               'phone'=>'bail|required|numeric|digits:10',
               'gender'=>'bail|required',
               'address'=>'bail|required|min:5',
               'email'=>'bail|required|unique:users|email',
               'pass'=>'bail|required|min:5',
               'repass'=>'bail|required|same:pass'
           ],
           [
            'name.required' => 'Vui lòng nhập tên!',
            'name.min' => 'Tên không được nhỏ hơn 2 ký tự',
            'phone.required' => 'Vui lòng nhập số điện thoại!',
            'phone.numeric' => 'Chỉ nhập được số',
            'phone.digits' => 'Vui lòng nhập số điện thoại đủ 10 số!',
            'gender.required' => 'Vui lòng chọn giới tính!',
            'address.required' => 'Vui lòng nhập địa chỉ!',
            'address.min' => 'Địa chỉ không nhỏ hơn 10 ký tự!',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email đã tồn tại',
            'pass.required'=>'Vui lòng nhập mật khẩu',
            'pass.min'=>'Mật khẩu ít nhất 5 ký tự',
            'repass.required'=>'Vui lòng nhập lại mật khẩu',
            'repass.same'=>'Mật khẩu không khớp',
           ],
           );
           if($data->fails()){
               return response()->json([
                    'code'=>200,
                    'name'=>$data->errors()->get('name'),
                    'phone'=>$data->errors()->get('phone'),
                    'gender'=>$data->errors()->get('gender'),
                    'address'=>$data->errors()->get('address'),
                    'email'=>$data->errors()->get('email'),
                    'pass'=>$data->errors()->get('pass'),
                    'repass'=>$data->errors()->get('repass'),
               ],200);
           }
           else{
               $update = new User;
               $update->email =$request->email;
               $update ->name = $request->name;
               $update ->phone = $request->phone;
               $update ->gender = $request->gender;
               $update ->address = $request->address;
               $update ->password = $request->pass;
               $update ->level = '1';
               $update->save();
               return response()->json([
                    'code'=>300,
                ],200);
           }
    }
}

