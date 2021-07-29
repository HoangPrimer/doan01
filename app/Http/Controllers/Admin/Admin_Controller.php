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

    // ======================================================== Admin ========================================================= //

    // danh sach
    public function  list_admin(){

        $list_admin  =   User::where('level','>','0')->orderBy('id','desc')->paginate(50);
        $all_admin =  User::where('level','>','0')->orderBy('id','desc')->get();
        return view('backend.admin.list',compact('list_admin','all_admin'));
    }

    // sap xep
    public function sort_admin(Request $request)
    {
        if (request()->ajax()) {
            $keys = $request->key;
            if ($keys === 'new') {
                $list_admin  = User::where('level','>','0')->orderBy('id', 'desc')->paginate(50);
            }
            if ($keys === 'old') {
                $list_admin  = User::where('level','>','0')->orderBy('id', 'asc')->paginate(50);
            }
            if ($keys === 'abc_asc') {
                $list_admin  = User::where('level','>','0')->orderBy('name', 'asc')->paginate(50);
            }
            if ($keys === 'abc_desc') {
                $list_admin  = User::where('level','>','0')->orderBy('name', 'desc')->paginate(50);
            }
            $new_list_admin = view('backend.admin.child_list', compact('list_admin'))->render();
            return response()->json([
                'new_list_admin' => $new_list_admin,
            ], 200);
        }
    }

    // tìm kiếm
    public function live_search_admin(Request $request)
    {
        $keys = $request->key;
        if ($keys == "") {
            $list_admin = User::where('level','>','0')->orderBy('id', 'desc')->paginate(50);
        } else {
            $list_admin  = User::where(function ($query) use ($keys) {
                $query->where('name', 'like', '%' . $keys . '%')
                    ->orWhere('email', 'like', '%' . $keys . '%')
                    ->orWhere('phone', 'like', '%' . $keys . '%');
            })->where('level','>','0')->orderBy('id', 'desc')->paginate(50);
        }
        $new_list_admin = view('backend.admin.child_list', compact('list_admin'))->render();
        return response()->json([
            'new_list_admin' => $new_list_admin,
        ], 200);
    }

    // xóa
    public function  del_admin($id)
    {
        if (request()->ajax()) {
            $del_admin = User::find($id);
            $del_admin->delete();
            $all = count(User::where('level','>','0')->get());
            $list_admin  = User::where('level','>','0')->orderBy('id', 'desc')->paginate(50);
            $new_list_admin = view('backend.admin.child_list', compact('list_admin'))->render();
            return response()->json([
                'all' => $all,
                'new_list_admin'  => $new_list_admin,
            ], 200);
        }
    }

    public function  list_history(){
      
      
    }

    ////////////////////////////////////////////////////////////////////


   

}
