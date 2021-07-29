<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Rate;
use App\User;
use App\Customer;
use App\Order;

class User_Controller extends Controller
{
    // ------------------------------------------------------- comment ---------------------------------------//
    // danh sách
    public function  list_comment()
    {
        $list_comment  =   Comment::orderBy('id', 'desc')->paginate(50);
        $all_comment = Comment::all();
        return view('backend.user.list_comment', compact('list_comment', 'all_comment'));
    }

    // sắp xếp
    public function sort_comment(Request $request)
    {
        if (request()->ajax()) {
            $keys = $request->key;
            if ($keys === 'new') {
                $list_comment  = Comment::orderBy('id', 'desc')->paginate(50);
            }
            if ($keys === 'old') {
                $list_comment  = Comment::orderBy('id', 'asc')->paginate(50);
            }
            $new_list_comment = view('backend.user.child_list_comment', compact('list_comment'))->render();
            return response()->json([
                'new_list_comment' => $new_list_comment,
            ], 200);
        }
    }

    // tìm kiếm
    public function live_search_comment(Request $request)
    {
        $keys = $request->key;
        if ($keys == "") {
            $list_comment  = Comment::orderBy('id', 'desc')->paginate(50);
        } else {
            $list_comment  = Comment::where('cm_content', 'like', '%' . $keys . '%')->orderBy('id', 'desc')->paginate(50);
        }
        $new_list_comment = view('backend.user.child_list_comment', compact('list_comment'))->render();
        return response()->json([
            'new_list_comment' => $new_list_comment,
        ], 200);
    }

    // xóa
    public function  del_comment($id)
    {
        if (request()->ajax()) {
            $delete_comment = Comment::find($id);
            $delete_comment->delete();
            $all = count(Comment::all());
            $list_comment  = Comment::orderBy('id', 'desc')->paginate(50);
            $new_list_comment = view('backend.user.child_list_comment', compact('list_comment'))->render();
            return response()->json([
                'all' => $all,
                'new_list_comment'  => $new_list_comment,
            ], 200);
        }
    }

    // ------------------------------------------------------- đánh giá ---------------------------------------//
    // danh sách
    public function  list_rate()
    {
        $list_rate  =   Rate::orderBy('id', 'desc')->paginate(50);
        $all_rate = Rate::all();
        return view('backend.user.list_rate', compact('list_rate', 'all_rate'));
    }

    // sắp xếp
    public function sort_rate(Request $request)
    {
        if (request()->ajax()) {
            $keys = $request->key;
            if ($keys === 'new') {
                $list_rate  = Rate::orderBy('id', 'desc')->paginate(50);
            }
            if ($keys === 'old') {
                $list_rate  = Rate::orderBy('id', 'asc')->paginate(50);
            }
            $new_list_rate = view('backend.user.child_list_rate', compact('list_rate'))->render();
            return response()->json([
                'new_list_rate' => $new_list_rate,
            ], 200);
        }
    }

    // tìm kiếm
    public function live_search_rate(Request $request)
    {
        $keys = $request->key;
        if ($keys == "") {
            $list_rate = Rate::orderBy('id', 'desc')->paginate(50);
        } else {
            $list_rate  = Rate::where('r_content', 'like', '%' . $keys . '%')->orderBy('id', 'desc')->paginate(50);
        }
        $new_list_rate = view('backend.user.child_list_rate', compact('list_rate'))->render();
        return response()->json([
            'new_list_rate' => $new_list_rate,
        ], 200);
    }

    // xóa
    public function  del_rate($id)
    {
        if (request()->ajax()) {
            $delete_rate = Rate::find($id);
            $delete_rate->delete();
            $all = count(Rate::all());
            $list_rate  = Rate::orderBy('id', 'desc')->paginate(50);
            $new_list_rate = view('backend.user.child_list_rate', compact('list_rate'))->render();
            return response()->json([
                'all' => $all,
                'new_list_rate'  => $new_list_rate,
            ], 200);
        }
    }


    // ------------------------------------------------------- người dùng ---------------------------------------//
    // danh sách
    public function  list_user()
    {
        $list_user  =   User::where('level','0')->orderBy('id', 'desc')->paginate(50);
        $all_user = User::where('level','0')->get();
        return view('backend.user.list_user', compact('list_user', 'all_user'));
    }

    // sắp xếp
    public function sort_user(Request $request)
    {
        if (request()->ajax()) {
            $keys = $request->key;
            if ($keys === 'new') {
                $list_user  = User::where('level','0')->orderBy('id', 'desc')->paginate(50);
            }
            if ($keys === 'old') {
                $list_user  = User::where('level','0')->orderBy('id', 'asc')->paginate(50);
            }
            if ($keys === 'abc_asc') {
                $list_user  = User::where('level','0')->orderBy('name', 'asc')->paginate(50);
            }
            if ($keys === 'abc_desc') {
                $list_user  = User::where('level','0')->orderBy('name', 'desc')->paginate(50);
            }
            $new_list_user = view('backend.user.child_list_user', compact('list_user'))->render();
            return response()->json([
                'new_list_user' => $new_list_user,
            ], 200);
        }
    }

    // tìm kiếm
    public function live_search_user(Request $request)
    {
        $keys = $request->key;
        if ($keys == "") {
            $list_user = User::where('level','0')->orderBy('id', 'desc')->paginate(50);
        } else {
            $list_user  = User::where(function ($query) use ($keys) {
                $query->where('name', 'like', '%' . $keys . '%')
                    ->orWhere('email', 'like', '%' . $keys . '%')
                    ->orWhere('phone', 'like', '%' . $keys . '%');
            })->where('level','0')->orderBy('id', 'desc')->paginate(50);
        }
        $new_list_user = view('backend.user.child_list_user', compact('list_user'))->render();
        return response()->json([
            'new_list_user' => $new_list_user,
        ], 200);
    }

    // xóa
    public function  del_user($id)
    {
        if (request()->ajax()) {
            $del_user = User::find($id);
            $del_user->delete();
            $all = count(User::where('level','0')->get());
            $list_user  = User::where('level','0')->orderBy('id', 'desc')->paginate(50);
            $new_list_user = view('backend.user.child_list_user', compact('list_user'))->render();
            return response()->json([
                'all' => $all,
                'new_list_user'  => $new_list_user,
            ], 200);
        }
    }

    // ------------------------------------------------------- Khách hàng ---------------------------------------//
    // danh sách
    public function  list_customer()
    {
        $list_customer  =   Customer::orderBy('id', 'desc')->paginate(50);
        $all_customer = Customer::all();
        return view('backend.user.list_customer', compact('list_customer', 'all_customer'));
    }

    // sắp xếp
    public function sort_customer(Request $request)
    {
        if (request()->ajax()) {
            $keys = $request->key;
            if ($keys === 'new') {
                $list_customer  = Customer::orderBy('id', 'desc')->paginate(50);
            }
            if ($keys === 'old') {
                $list_customer  = Customer::orderBy('id', 'asc')->paginate(50);
            }
            if ($keys === 'abc_asc') {
                $list_customer  = Customer::orderBy('ct_name', 'asc')->paginate(50);
            }
            if ($keys === 'abc_desc') {
                $list_customer  = Customer::orderBy('ct_name', 'desc')->paginate(50);
            }
            $new_list_customer = view('backend.user.child_list_customer', compact('list_customer'))->render();
            return response()->json([
                'new_list_customer' => $new_list_customer,
            ], 200);
        }
    }

    // tìm kiếm
    public function live_search_customer(Request $request)
    {
        $keys = $request->key;
        if ($keys == "") {
            $list_customer = Customer::orderBy('id', 'desc')->paginate(50);
        } else {
            $list_customer  = Customer::where(function ($query) use ($keys) {
                $query->where('ct_name', 'like', '%' . $keys . '%')
                    ->orWhere('ct_email', 'like', '%' . $keys . '%')
                    ->orWhere('ct_phone', 'like', '%' . $keys . '%');
            })->orderBy('id', 'desc')->paginate(50);
        }
        $new_list_customer = view('backend.user.child_list_customer', compact('list_customer'))->render();
        return response()->json([
            'new_list_customer' => $new_list_customer,
        ], 200);
    }

    // xóa
    public function  del_customer($id)
    {
        if (request()->ajax()) {
            $del_customer = Customer::find($id);
            $del_customer->delete();
            $all = count(Customer::all());
            $list_customer = Customer::orderBy('id', 'desc')->paginate(50);
            $new_list_customer = view('backend.user.child_list_customer', compact('list_customer'))->render();
            return response()->json([
                'all' => $all,
                'new_list_customer'  => $new_list_customer,
            ], 200);
        }
    }
}
