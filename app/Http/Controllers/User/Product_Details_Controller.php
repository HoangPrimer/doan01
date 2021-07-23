<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Rate;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Product_Details_Controller extends Controller
{
    public function index($category, $id)
    {
        $product = Product::find($id);
        $star = Rate::where('r_product_id', $id)->avg('r_star');

        $ratingDetails = Rate::groupBy('r_star')
            ->where('r_product_id', $id)
            ->select(DB::raw('count(r_star) as total'), DB::raw('sum(r_star) as sum'))
            ->addSelect('r_star')->get()->toArray();

        $arrayRatings = [];
        if (!empty($ratingDetails)) {
            for ($i = 1; $i <= 5; $i++) {
                $arrayRatings[$i] = [

                    "total" => 0,
                    "sum" => 0,
                    "star" => 0
                ];
                foreach ($ratingDetails as $item) {
                    if ($item['r_star']  == $i) {
                        $arrayRatings[$i] = $item;
                    }
                }
            }
        }


        $cart = session()->get('cart');
        return view('frontend.product.product_details', compact('product', 'arrayRatings', 'cart', 'star'));
    }


    // danh gia

    public function rate(Request $request)
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $check = Rate::where(['r_product_id' => $request->id, 'r_user_id' => $id])->get();
            if ($check->count() > 0) {
                return response()->json([
                    'code' => 300,
                    'message' => 'success'
                ], 200);
            } else {

                if (request()->ajax()) {
                    $data = Validator::make(
                        $request->all(),
                        [
                            'text' => 'bail|required|min:5',
                            'star' => 'bail|required|',
                        ],
                        [
                            'text.required' => 'Vui lòng nhập đánh giá',
                            'text.min' => 'Đánh giá ít nhất 5 ký tự',
                            'star.required' => 'Vui lòng chọn sao',
                        ]
                    );
                    if ($data->fails()) {
                        return response()->json([
                            'err' => 'err',
                            'text' => $data->errors()->get('text'),
                            'star' => $data->errors()->get('star'),
                        ], 200);
                    } else {
                        $new = new Rate;
                        $new->r_user_id = $id;
                        $new->r_product_id = $request->id;
                        $new->r_star = $request->star;
                        $new->r_content = $request->text;

                        $new->save();

                        $ratingDetails = Rate::groupBy('r_star')
                            ->where('r_product_id', $request->id)
                            ->select(DB::raw('count(r_star) as total'), DB::raw('sum(r_star) as sum'))
                            ->addSelect('r_star')->get()->toArray();
                        $arrayRatings = [];
                        if (!empty($ratingDetails)) {
                            for ($i = 1; $i <= 5; $i++) {
                                $arrayRatings[$i] = [

                                    "total" => 0,
                                    "sum" => 0,
                                    "star" => 0
                                ];
                                foreach ($ratingDetails as $item) {
                                    if ($item['r_star']  == $i) {
                                        $arrayRatings[$i] = $item;
                                    }
                                }
                            }
                        }

                        $product = Product::find($request->id);
                        $star = Rate::where('r_product_id', $request->id)->avg('r_star');



                        $viewrate = view('frontend.product.rate', compact('product', 'star', 'arrayRatings'))->render();
                        $viewcenter = view('frontend.product.info', compact('product', 'star'))->render();
                        return response()->json([
                            'viewrate' => $viewrate,
                            'viewcenter'  => $viewcenter,
                            'code' => 200,
                            'message' => 'success'
                        ], 200);
                    }
                }
            }
        } else {
            return response()->json([
                'code' => 400,
                'message' => 'success'
            ], 200);
        }
    }


    //binh luan

    public function comment(Request $request)
    {

        if (Auth::check()) {
            if (request()->ajax()) {
                $data = Validator::make(
                    $request->all(),
                    [
                        'text' => 'bail|required',
                    ],
                    [
                        'text.required' => 'Vui lòng nhập bình luận',
                    ]
                );
                if ($data->fails()) {
                    return response()->json([
                        'code' => 400,
                        'text' => $data->errors()->get('text'),

                    ], 200);
                } else {
                    $id = Auth::user()->id;
                    $new = new Comment();
                    $new->cm_user_id = $id;
                    $new->cm_product_id = $request->id;
                    $new->cm_content = $request->text;

                    $new->save();

                    $product = Product::find($request->id);
                    $viewcomment = view('frontend.product.comment', compact('product'))->render();
                    return response()->json([
                        'viewcomment' => $viewcomment,
                        'code' => 200,
                    ], 200);
                }
            }
        } else {
            return response()->json([
                'code' => 300,
            ], 200);
        }
    }
}
