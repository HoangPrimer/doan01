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

    
    function paginate(Request $request)
    {
        if ($request->ajax()) {
            $keys = $request->key;
            if ($keys === 'new') {
                $list_product  = Product::orderBy('id', 'desc')->simplepaginate(20);
                return view('backend.product.child_list', compact('list_product'))->render();
            }
            if ($keys === 'old') {
                $list_product  = Product::orderBy('id', 'asc')->simplepaginate(20);
                return view('backend.product.child_list', compact('list_product'))->render();
            }
            if ($keys === 'abc_asc') {
                $list_product  = Product::orderBy('pro_code', 'asc')->simplepaginate(20);
                return view('backend.product.child_list', compact('list_product'))->render();
            }
            if ($keys === 'abc_desc') {
                $list_product  = Product::orderBy('pro_code', 'desc')->simplepaginate(20);
                return view('backend.product.child_list', compact('list_product'))->render();
            }
            if ($keys === 'hot_sell') {
                $list_product  = Product::orderBy('pro_amount_sell', 'desc')->simplepaginate(20);
                return view('backend.product.child_list', compact('list_product'))->render();
            }
            if ($keys === 'hot') {
                $list_product  = Product::orderBy('pro_hot', 'desc')->simplepaginate(20);
                return view('backend.product.child_list', compact('list_product'))->render();
            }
           
        }
    }

    public function sort_product( Request $request )
    {
        if (request()->ajax()) {
            $keys = $request-> key;
            if ($keys === 'new') {
                $list_product  = Product::orderBy('id', 'desc')->simplepaginate(20);
                $abc =  view('backend.product.child_list', compact('list_product'))->render();
            }
            if ($keys === 'old') {
                $list_product  = Product::orderBy('id', 'asc')->simplepaginate(20);
                $abc = view('backend.product.child_list', compact('list_product'))->render();
            }
            if ($keys === 'abc_asc') {
                $list_product  = Product::orderBy('pro_code', 'asc')->simplepaginate(20);
                $abc = view('backend.product.child_list', compact('list_product'))->render();
            }
            if ($keys === 'abc_desc') {
                $list_product  = Product::orderBy('pro_code', 'desc')->simplepaginate(20);
                $abc =  view('backend.product.child_list', compact('list_product'))->render();
            }
            if ($keys === 'hot_sell') {
                $list_product  = Product::orderBy('pro_amount_sell', 'desc')->simplepaginate(20);
                $abc = view('backend.product.child_list', compact('list_product'))->render();
            }
            if ($keys === 'hot') {
                $list_product  = Product::orderBy('pro_hot', 'desc')->simplepaginate(20);
                $abc = view('backend.product.child_list', compact('list_product'))->render();
            }
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
            $live_search_product = view('backend.product.child_list', compact('list_product'))->render();
            return response()->json([
                'live_search_product' => $live_search_product,
            ], 200);
        } else {
            $list_product  = Product::where('created_at', 'like', '%' . $keys . '%')
                ->orwhere('pro_amount_sell', 'like', '%' . $keys . '%')
                ->orwhere('pro_code', 'like', '%' . $keys . '%')
                ->orderBy('id','desc')->simplepaginate(20);
            $live_search_product = view('backend.product.child_list', compact('list_product'))->render();
            return response()->json([
                'live_search_product' => $live_search_product,
            ], 200);
        }
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
                'pro_source' => 'bail|required|min:2|max:25',
                'pro_manufacturing' => 'bail|required|min:2|max:25',
                'pro_machine_type' => 'bail|required',
                'pro_size' => 'bail|required',
                'pro_thickness' => 'bail|required',
                'pro_shell_material' => 'bail|required|min:3|max:30',
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
                'pro_code.required' => 'Vui lòng nhập mã sản phẩm',
                'pro_code.unique' => 'Mã sản phẩm đã tồn tại',
                'pro_code.min' => 'Ít nhất  5 ký tự',
                'pro_code.max' => 'Tối đa 50 ký tự',
                'pro_category_id.required' => 'Vui lòng chọn danh mục',
                'pro_category_id.numeric' => 'Chỉ được nhập số',
                'pro_trademark_id.required' => 'Vui lòng chọn thương hiệu',
                'pro_trademark_id.numeric' => 'Chỉ được nhập số',
                'pro_source.min' => 'Ít nhất  2 ký tự',
                'pro_source.max' => 'Tối đa 25 ký tự',
                'pro_source.required' => 'Vui lòng nhập nguồn gốc',
                'pro_manufacturing.min' => 'Ít nhất  2 ký tự',
                'pro_manufacturing.max' => 'Tối đa 25 ký tự',
                'pro_manufacturing.required' => 'Vui lòng nhập nơi sản xuất',
                'pro_machine_type.required' => 'Vui lòng chọn kiểu máy',
                'pro_size.required' => 'Vui lòng nhập kích cỡ',
                'pro_thickness.required' => 'Vui lòng nhập độ dày',
                'pro_shell_material.required' => 'Vui lòng nhập chất liệu vỏ',
                'pro_shell_material.min' => 'Ít nhất 3 ký tự',
                'pro_shell_material.max' => 'Tối đa 30 ký tự',
                'pro_rope_material.required' => 'Vui lòng chọn chất liệu dây',
                'pro_glass_material.required' => 'Vui lòng chọn chất liệu kính',
                'pro_waterproof.required' => 'Vui lòng nhập độ chịu nước',
                'pro_waterproof.numeric' => 'Chỉ được nhập số',
                'pro_function.required' => 'Vui lòng nhập chức năng',
                'pro_function.min' => 'Ít nhất 3 ký tự',
                'pro_function.max' => 'Tối đa 100 ký tự',
                'pro_guarantee.required' => 'Vui lòng nhập bảo hành',
                'pro_guarantee.min' => 'Ít nhất 3 ký tự',
                'pro_guarantee.max' => 'Tối đa 50 ký tự',
                'pro_gender.required' => 'Vui lòng chọn giới tính',
                'pro_hot.required' => 'Vui lòng chọn hot',
                'pro_price_entry.required' => 'Vui lòng nhập giá nhập',
                'pro_price_entry.numeric' => 'Chỉ được nhập số',
                'pro_sale.required' => 'Vui lòng nhập giá khuyến mãi',
                'pro_sale.numeric' => 'Chỉ được nhập số',
                'pro_price.required' => 'Vui lòng nhập giá bán',
                'pro_price.numeric' => 'Chỉ được nhập số',
                'pro_amount.required' => 'Vui lòng nhập số lượng',
                'pro_amount.numeric' => 'Chỉ được nhập số',
                'pro_image.required' => 'Vui òng chọn ảnh',
                'pro_image.max' => 'Tối đa 5 ảnh',
                'pro_image.*.image' => 'Có ảnh không đúng định dạng',
                'pro_desc.required' => 'Vui lòng nhập mô tả',
                'pro_desc.min' => 'ít nhất 10 ký tự',
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
                        'pro_category_id.required' => 'Vui lòng chọn danh mục',
                        'pro_category_id.numeric' => 'Chỉ được nhập số',
                        'pro_guarantee.required' => 'Vui lòng nhập bảo hành',
                        'pro_guarantee.min' => 'Ít nhất 3 ký tự',
                        'pro_guarantee.max' => 'Tối đa 50 ký tự',
                        'pro_sale.required' => 'Vui lòng nhập giá khuyến mãi',
                        'pro_sale.numeric' => 'Chỉ được nhập số',
                        'pro_price.required' => 'Vui lòng nhập giá bán',
                        'pro_price.numeric' => 'Chỉ được nhập số',
                        'pro_amount.required' => 'Vui lòng nhập số lượng',
                        'pro_amount.numeric' => 'Chỉ được nhập số',
                        'pro_image.*.image' => 'Có ảnh không đúng định dạng',
                        'pro_desc.required' => 'Vui lòng nhập mô tả',
                        'pro_desc.min' => 'ít nhất 10 ký tự',
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
                        'pro_code.required' => 'Vui lòng nhập mã sản phẩm',
                        'pro_code.unique' => 'Mã sản phẩm đã tồn tại',
                        'pro_code.min' => 'Ít nhất  5 ký tự',
                        'pro_code.max' => 'Tối đa 20 ký tự',
                        'pro_category_id.required' => 'Vui lòng chọn danh mục',
                        'pro_category_id.numeric' => 'Chỉ được nhập số',
                        'pro_guarantee.required' => 'Vui lòng nhập bảo hành',
                        'pro_guarantee.min' => 'Ít nhất 3 ký tự',
                        'pro_guarantee.max' => 'Tối đa 50 ký tự',
                        'pro_sale.required' => 'Vui lòng nhập giá khuyến mãi',
                        'pro_sale.numeric' => 'Chỉ được nhập số',
                        'pro_price.required' => 'Vui lòng nhập giá bán',
                        'pro_price.numeric' => 'Chỉ được nhập số',
                        'pro_amount.required' => 'Vui lòng nhập số lượng',
                        'pro_amount.numeric' => 'Chỉ được nhập số',
                        'pro_image.*.image' => 'Có ảnh không đúng định dạng',
                        'pro_desc.required' => 'Vui lòng nhập mô tả',
                        'pro_desc.min' => 'ít nhất 10 ký tự',
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
                'all'=>$all,
                'new_list_product' => $new_list_product,
            ], 200);
        }
    }
}