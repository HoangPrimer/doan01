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


}
