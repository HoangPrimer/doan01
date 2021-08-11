<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Auth;

class Profile_Controller extends Controller
{

    // thong tin ca nhan
    public function admin_profile($id)
    {

        $profile = User::find($id);
        return view('backend.profile.profile', compact('profile'));
    }

    // cập nhật thông tin
    public function post_update_profile($id, Request $request)
    {
        if (request()->ajax()) {
            $data = Validator::make(
                $request->all(),
                [
                    'avatar' => 'image',
                    'name' => 'bail|required|min:2',
                    'phone' => 'bail|required|numeric|digits:10',
                    'gender' => 'bail|required',
                    'address' => 'bail|required|min:10',

                ],
                [
                    'avatar.image' => 'Ảnh không đúng định dạng',
                    'name.required' => 'Vui lòng nhập tên!',
                    'name.min' => 'Tên không được nhỏ hơn 2 ký tự',
                    'phone.required' => 'Vui lòng nhập số điện thoại!',
                    'phone.numeric' => 'Chỉ nhập được số',
                    'phone.digits' => 'Vui lòng nhập số điện thoại đủ 10 số!',
                    'gender.required' => 'Vui lòng chọn giới tính!',
                    'address.required' => 'Vui lòng nhập địa chỉ!',
                    'address.min' => 'Địa chỉ không nhỏ hơn 10 ký tự!',
                ],
            );
            if ($data->fails()) {
                return response()->json([
                    'code' => 200,
                    'avatar' => $data->errors()->get('avatar'),
                    'name' => $data->errors()->get('name'),
                    'phone' => $data->errors()->get('phone'),
                    'gender' => $data->errors()->get('gender'),
                    'address' => $data->errors()->get('address'),
                ], 200);
            } else {

                $user =  User::find($id);
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->gender = $request->gender;
                $user->address = $request->address;
                if ($request->hasFile('avatar')) {
                    $file = $request->file('avatar');
                    $file_name = $file->getClientOriginalName();
                    $name_random = rand(1000000000000, 9999999999999) . '_' . $file_name;
                    $file->move("./image/avatar", $name_random);
                    $user->image = "/image/avatar/$name_random";
                }
                $user->save();
                return  response()->json([
                    'code' => 300,
                ], 200);
            }
        }
    }
}
