<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
class Profile_Controller extends Controller
{
    
    public function profile($id)
    {
        $profile = User::find($id);
        $cart = session()->get('cart');
        return view('frontend\profile',compact('profile','cart'));
    }

    /////////////////////////////////


    public function profiles(Request $request)
        {
         $data = Validator::make($request->all(),
      
           [
               'name'=>'bail|required|min:2',
               'phone'=>'bail|required|numeric|digits:10',
               'gender'=>'bail|required',
               'address'=>'bail|required|min:5',
               'avatar'=>'bail|image',
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
            'avatar.image'=>'Ảnh không đúng định dạng'
           ],
           );
           if($data->fails()){
               return response()->json([
                    'code'=>200,
                    'name'=>$data->errors()->get('name'),
                    'phone'=>$data->errors()->get('phone'),
                    'gender'=>$data->errors()->get('gender'),
                    'address'=>$data->errors()->get('address'),
                    'avatar'=>$data->errors()->get('avatar'),
               ],200);
           }
           else{
               $update = User::find($request->id);
               $update ->name = $request->name;
               $update ->phone = $request->phone;
               $update ->gender = $request->gender;
               $update ->address = $request->address;
               if($request->hasFile('avatar')){
                    $file= $request->file('avatar');
                    $file_name = $file->getClientOriginalName();
                    $name_random = rand(1000000000000,9999999999999).'_'.$file_name;
                
                    $file->move("./image/default",$name_random );
                    $update->image = "/image/default/$name_random";
               }
               $update->save();
               $profile = User::find($request->id);
               $cartcomponent = view('frontend.layout.header1')->render();
               $render = view('frontend.child.profile',compact('profile'))->render();
               return response()->json([
                    'code'=>300,
                    'render'=>$render,
                    'heder' =>$cartcomponent,
                ],200);
           }
    }
}
