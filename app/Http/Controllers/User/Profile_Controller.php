<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Item;
use App\Order;
use Illuminate\Http\Request;
use App\User;
use Error;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

class Profile_Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
            
    public function profile()
    {
        $cart = session()->get('cart');
        return view('frontend.user.profile', compact('cart'));
    }


    public function avatar(Request $request)
    {

        if (request()->ajax()) {
            $data = Validator::make(
                $request->all(),
                [
                    'avatar' => 'image',
                ],
                [
                    'avatar.image' => 'Ảnh không đúng định dạng',
                ]
            );

            if ($data->fails()) {
                return response()->json([
                    'code' => 200,
                    'avatar' => $data->errors()->get('avatar'),
                ],200);
            } else {
                $user = User::find($request->id);
                if ($request->hasFile('avatar')) {
                    $file = $request->file('avatar');
                    $file_name = $file->getClientOriginalName();
                    $name_random = rand(1000000000000, 9999999999999) . '_' . $file_name;
                    $file->move("./image/avatar", $name_random);
                    $user->image = "/image/avatar/$name_random";
                }
                $user->save();
                return response()->json([
                    'code' => 300,
                ],200);
            }
        }
    }
    /////////////////////////////////


    public function profiles(Request $request)
    {
        $data = Validator::make(
            $request->all(),

            [
                'name' => 'bail|required|min:2',
                'phone' => 'bail|required|numeric|digits:10',
            ],
            [
                'name.required' => 'Vui lòng nhập tên!',
                'name.min' => 'Tên không được nhỏ hơn 2 ký tự',
                'phone.required' => 'Vui lòng nhập số điện thoại!',
                'phone.numeric' => 'Chỉ nhập được số',
                'phone.digits' => 'Vui lòng nhập đủ 10 số!',
            ],
        );
        if ($data->fails()) {
            return response()->json([
                'code' => 200,
                'name' => $data->errors()->get('name'),
                'phone' => $data->errors()->get('phone'),
            ], 200);
        } else {
            $user = User::find($request->id);
            if ($request->has('name')) {
                $user->name = $request->name;
            }
            if ($request->has('phone')) {
                $user->phone = $request->phone;
            }
            if ($request->has('gender')) {
                $user->gender = $request->gender;
            }
            if ($request->has('address')) {
                $user->address = $request->address;
            }
            $user->save();

            return response()->json([
                'code' => 300,
            ], 200);
        }
    }

    public function order_details($id)
    {
        $or = Order::where('od_code',$id)->first();
        $id_od = $or->id;
        $items = Item::where('i_order_id',$id_od)->get();

        return view('frontend.user.order_details',compact('items','or'));
    }
}