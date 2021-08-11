<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Product;
use App\Rate;
use App\Trademark;
use Illuminate\Support\Facades\Validator;

class Home_Controller extends Controller
{
    //Trang chu

    public function home()
    {
        $product_male =  Product::where(['pro_category_id' => '1', 'pro_status' => '1'])->orderBy('pro_hot', 'desc')->paginate(8);
        $product_female =  Product::where(['pro_category_id' => '2', 'pro_status' => '1'])->orderBy('pro_hot', 'desc')->paginate(8);
        $cart = session()->get('cart');
        return view('frontend.home.index', compact('product_male', 'product_female', 'cart'));
    }
    /////////////////////////////////////////////////////////////////////

    //////////////////////////////////////////////////////////////////////

    public function search(Request $request)
    {
        $key  =  $request->keys;
        $number = 20;
        $search = DB::table('products')
            ->join('trademarks', 'trademarks.id', '=', 'products.pro_trademark_id')
            ->join('categories', 'categories.id', '=', 'products.pro_category_id')
            ->where(function ($query) use ($key) {
                $query->where('tr_name', 'like', '%' . $key . '%')->orwhere('pro_code', 'like', '%' . $key . '%')
                    ->orwhere('pro_machine_type', 'like', '%' . $key . '%')->orwhere('pro_rope_material', 'like', '%' . $key . '%')
                    ->orwhere('pro_glass_material', 'like', '%' . $key . '%');
            })
            ->select('products.*', 'categories.c_slug', 'trademarks.tr_name')
            ->where('pro_status', '1');

        $all =     $search->get();
        $search = $search->paginate($number);
        $cart = session()->get('cart');
        return view('frontend.layout.search', compact('search', 'key', 'cart', 'all', 'key'));
    }


    public function search_sort(Request $request)
    {
        if(request()->ajax()){
            $key  =  $request->keys;
           
           
            $search = DB::table('products')
                ->join('trademarks', 'trademarks.id', '=', 'products.pro_trademark_id')
                ->join('categories', 'categories.id', '=', 'products.pro_category_id')
                ->where(function ($query) use ($key) {
                    $query->where('tr_name', 'like', '%' . $key . '%')->orwhere('pro_code', 'like', '%' . $key . '%')
                        ->orwhere('pro_machine_type', 'like', '%' . $key . '%')->orwhere('pro_rope_material', 'like', '%' . $key . '%')
                        ->orwhere('pro_glass_material', 'like', '%' . $key . '%');
                })->where('pro_status', '1')
                ->select('products.*', 'categories.c_slug', 'trademarks.tr_name');
            if ($request->has('key')) {
                $keys = $request->key;
                if ($keys == 'min_price') {
                    $search->orderBy('pro_price', 'asc');
                }
                if ($keys == 'max_price') {
                    $search->orderBy('pro_price', 'desc');
                }
                if ($keys == 'hot_sell') {
                    $search->orderBy('pro_amount_sell', 'desc');
                }
            }
            $number = 20;
            if($request->has('num')){
                $number += $request->num;
            }
            $all =     $search->get();
            $search = $search->paginate($number);
            $abc =  view('frontend.layout.child_search', compact('search','all'))->render();
            return response()->json([
                'abc' => $abc,
            ], 200);
        }
       
    }
}
