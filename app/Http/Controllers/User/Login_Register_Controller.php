<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Login_Register_Controller extends Controller
{
    // Dang xuat

    public function getlogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    // dang nhap

    public function getlogin()
    {
        if (Auth::check()) {
            if (Auth::user()->level === 0) {
                return redirect()->route('home');
            } else {
                return redirect()->route('ad.home');
            }
        }
        $cart = session()->get('cart');
        return view('frontend.login.index', compact('cart'));
    }


    public function postlogin(Request $request)
    {

        $data = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|',

            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email phải đúng định dạng',
                'password.required' => 'Vui lòng nhập mật khẩu',
            ]
        );

        if ($data) {
            if (Auth::attempt($data)) {
                // Authentication passed...
                if (Auth::user()->level === 0) {
                    Session::flash('toastr', [
                        'type' => 'success',
                        'message' => 'Đăng nhập thành công'
                    ]);
                    return redirect()->route('home');
                } else {
                    Session::flash('toastr', [
                        'type' => 'success',
                        'message' => 'Đăng nhập thành công'
                    ]);
                    return redirect()->route('ad.home');
                }
            } else {
                Session::flash('toastr', [
                    'type' => 'error',
                    'message' => 'Tài khoản hoặc mật khẩu không chính xác!'
                ]);
                return redirect()->route('login');
            }
        }
    }


    public function postregister(Request $request)
    {
        if (request()->ajax()) {
            $data = Validator::make(
                $request->all(),
                [
                    'name' => 'bail|required|min:2|max:30',
                    'email' => 'bail|required|email|unique:users',
                    'password' => 'bail|required|min:6|max:20',
                    'repassword' => 'bail|required|same:password',
                ],

                [
                    'name.required' => 'Vui lòng nhập tên của bạn',
                    'name.min' => 'Tên ít nhất 2 ký tự',
                    'name.max' => 'Tên tối đa 30 ký tự',
                    'email.required' => 'Vui lòng nhập Email của bạn',
                    'email.email' => 'Email chưa đúng định dạng',
                    'email.unique' => 'Email đã tồn tại',
                    'password.required' => 'Vui lòng nhập mật khẩu',
                    'password.min' => 'Mật khẩu ít nhất 6 ký tự',
                    'password.max' => 'Mật khẩu tối đa 20 ký tự',
                    'repassword.required' => 'Vui lòng nhập lại mật khẩu',
                    'repassword.same' => 'Mật khẩu không khớp',
                ]
            );
            if ($data->fails()) {
                return response()->json([
                    'code' => 200,
                    'name' => $data->errors()->get('name'),
                    'email' => $data->errors()->get('email'),
                    'password' => $data->errors()->get('password'),
                    'repassword' => $data->errors()->get('repassword'),

                ], 200);
            } else {
                $new = new User;
                $new->name = $request->name;
                $new->email = $request->email;
                $new->password = Hash::make($request->password);
                $new->save();
                return response()->json([
                    'code' => 300,
                ], 200);
            }
        }
    }
}
