<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use Spatie\Activitylog\Models\Activity;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class Category_Controller extends Controller
{

    // danh sachs danh muc
    public function list_category()
    {
        $list_category  = Category::orderBy('id', 'desc')->simplepaginate(20);
        $all_category = Category::all();
        return view('backend.category.list', compact('list_category', 'all_category'));
    }


    // tim kiem sap xep
    public function sort_category(Request $request)
    {
        if (request()->ajax()) {
            $keys = $request->key;
            if ($keys === 'new') {
                $list_category  = Category::orderBy('id', 'desc')->simplepaginate(20);
            }
            if ($keys === 'old') {
                $list_category  = Category::orderBy('id', 'asc')->simplepaginate(20);
            }
            if ($keys === 'abc_asc') {
                $list_category  = Category::orderBy('c_name', 'asc')->simplepaginate(20);
            }
            if ($keys === 'abc_desc') {
                $list_category  = Category::orderBy('c_name', 'desc')->simplepaginate(20);
            }
            $new_list_category = view('backend.category.child_list', compact('list_category'))->render();

            return response()->json([
                'new_list_category' => $new_list_category,
            ], 200);
        }
    }

    public function live_search_category(Request $request)
    {

        $keys = $request->key;
        if ($keys == "") {
            $list_category  = Category::orderBy('id', 'desc')->simplepaginate(20);
        } else {
            $list_category  = Category::where('c_name', 'like', '%' . $keys . '%')
                ->orwhere('c_slug', 'like', '%' . $keys . '%')
                ->orwhere('c_desc', 'like', '%' . $keys . '%')
                ->orwhere('c_status', 'like', '%' . $keys . '%')
                ->orwhere('created_at', 'like', '%' . $keys . '%')->orderBy('id', 'desc')->simplepaginate(20);
        }
        $live_search_category = view('backend.category.child_list', compact('list_category'))->render();
        return response()->json([
            'live_search_category' => $live_search_category,
        ], 200);
    }


    // tao moi danh muc san pham

    public function create_category()
    {
        return view('backend.category.create');
    }


    public function post_create_category(Request $request)
    {
        if (request()->ajax()) {
            $data = Validator::make(
                $request->all(),

                [
                    'c_name' => 'bail|required|unique:categories,c_name|min:5|max:40',
                    'c_desc' => 'bail|required|min:20',

                ],
                [
                    'c_name.required' => 'Vui l??ng nh???p t??n danh m???c!',
                    'c_name.min' => 'T??n kh??ng ???????c nh??? h??n 5 k?? t???',
                    'c_name.max' => 'T??n d??i t???i ??a 40 k?? t???',
                    'c_name.unique' => 'Danh m???c ???? t???n t???i',
                    'c_desc.required' => 'Vui l??ng nh???p m?? t???',
                    'c_desc.min' => 'M?? t??? ng???n nh???t 20 k?? t???',
                ],
            );
            if ($data->fails()) {
                return response()->json([
                    'code' => 200,
                    'c_name' => $data->errors()->get('c_name'),
                    'c_desc' => $data->errors()->get('c_desc'),

                ], 200);
            } else {

                $category = new Category();
                $slug = Str::slug($request->c_name);
                $category->c_name = $request->c_name;
                $category->c_desc = $request->c_desc;
                $category->c_slug = $slug;
                $category->save();

                return response()->json([
                    'code' => 300,
                ], 200);
            }
        }
    }

    // cap nhat danh muc san pham

    public function update_category($id)
    {

        $update_category  = Category::find($id);
        return view('backend.category.update', compact('update_category'));
    }

    public function post_update_category($id, Request $request)
    {
        if (request()->ajax()) {
            if ($request->c_name == "") {
                $data = Validator::make(
                    $request->all(),
                    [
                        'c_desc' => 'bail|required|min:20',
                    ],
                    [
                        'c_desc.min' => 'M?? t??? ng???n nh???t 20 k?? t???',
                        'c_desc.required' => 'Vui l??ng nh???p m?? t???',
                    ],
                );
            } else {
                $data = Validator::make(
                    $request->all(),
                    [
                        'c_name' => 'bail|min:5|max:40|unique:categories,c_name',
                        'c_desc' => 'bail|required|min:20',
                    ],
                    [
                        'c_name.min' => 'T??n kh??ng ???????c ng???n h??n 5 k?? t???',
                        'c_name.max' => 'T??n kh??ng d??i qu?? 40 k?? t???',
                        'c_name.unique' => 'Danh m???c ???? t???n t???i',
                        'c_desc.min' => 'M?? t??? ng???n nh???t 20 k?? t???',
                        'c_desc.required' => 'Vui l??ng nh???p m?? t???',
                    ],
                );
            }

            if ($data->fails()) {
                return response()->json([
                    'code' => 200,
                    'c_desc' => $data->errors()->get('c_desc'),
                    'c_name' => $data->errors()->get('c_name'),

                ], 200);
            } else {
                $update_category = Category::find($id);
                if ($request->c_name == "") {
                    $update_category->c_desc = $request->c_desc;
                    $update_category->update();
                } else {
                    $slug = Str::slug($request->c_name);
                    $update_category->c_name = $request->c_name;
                    $update_category->C_slug = $slug;
                    $update_category->C_desc = $request->c_desc;
                    $update_category->update();
                }
                return response()->json([
                    'code' => 300,
                ], 200);
            }
        }
    }


    //xoa danh muc san pham

    public function delete_category($id)
    {
        if (request()->ajax()) {
            $delete_category = Category::find($id);
            $delete_category->delete();
            $all_category = Category::all();
            $all = count($all_category);
            $list_category  = Category::orderBy('id', 'desc')->simplepaginate(20);
            $new_list_category = view('backend.category.child_list', compact('list_category'))->render();
            return response()->json([
                'all' => $all,
                'new_list_category'  => $new_list_category,
            ], 200);
        }
    }

    // an hien danh muc san pham

    public function show_hide_category($id)
    {
        if (request()->ajax()) {
            $show_hide = Category::find($id);
            $show_hide->c_status = !$show_hide->c_status;
            $show_hide->save();
            $hide_category =  Category::find($id);
            $hide = $hide_category->c_status;
            return response()->json([
                'hide' => $hide,
            ], 200);
        }
    }
}
