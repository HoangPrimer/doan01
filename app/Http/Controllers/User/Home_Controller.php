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
use Illuminate\Support\Facades\Validator;

class Home_Controller extends Controller
{
    //Trang chu

    public function home()
    {
        $product_male =  Product::where(['pro_gender' => 'Nam', 'pro_status' => '1'])->orderBy('id', 'desc')->paginate(8);
        $product_female =  Product::where(['pro_gender' => 'Nữ', 'pro_status' => '1'])->orderBy('id', 'desc')->paginate(8);
        $cart = session()->get('cart');
        $category = Category::all();
        return view('frontend.home.index', compact('product_male', 'product_female', 'cart', 'category'));
    }
    /////////////////////////////////////////////////////////////////////

    //////////////////////////////////////////////////////////////////////

    public function search(Request $request)
    {

        $search = Product::where('id', 'like', '%' . $request->keys . '%')->orwhere('MaSP', 'like', '%' . $request->keys . '%')
            ->orwhere('ThuongHieu', 'like', '%' . $request->keys . '%')->orwhere('NguonGoc', 'like', '%' . $request->keys . '%')
            ->orwhere('KieuMay', 'like', '%' . $request->keys . '%')->orwhere('KichCo', 'like', '%' . $request->keys . '%')
            ->orwhere('DoDay', 'like', '%' . $request->keys . '%')->orwhere('ChatLieuVo', 'like', '%' . $request->keys . '%')
            ->orwhere('DoChiuNuoc', 'like', '%' . $request->keys . '%')->orwhere('ChucNang', 'like', '%' . $request->keys . '%')
            ->orwhere('BaoHanh', 'like', '%' . $request->keys . '%')->orwhere('GioiTinh', 'like', '%' . $request->keys . '%')
            ->orwhere('GiaBan', 'like', '%' . $request->keys . '%')->orwhere('GiaKM', 'like', '%' . $request->keys . '%')
            ->orwhere('ChatLieuDay', 'like', '%' . $request->keys . '%')
            ->orwhere('ChatLieuKinh', 'like', '%' . $request->keys . '%')
            ->orderBy('id', 'desc')->paginate(18);
        return view('frontend.search', compact('search'));
    }

    // san pham theo danh muc

 
    // chi tiet san pham

    public function product_details($category, $id)
    {
        $a = Product::find($id);
        $star = Rate::where('Product_id', $id)->avg('Star');

        $ratingDetails = Rate::groupBy('Star')
            ->where('Product_id', $id)
            ->select(DB::raw('count(Star) as total'), DB::raw('sum(Star) as sum'))
            ->addSelect('Star')->get()->toArray();

        $arrayRatings = [];
        if (!empty($ratingDetails)) {
            for ($i = 1; $i <= 5; $i++) {
                $arrayRatings[$i] = [

                    "total" => 0,
                    "sum" => 0,
                    "star" => 0
                ];
                foreach ($ratingDetails as $item) {
                    if ($item['Star']  == $i) {
                        $arrayRatings[$i] = $item;
                    }
                }
            }
        }

        $avgstar = round($star);
        $rate = Rate::where('Product_id', $id)->get();
        $cart = session()->get('cart');
        return view('frontend.product.product_details', compact('a', 'avgstar', 'rate', 'arrayRatings', 'cart', 'star'));
    }


    // danh gia

    public function rate(Request $request)
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $check = Rate::where(['Product_id' => $request->id, 'User_id' => $id])->get();
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
                        $new->User_id = $id;
                        $new->Product_id = $request->id;
                        $new->Star = $request->star;
                        $new->Content = $request->text;

                        $new->save();

                        $ratingDetails = Rate::groupBy('Star')
                            ->where('Product_id', $request->id)
                            ->select(DB::raw('count(Star) as total'), DB::raw('sum(Star) as sum'))
                            ->addSelect('Star')->get()->toArray();
                        $arrayRatings = [];
                        if (!empty($ratingDetails)) {
                            for ($i = 1; $i <= 5; $i++) {
                                $arrayRatings[$i] = [

                                    "total" => 0,
                                    "sum" => 0,
                                    "star" => 0
                                ];
                                foreach ($ratingDetails as $item) {
                                    if ($item['Star']  == $i) {
                                        $arrayRatings[$i] = $item;
                                    }
                                }
                            }
                        }

                        $a = Product::with('Image')->with('Comment')->with('Rate')->find($request->id);
                        $star = Rate::where('Product_id', $request->id)->avg('Star');
                        $avgstar = round($star);
                        $rate = Rate::where('Product_id', $request->id)->get();
                        $cart = session()->get('cart');

                        $viewrate = view('frontend.child.rate', compact('a', 'avgstar', 'rate', 'star', 'arrayRatings', 'cart'))->render();
                        $viewcenter = view('frontend.child.info', compact('a', 'avgstar', 'rate', 'cart'))->render();
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
                    $new->User_id = $id;
                    $new->Product_id = $request->id;
                    $new->Content = $request->text;

                    $new->save();

                    $a = Product::with('Image')->with('Comment')->with('Rate')->find($request->id);
                    $viewcomment = view('frontend.child.comment', compact('a'))->render();
                    return response()->json([
                        'viewcomment' => $viewcomment,
                        'code' => 200,
                        'message' => 'success'
                    ], 200);
                }
            }
        } else {
            return response()->json([

                'code' => 300,
                'message' => 'success'
            ], 200);
        }
    }
}
