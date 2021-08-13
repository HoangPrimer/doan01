<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use  App\Action_Admin;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;

class Order_Controller extends Controller
{
    // đơn hàng mới
    public function order_new()
    {
        $list_order_new  =  Order::where('od_status', '0')->orwhere('od_status', '1')->orderBy('id', 'desc')->simplepaginate(20);
        $all_order_new = Order::where('od_status', '0')->orwhere('od_status', '1')->orderBy('id', 'desc')->get();
        return view('backend.order.order_new', compact('list_order_new', 'all_order_new'));
    }

    public function sort_order_new(Request $request)
    {
        if (request()->ajax()) {
            $keys = $request->key;
            if ($keys === 'new') {
                $list_order_new  = Order::where('od_status', '0')->orwhere('od_status', '1')->orderBy('id', 'desc')->simplepaginate(20);
            }
            if ($keys === 'old') {
                $list_order_new  = Order::where('od_status', '0')->orwhere('od_status', '1')->orderBy('id', 'asc')->simplepaginate(20);
            }
            if ($keys === 'abc_asc') {
                $list_order_new  = Order::where('od_status', '0')->orwhere('od_status', '1')->orderBy('od_name', 'asc')->simplepaginate(20);
            }
            if ($keys === 'abc_desc') {
                $list_order_new  = Order::where('od_status', '0')->orwhere('od_status', '1')->orderBy('od_name', 'desc')->simplepaginate(20);
            }
            $new_list_order_new = view('backend.order.child_order_new', compact('list_order_new'))->render();
            return response()->json([
                'new_list_order_new' => $new_list_order_new,
            ], 200);
        }
    }

    public function live_search_order_new(Request $request)
    {

        if (request()->ajax()) {
            $keys = $request->key;
            if ($keys == "") {
                $list_order_new  = Order::where('od_status', '0')->orwhere('od_status', '1')->orderBy('id', 'desc')->simplepaginate(20);
            } else {
                $list_order_new  = Order::where(function ($query) use ($keys) {
                    $query->where('od_name', 'like', '%' . $keys . '%')
                        ->orWhere('od_email', 'like', '%' . $keys . '%')
                        ->orWhere('od_phone', 'like', '%' . $keys . '%');
                })->where(function ($query) {
                    $query->where('od_status', '0')
                        ->orWhere('od_status', '1');
                })->orderBy('id', 'desc')->simplepaginate(20);
            }
            $new_list_order_new = view('backend.order.child_order_new', compact('list_order_new'))->render();
            return response()->json([
                'new_list_order_new' => $new_list_order_new,
            ], 200);
        }
    }


    // đơn hàng đang giao
    public function order_onbyway()
    {
        $all_order_onbyway  =  Order::where('od_status', '2')->orderBy('id', 'desc')->get();
        $list_order_onbyway  =  Order::where('od_status', '2')->orderBy('id', 'desc')->simplepaginate(20);
        return view('backend.order.order_onbyway', compact('list_order_onbyway', 'all_order_onbyway'));
    }

    public function sort_order_onbyway(Request $request)
    {
        if (request()->ajax()) {
            $keys = $request->key;
            if ($keys === 'new') {
                $list_order_onbyway  = Order::where('od_status', '2')->orderBy('id', 'desc')->simplepaginate(20);
            }
            if ($keys === 'old') {
                $list_order_onbyway  = Order::where('od_status', '2')->orderBy('id', 'asc')->simplepaginate(20);
            }
            if ($keys === 'abc_asc') {
                $list_order_onbyway  = Order::where('od_status', '2')->orderBy('od_name', 'asc')->simplepaginate(20);
            }
            if ($keys === 'abc_desc') {
                $list_order_onbyway  = Order::where('od_status', '2')->orderBy('od_name', 'desc')->simplepaginate(20);
            }
            $new_list_order_onbyway = view('backend.order.child_order_onbyway', compact('list_order_onbyway'))->render();
            return response()->json([
                'new_list_order_onbyway' => $new_list_order_onbyway,
            ], 200);
        }
    }

    public function live_search_order_onbyway(Request $request)
    {

        $keys = $request->key;
        if ($keys == "") {
            $list_order_onbyway  = Order::where('od_status', '2')->orderBy('id', 'desc')->simplepaginate(20);
        } else {
            $list_order_onbyway  = Order::where(function ($query) use ($keys) {
                $query->where('od_name', 'like', '%' . $keys . '%')
                    ->orWhere('od_email', 'like', '%' . $keys . '%')
                    ->orWhere('od_phone', 'like', '%' . $keys . '%');
            })->where('od_status', '2')->orderBy('id', 'desc')->simplepaginate(20);
        }
        $new_list_order_onbyway = view('backend.order.child_order_onbyway', compact('list_order_onbyway'))->render();
        return response()->json([
            'new_list_order_onbyway' => $new_list_order_onbyway,
        ], 200);
    }

    // đơn hàng đã giao
    public function order_done()
    {
        $all_order_done  =  Order::where('od_status', '3')->orderBy('id', 'desc')->get();
        $list_order_done  =  Order::where('od_status', '3')->orderBy('id', 'desc')->simplepaginate(20);
        return view('backend.order.order_done', compact('list_order_done', 'all_order_done'));
    }


    public function sort_order_done(Request $request)
    {
        if (request()->ajax()) {
            $keys = $request->key;
            if ($keys === 'new') {
                $list_order_done  = Order::where('od_status', '3')->orderBy('id', 'desc')->simplepaginate(20);
            }
            if ($keys === 'old') {
                $list_order_done  = Order::where('od_status', '3')->orderBy('id', 'asc')->simplepaginate(20);
            }
            if ($keys === 'abc_asc') {
                $list_order_done  = Order::where('od_status', '3')->orderBy('od_name', 'asc')->simplepaginate(20);
            }
            if ($keys === 'abc_desc') {
                $list_order_done  = Order::where('od_status', '3')->orderBy('od_name', 'desc')->simplepaginate(20);
            }
            $new_list_order_done = view('backend.order.child_order_done', compact('list_order_done'))->render();
            return response()->json([
                'new_list_order_done' => $new_list_order_done,
            ], 200);
        }
    }

    public function live_search_order_done(Request $request)
    {

        $keys = $request->key;
        if ($keys == "") {
            $list_order_done  = Order::where('od_status', '3')->orderBy('id', 'desc')->simplepaginate(20);
        } else {
            $list_order_done  = Order::where(function ($query) use ($keys) {
                $query->where('od_name', 'like', '%' . $keys . '%')
                    ->orWhere('od_email', 'like', '%' . $keys . '%')
                    ->orWhere('od_phone', 'like', '%' . $keys . '%');
            })->where('od_status', '3')->orderBy('id', 'desc')->simplepaginate(20);
        }
        $new_list_order_done = view('backend.order.child_order_done', compact('list_order_done'))->render();
        return response()->json([
            'new_list_order_done' => $new_list_order_done,
        ], 200);
    }

    // đơn đã hủy
    public function order_cancel()
    {
        $all_order_cancel =  Order::where('od_status', '4')->orderBy('id', 'desc')->get();
        $list_order_cancel =  Order::where('od_status', '4')->orderBy('id', 'desc')->simplepaginate(20);
        return view('backend.order.order_cancel', compact('list_order_cancel', 'all_order_cancel'));
    }


    public function sort_order_cancel(Request $request)
    {
        if (request()->ajax()) {
            $keys = $request->key;
            if ($keys === 'new') {
                $list_order_cancel  = Order::where('od_status', '4')->orderBy('id', 'desc')->simplepaginate(20);
            }
            if ($keys === 'old') {
                $list_order_cancel  = Order::where('od_status', '4')->orderBy('id', 'asc')->simplepaginate(20);
            }
            if ($keys === 'abc_asc') {
                $list_order_cancel  = Order::where('od_status', '4')->orderBy('od_name', 'asc')->simplepaginate(20);
            }
            if ($keys === 'abc_desc') {
                $list_order_cancel  = Order::where('od_status', '4')->orderBy('od_name', 'desc')->simplepaginate(20);
            }
            $new_list_order_cancel = view('backend.order.child_order_cancel', compact('list_order_cancel'))->render();
            return response()->json([
                'new_list_order_cancel' => $new_list_order_cancel,
            ], 200);
        }
    }

    public function live_search_order_cancel(Request $request)
    {

        $keys = $request->key;
        if ($keys == "") {
            $list_order_cancel  = Order::where('od_status', '4')->orderBy('id', 'desc')->simplepaginate(20);
        } else {
            $list_order_cancel  = Order::where(function ($query) use ($keys) {
                $query->where('od_name', 'like', '%' . $keys . '%')
                    ->orWhere('od_email', 'like', '%' . $keys . '%')
                    ->orWhere('od_phone', 'like', '%' . $keys . '%');
            })->where('od_status', '4')->orderBy('id', 'desc')->simplepaginate(20);
        }
        $new_list_order_cancel = view('backend.order.child_order_cancel', compact('list_order_cancel'))->render();
        return response()->json([
            'new_list_order_cancel' => $new_list_order_cancel,
        ], 200);
    }



    // chi tiết đơn hàng
    public function order_details($id)
    {
        if(request()->ajax()){
            $order_details  =  Order::find($id);
            $html =  view('backend.order.details', compact('order_details'))->render();
            return response([
                'html' => $html,
            ]);
        }
    }

    public function action($id, $key)
    {
        $order = Order::find($id);

        if ($order) {
            switch ($key) {
                case '1':
                    $order->od_status = '1';
                    break;
                case '2':
                    $order->od_status = '2';
                    break;
                case '3':
                    $order->od_status = '3';
                    $a = $order->Item()->get();
                    foreach ($a as $b) {
                        $find = Product::where('pro_code', $b->i_product_code)->first();
                        $find->pro_amount -= $b->i_amount;
                        $find->pro_amount_sell += $b->i_amount;
                        $find->save();
                    }
                    break;
                case '4':
                    $order->od_status = '4';
                    break;
            }
            $order->save();
            return  redirect()->back()->with('toastr',['message'=>'Cập Nhật Thành Công','type'=>'success'] );
        }
    }


    public function del_order($id)
    {
        if (request()->ajax()) {
            $del_oder = Order::find($id);
            $del_oder->delete();
            return response()->json([
                'success' => 200,
            ]);
        }
    }

    // public function back()
    // {
    //     return redirect()->to($this->getRedirectUrl());
    // }
}
