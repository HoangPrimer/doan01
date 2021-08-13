<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\User;
use App\Comment;
use App\Helper\Date;
use App\Item;
use App\Rate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class Home_Controller extends Controller
{
    public function home()
    {
        // tổng đơn hàng
        $all_order = Order::select('id')->count();

        // tổng comment
        $all_comment = Comment::select('id')->count();

        // tổng đánh giá
        $all_rate = Rate::select('id')->count();

        // tổng người dùng
        $all_user = User::select('id')->count();

        // top sản phẩm bán chạy
        $top_sell = Product::orderBy('pro_amount_sell', 'desc')->limit(5)->get();

        // top sản phẩm xem nhiều
        $top_view = Product::orderBy('pro_view', 'desc')->limit(5)->get();

        // đơn hàng mới
        $order_new = Order::where('od_status', '0')->orWhere('od_status', '1')->orderbyDesc('id')->paginate(10);

        // danh sách ngày trong tháng
        $list_day = Date::getListDayInMonth();

        // top 10 product bán nhiều nhất
        $arrTop10Money = [];
        $top10 = DB::table('orders')->join('items', 'orders.id', '=', 'items.i_order_id')
            ->where('od_status','3')
            ->select(DB::raw('sum(i_total) as pro_total_money'), DB::raw('i_product_code as pro_code'))
            ->groupBy('i_product_code')->orderBy('pro_total_money', 'desc')->limit(10)->get();
        foreach ($top10 as $key => $top) {
            $arrTop10Money[] = [$top->pro_code, (float)($top->pro_total_money / 1000000)];
        }


        // thống kê đơn hàng
        $order_default = Order::where('od_status', '0')->select('id')->count();
        $order_approved = Order::where('od_status', '1')->select('id')->count();
        $order_process = Order::where('od_status', '2')->select('id')->count();
        $order_success = Order::where('od_status', '3')->select('id')->count();
        $order_cancel = Order::where('od_status', '4')->select('id')->count();

        $status_order  = [
            ['Đã Giao',  $order_success, false],
            ['Đã Hủy',  $order_cancel, false],
            ['Đã Duyệt',  $order_approved, false],
            ['Chờ Duyệt',  $order_default, false],
            ['Đang Giao',  $order_process, false],
        ];

        // doanh thu theo tháng
        $revuenueOrderMonth = Order::where('od_status', '3')->whereMonth('created_at', date('m'))
            ->select(DB::raw('sum(od_total) as totalMoney'), DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();
        $revuenueOrderMonthDefault = Order::where('od_status', '0')->whereMonth('created_at', date('m'))
            ->select(DB::raw('sum(od_total) as totalMoney'), DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();
        $revuenueOrderMonthCancel = Order::where('od_status', '4')->whereMonth('created_at', date('m'))
            ->select(DB::raw('sum(od_total) as totalMoney'), DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();
        $revuenueOrderMonthOnway = Order::where('od_status', '2')->whereMonth('created_at', date('m'))
            ->select(DB::raw('sum(od_total) as totalMoney'), DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();
        $revuenueOrderMonthApproved = Order::where('od_status', '1')->whereMonth('created_at', date('m'))
            ->select(DB::raw('sum(od_total) as totalMoney'), DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();

        $arrRevuenueOrderMonth = [];
        $arrRevuenueOrderMonthDefault = [];
        $arrRevuenueOrderMonthCancel = [];
        $arrRevuenueOrderMonthOnway = [];
        $arrRevuenueOrderMonthApproved = [];

        foreach ($list_day as $day) {
            $total = 0;
            foreach ($revuenueOrderMonth as $key => $revenue) {
                if ($revenue['day'] == $day) {
                    $total = $revenue['totalMoney'];
                    break;
                }
            }
            $arrRevuenueOrderMonth[] = (int)$total;

            $total = 0;
            foreach ($revuenueOrderMonthDefault as $key => $revenue) {
                if ($revenue['day'] == $day) {
                    $total = $revenue['totalMoney'];
                    break;
                }
            }
            $arrRevuenueOrderMonthDefault[] = (int)$total;

            $total = 0;
            foreach ($revuenueOrderMonthCancel as $key => $revenue) {
                if ($revenue['day'] == $day) {
                    $total = $revenue['totalMoney'];
                    break;
                }
            }
            $arrRevuenueOrderMonthCancel[] = (int)$total;
            $total = 0;
            foreach ($revuenueOrderMonthOnway as $key => $revenue) {
                if ($revenue['day'] == $day) {
                    $total = $revenue['totalMoney'];
                    break;
                }
            }
            $arrRevuenueOrderMonthOnway[] = (int)$total;
            $total = 0;
            foreach ($revuenueOrderMonthApproved as $key => $revenue) {
                if ($revenue['day'] == $day) {
                    $total = $revenue['totalMoney'];
                    break;
                }
            }
            $arrRevuenueOrderMonthApproved[] = (int)$total;
        }

        // dữ liệu
        $data = [
            'all_order' => $all_order,
            'all_comment' => $all_comment,
            'all_rate' => $all_rate,
            'all_user' => $all_user,
            'top_sell' => $top_sell,
            'top_view' => $top_view,
            'order_new' => $order_new,
            'list_day' => json_encode($list_day),
            'status_order' => json_encode($status_order),
            'arrRevuenueOrderMonth' => json_encode($arrRevuenueOrderMonth),
            'arrRevuenueOrderMonthDefault' => json_encode($arrRevuenueOrderMonthDefault),
            'arrRevuenueOrderMonthCancel' => json_encode($arrRevuenueOrderMonthCancel),
            'arrRevuenueOrderMonthOnway' => json_encode($arrRevuenueOrderMonthOnway),
            'arrRevuenueOrderMonthApproved' => json_encode($arrRevuenueOrderMonthApproved),
            'arrTop10Money' => json_encode($arrTop10Money),
        ];
        return view('backend.home', $data);
    }

    public function add_admin(Request $request)
    {
        $data = Validator::make(
            $request->all(),

            [
                'name' => 'bail|required|min:2',
                'phone' => 'bail|required|numeric|digits:10',
                'gender' => 'bail|required',
                'address' => 'bail|required|min:5',
                'email' => 'bail|required|unique:users|email',
                'pass' => 'bail|required|min:5',
                'repass' => 'bail|required|same:pass'
            ],
            [
                'name.required' => 'Vui lòng nhập tên!',
                'name.min' => 'Tên không được nhỏ hơn 2 ký tự',
                'phone.required' => 'Vui lòng nhập số điện thoại!',
                'phone.numeric' => 'Chỉ nhập được số',
                'phone.digits' => 'Vui lòng nhập số điện thoại đủ 10 số!',
                'gender.required' => 'Vui lòng chọn giới tính!',
                'address.required' => 'Vui lòng nhập địa chỉ!',
                'address.min' => 'Địa chỉ không nhỏ hơn 10 ký tự!',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã tồn tại',
                'pass.required' => 'Vui lòng nhập mật khẩu',
                'pass.min' => 'Mật khẩu ít nhất 5 ký tự',
                'repass.required' => 'Vui lòng nhập lại mật khẩu',
                'repass.same' => 'Mật khẩu không khớp',
            ],
        );
        if ($data->fails()) {
            return response()->json([
                'code' => 200,
                'name' => $data->errors()->get('name'),
                'phone' => $data->errors()->get('phone'),
                'gender' => $data->errors()->get('gender'),
                'address' => $data->errors()->get('address'),
                'email' => $data->errors()->get('email'),
                'pass' => $data->errors()->get('pass'),
                'repass' => $data->errors()->get('repass'),
            ], 200);
        } else {
            $update = new User;
            $update->email = $request->email;
            $update->name = $request->name;
            $update->phone = $request->phone;
            $update->gender = $request->gender;
            $update->address = $request->address;
            $update->password = $request->pass;
            $update->level = '1';
            $update->save();
            return response()->json([
                'code' => 300,
            ], 200);
        }
    }
}
