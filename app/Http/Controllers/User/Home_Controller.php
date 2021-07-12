<?php

namespace App\Http\Controllers\User;

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
        $a =  Product::with('Image')->with('Rate')->where(['GioiTinh'=>'Nam','Flag_Delete'=>'0'])->orderBy('id','desc')->paginate(8);
        $b =  Product::with('Image')->with('Rate')->where(['GioiTinh'=>'Nu','Flag_Delete'=>'0'])->orderBy('id','desc')->paginate(8);
        $cart = session()->get('cart');
        return view('frontend\index',compact('a','b','cart'));
    }
    /////////////////////////////////////////////////////////////////////

    //////////////////////////////////////////////////////////////////////

    public function search(Request $request)
    {   
      
        $search =Product::where('id','like','%'.$request->keys.'%')->orwhere('MaSP','like','%'.$request->keys.'%')
        ->orwhere('ThuongHieu','like','%'.$request->keys.'%')->orwhere('NguonGoc','like','%'.$request->keys.'%')
        ->orwhere('KieuMay','like','%'.$request->keys.'%')->orwhere('KichCo','like','%'.$request->keys.'%')
        ->orwhere('DoDay','like','%'.$request->keys.'%')->orwhere('ChatLieuVo','like','%'.$request->keys.'%')
        ->orwhere('DoChiuNuoc','like','%'.$request->keys.'%')->orwhere('ChucNang','like','%'.$request->keys.'%')
        ->orwhere('BaoHanh','like','%'.$request->keys.'%')->orwhere('GioiTinh','like','%'.$request->keys.'%')
        ->orwhere('GiaBan','like','%'.$request->keys.'%')->orwhere('GiaKM','like','%'.$request->keys.'%')
        ->orwhere('ChatLieuDay','like','%'.$request->keys.'%')
        ->orwhere('ChatLieuKinh','like','%'.$request->keys.'%')
        ->orderBy('id','desc')->paginate(18);
        return view('frontend.search',compact('search'));

             
    }


    ////////////////////////////////////
  
    public function profile($id)
    {
        $profile = User::find($id);
        $cart = session()->get('cart');
        return view('frontend\profile',compact('profile','cart'));
    }

    /////////////////////////////////


    public function profiles(Request $request)
        {
         $data = Validator::make($request->all(),
      
           [
               'name'=>'bail|required|min:2',
               'phone'=>'bail|required|numeric|digits:10',
               'gender'=>'bail|required',
               'address'=>'bail|required|min:5',
               'avatar'=>'bail|image',
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
            'avatar.image'=>'Ảnh không đúng định dạng'
           ],
           );
           if($data->fails()){
               return response()->json([
                    'code'=>200,
                    'name'=>$data->errors()->get('name'),
                    'phone'=>$data->errors()->get('phone'),
                    'gender'=>$data->errors()->get('gender'),
                    'address'=>$data->errors()->get('address'),
                    'avatar'=>$data->errors()->get('avatar'),
               ],200);
           }
           else{
               $update = User::find($request->id);
               $update ->name = $request->name;
               $update ->phone = $request->phone;
               $update ->gender = $request->gender;
               $update ->address = $request->address;
               if($request->hasFile('avatar')){
                    $file= $request->file('avatar');
                    $file_name = $file->getClientOriginalName();
                    $name_random = rand(1000000000000,9999999999999).'_'.$file_name;
                
                    $file->move("./image/default",$name_random );
                    $update->image = "/image/default/$name_random";
               }
               $update->save();
               $profile = User::find($request->id);
               $cartcomponent = view('frontend.layout.header1')->render();
               $render = view('frontend.child.profile',compact('profile'))->render();
               return response()->json([
                    'code'=>300,
                    'render'=>$render,
                    'heder' =>$cartcomponent,
                ],200);
           }
    }
    // san pham theo danh muc

    public function directory($id)
    {
        $a =  Product::with('Image')->where(['GioiTinh'=>$id,'Flag_Delete'=>'0'])->orderBy('id','desc')->paginate(12);
        $cart = session()->get('cart');
      
        return view('frontend\directory',compact('a','cart'));

    }

    // chi tiet san pham

    public function product_details($id)
    {
        $a = Product::with('Image')->with('Comment')->with('Rate')->find($id);

        $star = Rate::where('Product_id',$id)->avg('Star');
       
        $ratingDetails = Rate::groupBy('Star')
        ->where('Product_id',$id)
        ->select(DB::raw('count(Star) as total'),DB::raw('sum(Star) as sum'))
        ->addSelect('Star')->get()->toArray();

        $arrayRatings = [];
        if(!empty($ratingDetails)){
            for($i=1 ;$i<=5;$i++){
                $arrayRatings[$i] = [
                  
                   "total" => 0,
                   "sum" => 0,
                   "star" => 0
                ];
                  foreach($ratingDetails as $item)
                  {
                      if($item['Star']  == $i)
                      {
                            $arrayRatings[$i] = $item;
                    
                      }
                  }
            }
        }

        $avgstar = round($star);
        $rate = Rate::where('Product_id',$id)->get();
        $cart = session()->get('cart');
        return view('frontend\product_details',compact('a','avgstar','rate','arrayRatings','cart','star'));

    }

    
    // danh gia

    public function rate(Request $request)
    {
        if(Auth::check()){
            $id = Auth::user()->id;
            $check = Rate::where(['Product_id' => $request->id,'User_id' => $id])->get();
            if($check -> count() > 0){
                return response()->json([
                    'code' => 300,
                    'message' => 'success'
                ], 200 );
             }
             else
             {
                
                if(request()->ajax())
                {
                    $data = Validator::make($request->all(),
                        [
                            'text'=>'bail|required|min:5',
                            'star'=>'bail|required|',
                        ],
                        [
                            'text.required'=>'Vui lòng nhập đánh giá',
                            'text.min'=>'Đánh giá ít nhất 5 ký tự',
                            'star.required'=>'Vui lòng chọn sao',
                        ]
                    );
                    if($data ->fails()){
                        return response()->json([
                            'err'=>'err',
                            'text'=>$data->errors()->get('text'),
                            'star'=>$data->errors()->get('star'),
                        ],200);
                    }
                    else{
                    $new = new Rate;
                    $new->User_id = $id;
                    $new->Product_id = $request->id;
                    $new->Star = $request->star;
                    $new->Content = $request->text;
                    
                    $new->save();
    
                    $ratingDetails = Rate::groupBy('Star')
                    ->where('Product_id',$request->id)
                    ->select(DB::raw('count(Star) as total'),DB::raw('sum(Star) as sum'))
                    ->addSelect('Star')->get()->toArray();
                    $arrayRatings = [];
                    if(!empty($ratingDetails)){
                        for($i=1 ;$i<=5;$i++){
                            $arrayRatings[$i] = [
                              
                               "total" => 0,
                               "sum" => 0,
                               "star" => 0
                            ];
                              foreach($ratingDetails as $item)
                              {
                                  if($item['Star']  == $i)
                                  {
                                        $arrayRatings[$i] = $item;
                                        
                                  }
                              }
                        }
                    }
    
                    $a = Product::with('Image')->with('Comment')->with('Rate')->find($request->id);
                    $star = Rate::where('Product_id',$request->id)->avg('Star');
                    $avgstar = round($star);
                    $rate = Rate::where('Product_id',$request->id)->get();
                    $cart = session()->get('cart');
               
                    $viewrate = view('frontend.child.rate',compact('a','avgstar','rate','star','arrayRatings','cart'))->render();
                    $viewcenter = view('frontend.child.info',compact('a','avgstar','rate','cart'))->render();
                    return response()->json([
                        'viewrate' => $viewrate,
                        'viewcenter'  => $viewcenter,
                        'code' => 200,
                        'message' => 'success'
                    ], 200 );
                }
                }
            }
   
    }
    else{
        return response()->json([
            'code' => 400,
            'message' => 'success'
        ], 200 );
    }  
    }
    

    //binh luan

    public function comment(Request $request)
    {
      
        if(Auth::check())
        {
            if(request()->ajax())
            {
                    $data = Validator::make($request->all(),
                        [
                            'text'=>'bail|required',
                        ],
                        [
                            'text.required'=>'Vui lòng nhập bình luận',
                        ]
                    );
                    if($data ->fails()){
                        return response()->json([
                            'code'=>400,
                            'text'=>$data->errors()->get('text'),
                          
                        ],200);
                    }
                    else{   
                    $id = Auth::user()->id;
                    $new = new Comment();
                    $new->User_id = $id;
                    $new->Product_id = $request -> id;
                    $new->Content = $request->text;
                    
                    $new->save();

                    $a = Product::with('Image')->with('Comment')->with('Rate')->find($request->id);
                    $viewcomment = view('frontend.child.comment',compact('a'))->render();
                    return response()->json([
                        'viewcomment' => $viewcomment,
                        'code' => 200,
                        'message' => 'success'
                    ], 200 );
                 }
             }
        }
    else{
        return response()->json([
           
            'code' => 300,
            'message' => 'success'
        ], 200 );
    }  
    }
}
