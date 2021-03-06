<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Image;
use App\Product;
use App\Trademark;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Product_Controller extends Controller
{
    use SoftDeletes;

    public function list_product()
    {

        $list_product  = Product::orderBy('id', 'desc')->simplepaginate(20);
        $all_product = Product::all();
        return view('backend\product\list', compact('list_product', 'all_product'));
    }

    public function sort_product(Request $request)
    {
        if (request()->ajax()) {
            $keys = $request->key;
            if ($keys === 'new') {
                $list_product  = Product::orderBy('id', 'desc')->simplepaginate(20);
            }
            if ($keys === 'old') {
                $list_product  = Product::orderBy('id', 'asc')->simplepaginate(20);
            }
            if ($keys === 'abc_asc') {
                $list_product  = Product::orderBy('pro_code', 'asc')->simplepaginate(20);
            }
            if ($keys === 'abc_desc') {
                $list_product  = Product::orderBy('pro_code', 'desc')->simplepaginate(20);
            }
            if ($keys === 'hot_sell') {
                $list_product  = Product::orderBy('pro_amount_sell', 'desc')->simplepaginate(20);
            }
            if ($keys === 'hot') {
                $list_product  = Product::orderBy('pro_hot', 'desc')->simplepaginate(20);
            }
            $abc = view('backend.product.child_list', compact('list_product'))->render();
            return response()->json([
                'abc' => $abc,
            ], 200);
        }
    }

    public function live_search_product(Request $request)
    {
        $keys = $request->key;
        if ($keys == "") {
            $list_product  = Product::orderBy('id', 'desc')->simplepaginate(20);
        } else {
            $list_product  = Product::where('created_at', 'like', '%' . $keys . '%')
                ->orwhere('pro_amount_sell', 'like', '%' . $keys . '%')
                ->orwhere('pro_code', 'like', '%' . $keys . '%')
                ->orderBy('id', 'desc')->simplepaginate(20);
        }
        $live_search_product = view('backend.product.child_list', compact('list_product'))->render();
        return response()->json([
            'live_search_product' => $live_search_product,
        ], 200);
    }


    public function show_hide_product($id)
    {
        if (request()->ajax()) {
            $show_hide = Product::find($id);
            $show_hide->pro_status = !$show_hide->pro_status;
            $show_hide->save();
            $show_hide = Product::find($id);
            $hide = $show_hide->pro_status;
            return response()->json([
                'hide' => $hide,
            ], 200);
        }
    }

    public function show_hot_product($id)
    {
        if (request()->ajax()) {
            $show_hot = Product::find($id);
            $show_hot->pro_hot = !$show_hot->pro_hot;
            $show_hot->save();
            $show_hot = Product::find($id);
            $hot = $show_hot->pro_hot;
            return response()->json([
                'hot' => $hot,
            ], 200);
        }
    }

    public function create_product()
    {
        $list_category = Category::all();
        $list_trademark = Trademark::all();
        return view('backend.product.create', compact('list_category', 'list_trademark'));
    }

    public function post_create_product(Request $request)
    {
        $data = Validator::make(
            $request->all(),
            [
                'pro_code' => 'bail|required|unique:products,pro_code|min:5|max:50',
                'pro_category_id' => 'bail|required|numeric|',
                'pro_trademark_id' => 'bail|required|numeric',
                'pro_source' => 'bail|required',
                'pro_manufacturing' => 'bail|required',
                'pro_machine_type' => 'bail|required',
                'pro_size' => 'bail|required',
                'pro_thickness' => 'bail|required',
                'pro_shell_material' => 'bail|required',
                'pro_rope_material' => 'bail|required',
                'pro_glass_material' => 'bail|required',
                'pro_waterproof' => 'bail|required|numeric',
                'pro_function' => 'bail|required|min:3|max:100',
                'pro_guarantee' => 'bail|required|min:3|max:50',
                'pro_gender' => 'bail|required',
                'pro_hot' => 'bail|required',
                'pro_price_entry' => 'bail|required|numeric',
                'pro_price' => 'bail|required|numeric',
                'pro_sale' => 'bail|required|numeric',
                'pro_amount' => 'bail|required|numeric',
                'pro_image' => 'bail|required|max:5',
                'pro_image.*' => 'bail|image',
                'pro_desc' => 'bail|required|min:10',
            ],
            [
                'pro_code.required' => 'Vui l??ng nh???p m?? s???n ph???m',
                'pro_code.unique' => 'M?? s???n ph???m ???? t???n t???i',
                'pro_code.min' => '??t nh???t  5 k?? t???',
                'pro_code.max' => 'T???i ??a 50 k?? t???',
                'pro_category_id.required' => 'Vui l??ng ch???n danh m???c',
                'pro_category_id.numeric' => 'Ch??? ???????c nh???p s???',
                'pro_trademark_id.required' => 'Vui l??ng ch???n th????ng hi???u',
                'pro_trademark_id.numeric' => 'Ch??? ???????c nh???p s???',
                'pro_source.required' => 'Vui l??ng ch???n ngu???n g???c',
                'pro_manufacturing.required' => 'Vui l??ng ch???n n??i s???n xu???t',
                'pro_machine_type.required' => 'Vui l??ng ch???n ki???u m??y',
                'pro_size.required' => 'Vui l??ng nh???p k??ch c???',
                'pro_thickness.required' => 'Vui l??ng nh???p ????? d??y',
                'pro_shell_material.required' => 'Vui l??ng ch???n ch???t li???u v???',
                'pro_rope_material.required' => 'Vui l??ng ch???n ch???t li???u d??y',
                'pro_glass_material.required' => 'Vui l??ng ch???n ch???t li???u k??nh',
                'pro_waterproof.required' => 'Vui l??ng ch???n ????? ch???ng n?????c',
                'pro_waterproof.numeric' => 'Ch??? ???????c nh???p s???',
                'pro_function.required' => 'Vui l??ng nh???p ch???c n??ng',
                'pro_function.min' => '??t nh???t 3 k?? t???',
                'pro_function.max' => 'T???i ??a 100 k?? t???',
                'pro_guarantee.required' => 'Vui l??ng nh???p b???o h??nh',
                'pro_guarantee.min' => '??t nh???t 3 k?? t???',
                'pro_guarantee.max' => 'T???i ??a 50 k?? t???',
                'pro_gender.required' => 'Vui l??ng ch???n gi???i t??nh',
                'pro_hot.required' => 'Vui l??ng ch???n hot',
                'pro_price_entry.required' => 'Vui l??ng nh???p gi?? nh???p',
                'pro_price_entry.numeric' => 'Ch??? ???????c nh???p s???',
                'pro_sale.required' => 'Vui l??ng nh???p gi?? khuy???n m??i',
                'pro_sale.numeric' => 'Ch??? ???????c nh???p s???',
                'pro_price.required' => 'Vui l??ng nh???p gi?? b??n',
                'pro_price.numeric' => 'Ch??? ???????c nh???p s???',
                'pro_amount.required' => 'Vui l??ng nh???p s??? l?????ng',
                'pro_amount.numeric' => 'Ch??? ???????c nh???p s???',
                'pro_image.required' => 'Vui ??ng ch???n ???nh',
                'pro_image.max' => 'T???i ??a 5 ???nh',
                'pro_image.*.image' => 'C?? ???nh kh??ng ????ng ?????nh d???ng',
                'pro_desc.required' => 'Vui l??ng nh???p m?? t???',
                'pro_desc.min' => '??t nh???t 10 k?? t???',
            ]
        );

        if ($data->fails()) {
            return response()->json([
                'code' => 200,
                'pro_code' => $data->errors()->get('pro_code'),
                'pro_category_id' => $data->errors()->get('pro_category_id'),
                'pro_trademark_id' => $data->errors()->get('pro_trademark_id'),
                'pro_source' => $data->errors()->get('pro_source'),
                'pro_manufacturing' => $data->errors()->get('pro_manufacturing'),
                'pro_machine_type' => $data->errors()->get('pro_machine_type'),
                'pro_size' => $data->errors()->get('pro_size'),
                'pro_thickness' => $data->errors()->get('pro_thickness'),
                'pro_shell_material' => $data->errors()->get('pro_shell_material'),
                'pro_rope_material' => $data->errors()->get('pro_rope_material'),
                'pro_glass_material' => $data->errors()->get('pro_glass_material'),
                'pro_waterproof' => $data->errors()->get('pro_waterproof'),
                'pro_function' => $data->errors()->get('pro_function'),
                'pro_guarantee' => $data->errors()->get('pro_guarantee'),
                'pro_gender' => $data->errors()->get('pro_gender'),
                'pro_hot' => $data->errors()->get('pro_hot'),
                'pro_price_entry' => $data->errors()->get('pro_price_entry'),
                'pro_price' => $data->errors()->get('pro_price'),
                'pro_amount' => $data->errors()->get('pro_amount'),
                'pro_desc' => $data->errors()->get('pro_desc'),
                'pro_sale' => $data->errors()->get('pro_sale'),
                'pro_image' => $data->errors()->get('pro_image'),
                'pro_image1' => $data->errors()->get('pro_image.*'),
            ], 200);
        } else {
            $product  = new Product();
            $product->pro_code = $request->pro_code;
            $slug = Str::slug($request->pro_code);
            $product->pro_slug = $slug;
            $product->pro_category_id = $request->pro_category_id;
            $product->pro_trademark_id = $request->pro_trademark_id;
            $product->pro_user_id = Auth::id();
            $product->pro_source = $request->pro_source;
            $product->pro_manufacturing = $request->pro_manufacturing;
            $product->pro_size = $request->pro_size;
            $product->pro_machine_type = $request->pro_machine_type;
            $product->pro_thickness = $request->pro_thickness;
            $product->pro_shell_material = $request->pro_shell_material;
            $product->pro_rope_material = $request->pro_rope_material;
            $product->pro_glass_material = $request->pro_glass_material;
            $product->pro_waterproof = $request->pro_waterproof;
            $product->pro_function = $request->pro_function;
            $product->pro_guarantee = $request->pro_guarantee;
            $product->pro_gender = $request->pro_gender;
            $product->pro_hot = $request->pro_hot;
            $product->pro_price_entry = $request->pro_price_entry;
            $product->pro_price = $request->pro_price;
            $product->pro_sale = $request->pro_sale;
            $product->pro_amount = $request->pro_amount;
            $product->pro_desc = $request->pro_desc;
            $product->save();
            $id = $product->id;
            if ($request->hasFile('pro_image')) {
                foreach ($request->file('pro_image') as $file) {
                    $image = new Image;
                    if (isset($file)) {
                        $file_name = $file->getClientOriginalName();
                        $extension = $file->getClientOriginalExtension();
                        $name_random = $slug . '_' . rand(1000000, 9999999) . '.' . $extension;
                        $file->move("./image/Image_Product", $name_random);
                        $image->img_product_id = $id;
                        $image->img_name = $name_random;
                        $image->img_file_path = "/image/Image_Product/$name_random";
                        $image->save();
                    }
                }
            }
            return response()->json([
                'code' => 300,
            ], 200);
        }
    }


    public function update_product($id)
    {
        $list_category = Category::all();
        $list_trademark = Trademark::all();
        $update_product  = Product::with('Image')->find($id);
        return view('backend\product\update', compact('update_product', 'list_category', 'list_trademark'));
    }


    public function post_update_product($id, Request $request)
    {
        if (request()->ajax()) {
            if ($request->pro_code == "") {
                $data = Validator::make(
                    $request->all(),
                    [
                        'pro_category_id' => 'bail|required|numeric|',
                        'pro_guarantee' => 'bail|required|min:3|max:50',
                        'pro_price' => 'bail|required|numeric',
                        'pro_sale' => 'bail|required|numeric',
                        'pro_amount' => 'bail|required|numeric',
                        'pro_image.*' => 'bail|image',
                        'pro_desc' => 'bail|required|min:10',
                    ],
                    [
                        'pro_category_id.required' => 'Vui l??ng ch???n danh m???c',
                        'pro_category_id.numeric' => 'Ch??? ???????c nh???p s???',
                        'pro_guarantee.required' => 'Vui l??ng nh???p b???o h??nh',
                        'pro_guarantee.min' => '??t nh???t 3 k?? t???',
                        'pro_guarantee.max' => 'T???i ??a 50 k?? t???',
                        'pro_sale.required' => 'Vui l??ng nh???p gi?? khuy???n m??i',
                        'pro_sale.numeric' => 'Ch??? ???????c nh???p s???',
                        'pro_price.required' => 'Vui l??ng nh???p gi?? b??n',
                        'pro_price.numeric' => 'Ch??? ???????c nh???p s???',
                        'pro_amount.required' => 'Vui l??ng nh???p s??? l?????ng',
                        'pro_amount.numeric' => 'Ch??? ???????c nh???p s???',
                        'pro_image.*.image' => 'C?? ???nh kh??ng ????ng ?????nh d???ng',
                        'pro_desc.required' => 'Vui l??ng nh???p m?? t???',
                        'pro_desc.min' => '??t nh???t 10 k?? t???',
                    ]
                );
            } else {
                $data = Validator::make(
                    $request->all(),
                    [
                        'pro_code' => 'bail|required|unique:products,pro_code|min:5|max:20',
                        'pro_category_id' => 'bail|required|numeric|',
                        'pro_guarantee' => 'bail|required|min:3|max:50',
                        'pro_price' => 'bail|required|numeric',
                        'pro_sale' => 'bail|required|numeric',
                        'pro_amount' => 'bail|required|numeric',
                        'pro_image.*' => 'bail|image',
                        'pro_desc' => 'bail|required|min:10',
                    ],
                    [
                        'pro_code.required' => 'Vui l??ng nh???p m?? s???n ph???m',
                        'pro_code.unique' => 'M?? s???n ph???m ???? t???n t???i',
                        'pro_code.min' => '??t nh???t  5 k?? t???',
                        'pro_code.max' => 'T???i ??a 20 k?? t???',
                        'pro_category_id.required' => 'Vui l??ng ch???n danh m???c',
                        'pro_category_id.numeric' => 'Ch??? ???????c nh???p s???',
                        'pro_guarantee.required' => 'Vui l??ng nh???p b???o h??nh',
                        'pro_guarantee.min' => '??t nh???t 3 k?? t???',
                        'pro_guarantee.max' => 'T???i ??a 50 k?? t???',
                        'pro_sale.required' => 'Vui l??ng nh???p gi?? khuy???n m??i',
                        'pro_sale.numeric' => 'Ch??? ???????c nh???p s???',
                        'pro_price.required' => 'Vui l??ng nh???p gi?? b??n',
                        'pro_price.numeric' => 'Ch??? ???????c nh???p s???',
                        'pro_amount.required' => 'Vui l??ng nh???p s??? l?????ng',
                        'pro_amount.numeric' => 'Ch??? ???????c nh???p s???',
                        'pro_image.*.image' => 'C?? ???nh kh??ng ????ng ?????nh d???ng',
                        'pro_desc.required' => 'Vui l??ng nh???p m?? t???',
                        'pro_desc.min' => '??t nh???t 10 k?? t???',
                    ]
                );
            };

            if ($data->fails()) {
                return response()->json([
                    'code' => 200,
                    'pro_code' => $data->errors()->get('pro_code'),
                    'pro_category_id' => $data->errors()->get('pro_category_id'),
                    'pro_guarantee' => $data->errors()->get('pro_guarantee'),
                    'pro_price' => $data->errors()->get('pro_price'),
                    'pro_sale' => $data->errors()->get('pro_sale'),
                    'pro_amount' => $data->errors()->get('pro_amount'),
                    'pro_desc' => $data->errors()->get('pro_desc'),
                    'pro_image1' => $data->errors()->get('pro_image.*'),
                ], 200);
            } else {
                $update_product = Product::with('Trademark')->with('Category')->find($id);
                if ($request->pro_code == "") {
                    $update_product->pro_category_id = $request->pro_category_id;
                    $update_product->pro_guarantee = $request->pro_guarantee;
                    $update_product->pro_price = $request->pro_price;
                    $update_product->pro_sale = $request->pro_sale;
                    $update_product->pro_amount = $request->pro_amount;
                    $update_product->pro_desc = $request->pro_desc;
                    $update_product->save();
                    $id = $update_product->id;
                    if ($request->hasFile('pro_image')) {
                        $image = Image::where('img_product_id', $id)->get();
                        foreach ($image as $img) {
                            $img->delete();
                        }
                        foreach ($request->file('pro_image') as $file) {
                            $image = new Image;
                            if (isset($file)) {
                                $file_name = $file->getClientOriginalName();
                                $extension = $file->getClientOriginalExtension();
                                $name_random = $update_product->pro_slug . '_' . rand(1000000, 9999999) . '.' . $extension;
                                $file->move("./image/Image_Product", $name_random);
                                $image->img_product_id = $id;
                                $image->img_name = $name_random;
                                $image->img_file_path = "/image/Image_Product/$name_random";
                                $image->save();
                            }
                        }
                    }
                } else {
                    $update_product->pro_code = $request->pro_code;
                    $slug = Str::slug($request->pro_code);
                    $update_product->pro_slug = $slug;
                    $update_product->pro_category_id = $request->pro_category_id;
                    $update_product->pro_guarantee = $request->pro_guarantee;
                    $update_product->pro_price = $request->pro_price;
                    $update_product->pro_sale = $request->pro_sale;
                    $update_product->pro_amount = $request->pro_amount;
                    $update_product->pro_desc = $request->pro_desc;
                    $update_product->save();
                    $id = $update_product->id;
                    if ($request->hasFile('pro_image')) {
                        $image = Image::where('img_product_id', $id)->get();
                        foreach ($image as $img) {
                            $img->delete();
                        }
                        foreach ($request->file('pro_image') as $file) {
                            $image = new Image;
                            if (isset($file)) {
                                $file_name = $file->getClientOriginalName();
                                $extension = $file->getClientOriginalExtension();
                                $name_random = $update_product->pro_slug . '_' . rand(1000000, 9999999) . '.' . $extension;
                                $file->move("./image/Image_Product", $name_random);
                                $image->img_product_id = $id;
                                $image->img_name = $name_random;
                                $image->img_file_path = "/image/Image_Product/$name_random";
                                $image->save();
                            }
                        }
                    }
                }
                return response()->json([
                    'code' => 300,
                ], 200);
            }
        }
    }


    public function delete_product($id)
    {
        if (request()->ajax()) {
            $delete_product = Product::find($id);
            $delete_product->delete();

            $list_product  = Product::orderBy('id', 'desc')->simplepaginate(20);
            $new_list_product = view('backend.product.child_list', compact('list_product'))->render();

            $all_product = Product::all();
            $all = count($all_product);
            return response()->json([
                'all' => $all,
                'new_list_product' => $new_list_product,
            ], 200);
        }
    }
}
