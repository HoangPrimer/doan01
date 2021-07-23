<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use App\Customer;
use App\Item;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Product;
use App\Rate;
use Illuminate\Support\Facades\Validator;

class Cart_Controller extends Controller
{

    // gio hang

    public function index()
    {
        $cart = session()->get('cart');
        return view('frontend.cart.shopping_cart', compact('cart'));
    }

    // dat hang

    public function order(Request $request)
    {
        if (request()->ajax()) {
            $data = Validator::make(
                $request->all(),
                [
                    'name' => 'bail|required|string|min:2|max:30',
                    'email' => 'bail|required|email',
                    'phone' => 'bail|required|numeric|digits:10',
                    'address' => 'bail|required|string|min:5',
                    'gender' => 'required',
                    'payment' => 'required',
                ],

                [
                    'name.required' => 'Vui lòng nhập họ tên',
                    'name.string' => 'Tên là chuỗi các ký tự không có ký tự đặc biệt',
                    'name.min' => 'Tên tối ít nhất 2 ký tự',
                    'name.max' => 'Tên tối đa 30 ký tự',
                    'email.required' => 'Vui lòng nhập email',
                    'email.email' => 'Email phải đúng định dạng',
                    'phone.required' => 'Vui lòng nhập số điện thoại',
                    'phone.numeric' => 'Vui lòng chỉ nhập số',
                    'phone.digits' => 'Số điện thoại 10 số',
                    'address.required' => 'Vui lòng nhập địa chỉ',
                    'address.string' => 'Địa chỉ là chuỗi các ký tự không có ký tự đặc biệt',
                    'address.min' => 'Địa chỉ ít nhất 5 ký tự',
                    'gender.required'  => 'Vui lòng chọn giới tính',
                    'payment.required'  => 'Vui lòng chọn hình thức thanh toán',
                ]
            );
            if ($data->fails()) {
                return response()->json([
                    'code' => 200,
                    'name' => $data->errors()->get('name'),
                    'phone' => $data->errors()->get('phone'),
                    'gender' => $data->errors()->get('gender'),
                    'address' => $data->errors()->get('address'),
                    'email' => $data->errors()->get('email'),
                    'payment' => $data->errors()->get('payment'),
                ], 200);
            } else {
                $check = Customer::where('ct_phone', $request->phone)->get();
                if (count($check) === 0) {
                    $customer = new Customer();
                    $customer->ct_name = $request->name;
                    $customer->ct_email = $request->email;
                    $customer->ct_phone = $request->phone;
                    $customer->ct_gender = $request->gender;
                    $customer->ct_address = $request->address;

                    $customer->save();
                    $customer_id = $customer->id;
                } else {
                    foreach ($check as $check) {
                        $customer_id = $check->id;
                    }
                }
                $oder     =  new Order;
                $oder->od_customer_id  = $customer_id;
                $oder->od_name = $request->name;
                $oder->od_phone = $request->phone;
                $oder->od_address = $request->address;
                $oder->od_gender = $request->gender;
                $oder->od_email  =   $request->email;
                $oder->od_status  =   "Chờ Duyệt";
                $oder->od_total = $request->tongtien;
                $oder->od_payment = $request->payment;
                $oder->od_note = $request->note;
                $oder->save();
                $id  = $oder->id;
                $cart  = session()->get('cart');
                foreach ($cart  as $tt) {
                    $items  = new Item;
                    $SoLuong  = $tt['soluong'];
                    $Price   =  $tt['price'];
                    $MaSP = $tt['masp'];
                    $total  = $SoLuong * $Price;
                    $items->i_order_id  = $id;
                    $items->i_product_code = $MaSP;
                    $items->i_amount  = $SoLuong;
                    $items->i_price  = $Price;
                    $items->i_total  = $total;

                    $items->save();
                }
                session()->forget('cart');
                $cart = session()->get('cart');
                $shopcart = view('frontend.cart.cartcomponent',compact('cart'))->render();
                $headers = view('frontend.layout.header', compact('cart'))->render();
                return response()->json([
                    'code' => 300,
                    'message' => 'Đặt hàng thành công! Chúng tôi sẽ liên hệ với bạn sớm nhất có thể!!',
                    'shopcart' => $shopcart,
                    'headers' => $headers,
                ], 200);
            }
        }
    }

    // them san pham vao gio hang

    public function create($id)
    {
   // session()->forget('cart');
        $product = Product::find($id);

        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['soluong'] =  $cart[$id]['soluong'] + 1;
        } else {
            if ($product->pro_sale === 0) {
                $cart[$id] = [
                    'masp' => $product->pro_code,
                    'thuonghieu' => $product->Trademark->tr_name,
                    'price' => $product->pro_price,
                    'soluong' => 1,
                ];
            } else {
                $cart[$id] = [
                    'masp' => $product->pro_code,
                    'thuonghieu' => $product->Trademark->tr_name,
                    'price' => $product->pro_sale,
                    'soluong' => 1,
                ];
            }
        }
        $cart = session()->put('cart',$cart);
        $cart = session()->get('cart');
        $header = view('frontend.layout.header', compact('cart'))->render();

        return response()->json([
            'header' => $header,
        ], 200);
    }

    // cap nhat gio hang

    public function update(Request $request)
    {
        if (request()->ajax()) {
            if ($request->id && $request->soluong) {
                $cac = session()->get('cart');
                $cac[$request->id]['soluong'] = $request->soluong;
                session()->put('cart', $cac);

                $cart = session()->get('cart');
                $cartcomponent = view('frontend.cart.cartcomponent', compact('cart'))->render();
                return response()->json([
                    'cart_component' => $cartcomponent,
                    'code' => 200,
                ], 200);
            }
        }
    }
    public function delete(Request $request)
    {

        if ($request->id) {
            $cac = session()->get('cart');
            unset($cac[$request->id]);
            session()->put('cart', $cac);

            $cart = session()->get('cart');
            $header = view('frontend.layout.header', compact('cart'))->render();
            $cartcomponent = view('frontend.cart.cartcomponent', compact('cart'))->render();
            return response()->json(['cart_component' => $cartcomponent, 'header' => $header, 'code' => 200], 200);
        }
    }

    // trang chu

    function continue()
    {
        return redirect('/');
    }
}
