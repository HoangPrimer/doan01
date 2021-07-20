<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;


class Category_Product_Controller extends Controller
{
    public function list_product($id)
    {
        $category = Category::where('c_slug', $id)->get();
        foreach ($category as $category) {
            $id = $category->id;
        }
        $product = Product::where('pro_category_id', $id)->where('pro_status', '1')->paginate(15);
        $category_desc = Category::find($id);
        $cart = session()->get('cart');

        return view('frontend.product.product', compact('cart', 'product', 'category_desc', 'id'));
    }
    public function fillter(Request $request)
    {
        if (request()->ajax()) {
            $id = $request->id;
            $product = Product::where('pro_category_id', $id)->where('pro_status', '1');

            if ($request->has('trademark')) {
                $trademark = implode(",", $request->trademark);
                $product->whereRaw('pro_trademark_id IN (' . $trademark . ') ');
            }
            if ($request->has('clday')) {
                $clday = $request->clday;
                $product->whereIn('pro_rope_material', $clday);
            }
            if ($request->has('may')) {
                $may =  $request->may;
                $product->whereIn('pro_machine_type', $may);
            }
            if ($request->has('kichco')) {
                $kichco =  $request->kichco;
                switch ($kichco) {
                    case '1':
                        $product->where('pro_size', '<', '30');
                        break;
                    case '2':
                        $product->whereBetween('pro_size', [30,34]);
                        break;
                    case '3':
                        $product->whereBetween('pro_size', [35,39]);
                        break;
                    case '4':
                        $product->whereBetween('pro_size', [40,43]);
                        break;
                    case '5':
                        $product->where('pro_size', '>', '43');
                        break;
                }
            }

            $product = $product->orderBy('id', 'desc')->paginate(50);

            return view('frontend.product.child_product', compact('product'))->render();
        }
    }

    function sort(Request $request)
    {
        if ($request->ajax()) {
            $keys = $request->key;
            $id = $request->id;
            if ($keys === 'new') {
                $product = Product::where('pro_category_id', $id)->where('pro_status', '1')->orderBy('id', 'desc')->paginate(15);
                $abc = view('frontend.product.child_product', compact('product'))->render();
            }
            if ($keys === 'old') {
                $product = Product::where('pro_category_id', $id)->where('pro_status', '1')->orderBy('id', 'asc')->paginate(15);
                $abc = view('frontend.product.child_product', compact('product'))->render();
            }
            if ($keys === 'hot') {
                $product = Product::where('pro_category_id', $id)->where('pro_status', '1')->orderBy('pro_hot', 'desc')->paginate(15);
                $abc = view('frontend.product.child_product', compact('product'))->render();
            }
            if ($keys === 'min_price') {
                $product = Product::where('pro_category_id', $id)->where('pro_status', '1')->orderBy('pro_price', 'asc')->paginate(15);
                $abc = view('frontend.product.child_product', compact('product'))->render();
            }
            if ($keys === 'max_price') {
                $product = Product::where('pro_category_id', $id)->where('pro_status', '1')->orderBy('pro_price', 'desc')->paginate(15);
                $abc = view('frontend.product.child_product', compact('product'))->render();
            }
            return response()->json([
                'abc' => $abc,
            ], 200);
        }
    }
    public function sort_category_product(Request $request)
    {
        if (request()->ajax()) {
            $key = $request->key;
            $id = $request->id;
            if ($key == 'new') {
                $product = Product::where('pro_category_id', $id)->where('pro_status', '1')->orderBy('id', 'desc')->paginate(15);
                $abc = view('frontend.product.child_product', compact('product'))->render();
            }
            if ($key == 'old') {
                $product = Product::where('pro_category_id', $id)->where('pro_status', '1')->orderBy('id', 'asc')->paginate(15);
                $abc = view('frontend.product.child_product', compact('product'))->render();
            }
            if ($key == 'hot') {
                $product = Product::where('pro_category_id', $id)->where('pro_status', '1')->orderBy('pro_hot', 'desc')->paginate(15);
                $abc = view('frontend.product.child_product', compact('product'))->render();
            }
            if ($key == 'min_price') {
                $product = Product::where('pro_category_id', $id)->where('pro_status', '1')->orderBy('pro_price', 'asc')->paginate(15);
                $abc = view('frontend.product.child_product', compact('product'))->render();
            }
            if ($key == 'max_price') {
                $product = Product::where('pro_category_id', $id)->where('pro_status', '1')->orderBy('pro_price', 'desc')->paginate(15);
                $abc = view('frontend.product.child_product', compact('product'))->render();
            }
            return response()->json([
                'abc' => $abc,
            ], 200);
        }
    }

    public function search_category_product(Request $request)
    {
        if (request()->ajax()) {

            $key = $request->key;
            $id = $request->id;
            if ($key == "") {
                $product = Product::where('pro_category_id', $id)->where('pro_status', '1')->paginate(15);
                $abc = view('frontend.product.child_product', compact('product'))->render();
            } else {
                $product = Product::where('pro_category_id', $id)->where('pro_hot', '1')
                    ->where('pro_code', 'like', '%' . $key . '%')->orwhere('pro_size', 'like', '%' . $key . '%')
                    ->orwhere('pro_gender', 'like', '%' . $key . '%')->orwhere('pro_price', 'like', '%' . $key . '%')
                    ->orwhere('pro_sale', 'like', '%' . $key . '%')->orderBy('id', 'desc')->paginate(15);

                $abc = view('frontend.product.child_product', compact('product'))->render();
            }
            return response()->json([
                'code' => 200,
                'abc' => $abc,
            ], 200);
        }
    }
}
