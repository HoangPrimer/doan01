<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trademark;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Trademark_Controller extends Controller
{
    public function list_trademark()
    {
        $list_trademark  = Trademark::orderBy('id', 'desc')->simplepaginate(20);
        $all_trademark = Trademark::all();
        return view('backend.trademark.list', compact('list_trademark', 'all_trademark'));
    }


    // tim kiem sap xep 
    public function sort_trademark(Request $request)
    {
        if (request()->ajax()) {
            $keys = $request->key;
            if ($keys === 'new') {
                $list_trademark  = Trademark::orderBy('id', 'desc')->simplepaginate(20);
                $new_list_trademark = view('backend.trademark.child_list', compact('list_trademark'))->render();
            }
            if ($keys === 'old') {
                $list_trademark  = Trademark::orderBy('id', 'asc')->simplepaginate(20);
                $new_list_trademark = view('backend.trademark.child_list', compact('list_trademark'))->render(); 
            }
            if ($keys === 'abc_asc') {
                $list_trademark  = Trademark::orderBy('tr_name', 'asc')->simplepaginate(20);
                $new_list_trademark = view('backend.trademark.child_list', compact('list_trademark'))->render();
            }
            if ($keys === 'abc_desc') {
                $list_trademark  = Trademark::orderBy('tr_name', 'desc')->simplepaginate(20);
                $new_list_trademark = view('backend.trademark.child_list', compact('list_trademark'))->render(); 
            }
            return response()->json([
                'new_list_trademark' => $new_list_trademark,
            ], 200);
        }
    }

    public function live_search_trademark(Request $request)
    {
        $keys = $request->key;
        if ($keys == "") {
            $list_trademark  = Trademark::orderBy('id', 'desc')->simplepaginate(20);
            $live_search_trademark = view('backend.trademark.child_list', compact('list_trademark'))->render();
            return response()->json([
                'live_search_trademark' => $live_search_trademark,
            ], 200);
        } else {
            $list_trademark  = Trademark::where('tr_name', 'like', '%' . $keys . '%')
                ->orwhere('tr_slug', 'like', '%' . $keys . '%')
                ->orwhere('tr_logo', 'like', '%' . $keys . '%')
                ->orwhere('tr_desc', 'like', '%' . $keys . '%')
                ->orwhere('created_at', 'like', '%' . $keys . '%')->orderBy('id', 'desc')->simplepaginate(20);
            $live_search_trademark = view('backend.trademark.child_list', compact('list_trademark'))->render();
            return response()->json([
                'live_search_trademark' => $live_search_trademark,
            ], 200);
        }
    }
    // tao moi thương hiệu san pham

    public function create_trademark()
    {
        return view('backend.trademark.create');
    }


    public function post_create_trademark(Request $request)
    {
        if (request()->ajax()) {
            $data = Validator::make(
                $request->all(),

                [
                    'tr_name' => 'bail|required|unique:trademarks,tr_name|min:3|max:30',
                    'tr_logo' => 'bail|image',

                ],
                [
                    'tr_name.required' => 'Vui lòng nhập tên thương hiệu!',
                    'tr_name.min' => 'Tên không được nhỏ hơn 3 ký tự',
                    'tr_name.max' => 'Tên dài tối đa 30 ký tự',
                    'tr_name.unique' => 'Thương hiệu đã tồn tại',
                    'tr_logo.image' => 'Ảnh không đúng định dạng ! ',

                ],
            );
            if ($data->fails()) {
                return response()->json([
                    'code' => 200,
                    'tr_name' => $data->errors()->get('tr_name'),
                    'tr_logo' => $data->errors()->get('tr_logo'),

                ], 200);
            } else {

                $trademark = new Trademark();
                $slug = Str::slug($request->tr_name);
                $trademark->tr_name = $request->tr_name;
                $trademark->tr_desc = $request->tr_desc;
                $trademark->tr_slug = $slug;
                if ($request->hasFile('tr_logo')) {
                    $file = $request->file('tr_logo');
                    $file_name = $file->getClientOriginalName();
                    $name_random = rand(1000000000000, 9999999999999) . '_' . $file_name;

                    $file->move("./image/Image_Thuonghieu", $name_random);
                    $trademark->tr_logo = "/image/Image_Thuonghieu/$name_random";
                }
                $trademark->save();
                return response()->json([
                    'code' => 300,
                ], 200);
            }
        }
    }

    // cap nhat thương hiệu san pham

    public function update_trademark($id)
    {

        $update_trademark  = Trademark::find($id);
        return view('backend.trademark.update', compact('update_trademark'));
    }

    public function post_update_trademark($id, Request $request)
    {
        if (request()->ajax()) {
            if ($request->tr_name == "") {
                $data = Validator::make(
                    $request->all(),
                    [
                        'tr_logo' => 'bail|image',
                    ],
                    [
                        'tr_logo.image' => 'Ảnh không đúng định dạng',
                    ],
                );
            } else {
                $data = Validator::make(
                    $request->all(),
                    [
                        'tr_name' => 'bail|min:3|max:30|unique:trademarks,tr_name',
                        'tr_logo' => 'bail|image',
                    ],
                    [
                        'tr_name.min' => 'Tên không được nhỏ hơn 3 ký tự',
                        'tr_name.max' => 'Tên dài tối đa 30 ký tự',
                        'tr_name.unique' => 'Thương hiệu đã tồn tại',
                        'tr_logo.image' => 'Ảnh không đúng định dang! ',
                    ],
                );
            }

            if ($data->fails()) {
                return response()->json([
                    'code' => 200,
                    'tr_name' => $data->errors()->get('tr_name'),
                    'tr_logo' => $data->errors()->get('tr_logo'),

                ], 200);
            } else {
                $update_trademark = Trademark::find($id);
                if ($request->tr_name == "") {
                    if ($request->hasFile('tr_logo')) {
                        $file = $request->file('tr_logo');
                        $file_name = $file->getClientOriginalName();
                        $name_random = rand(1000000000000, 9999999999999) . '_' . $file_name;

                        $file->move("./image/Image_Thuonghieu", $name_random);
                        $update_trademark->tr_logo = "/image/Image_Thuonghieu/$name_random";
                    }
                    $update_trademark->tr_desc = $request->tr_desc;
                    $update_trademark->update();
                } else {

                    $slug = Str::slug($request->tr_name);
                    $update_trademark->tr_name = $request->tr_name;
                    $update_trademark->tr_slug = $slug;
                    $update_trademark->tr_desc = $request->tr_desc;
                    if ($request->hasFile('tr_logo')) {
                        $file = $request->file('tr_logo');
                        $file_name = $file->getClientOriginalName();
                        $name_random = rand(1000000000000, 9999999999999) . '_' . $file_name;

                        $file->move("./image/Image_Thuonghieu", $name_random);
                        $update_trademark->tr_logo = "/image/Image_Thuonghieu/$name_random";
                    }
                    $update_trademark->update();
                }

                return response()->json([
                    'code' => 300,
                ], 200);
            }
        }
    }


    //xoa thương hiệu san pham

    public function delete_trademark($id)
    {
        if (request()->ajax()) {
            $delete_trademark = Trademark::find($id);
            $delete_trademark->delete();

            $all_trademark = Trademark::all();

            $all = count($all_trademark);
            $list_trademark  = Trademark::orderBy('id', 'desc')->simplepaginate(20);
            $new_list_trademark = view('backend.trademark.child_list', compact('list_trademark'))->render();
            return response()->json([
                'all' => $all,
                'new_list_trademark' => $new_list_trademark,
            ], 200);
        }
    }
}
