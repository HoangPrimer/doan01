 @if(session('cart'))
    <form data-url="{{route('oder')}}" method="post" id="form_oder">
    @csrf
    <table class="update_cart_url  table table-bordered border-primary data-url="{{ route('updatecart')}}">
        <thead>
            <tr>
                <td><p>STT</p></td>
                <td><p>Tên Sản Phẩm</p></td>
                <td><p>Đơn Giá</p></td>
                <td><p>Số Lượng</p></td>
                <td><p>Thành Tiề</p></p></td>
                <td><p>Hành Động</p></td>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach($cart as $id => $ac)
            @php
                $total += $ac['price'] * $ac['soluong'];
            @endphp
                <tr>
                    <td class=" text-align-center">{{$id}}</td>
                    <td><p>Đồng hồ {{$ac['thuonghieu']}} {{$ac['masp']}}</p></td>
                    <td><p>{{number_format( $ac['price'])}} VNĐ</p></td>
                    <td><input class="form-control" type="number" class="soluong" value="{{$ac['soluong']}}" min="1"></td>
                    <td><p>{{number_format( $ac['price'] *$ac['soluong'])}} VNĐ</p></td>
                    <td>
                        <a href="" data-id="{{$id}}" class="cart_update btn-primary p-2 mb-3">Cập nhật</a>
                        <a href="" data-id="{{$id}}" class="del_cart btn-danger p-2">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4 style="text-align: right;">Tổng Tiền: {{number_format($total)}} VNĐ</h4>

    <input type="text" hidden  name='tongtien' value="{{$total}}">
            <div class="form-group">
                <i class="fas fa-signature"></i><span> Họ Tên :</span>
                <div class="col">
                    <input  type="text" name="name" placeholder="Nhập họ tên ..." >
                     <span class="err_name text-danger d-block"></span>
                </div>
            </div>
            <div class="form-group">
                <i class="fas fa-mobile-alt"></i><span> Số Điện Thoại :</span>
                <div class="col">
                    <input  type="number" name="phone" placeholder="Nhập số điện thoại ..." >
                    <span class="err_phone text-danger d-block"></span>
                </div>
            </div>
            <div class="form-group">
                <i class="fas fa-map-marked-alt"></i></i><span>Địa Chỉ :</span>
                <div class="col">
                    <input  type="text" name="address" placeholder="số nhà, đường, phố, xã phường, quận huyện, tỉnh thành phố ..." >
                    <span class="err_address text-danger d-block"></span>
                </div>
            </div>
            <div class="form-group">
                <i class="fas fa-at"></i></i><span>Email :</span>
                <div class="col">
                    <input  type="email" name="email" placeholder="Nhập email ..." > 
                    <span class="err_email text-danger d-block"></span>
                </div>
            </div>
            <div class="form-group">  
                <i class="fas fa-venus-mars"></i></i><span>Giới tính :</span>
                <div class="col">
                    <input  type="radio" name="gender" value="Nam" > Nam
                    <input  type="radio" name="gender" value="Nữ" > Nữ
                    <span class="err_gender text-danger d-block"></span>
                </div>
            </div>
            <div class="form-group">  
                <i class="fas fa-dollar-sign"></i></i><span>Thanh Toán :</span>
                <div class="col">
                    <input  type="radio" name="payment" value="Thanh Toán Khi Nhận Hàng" > Thanh Toán Khi Nhận Hàng
                    <span class="err_payment text-danger d-block"></span>
                </div>
            </div>
            <div class="form-group">  
                <i class="fas fa-clipboard-list"></i></i><span>Ghi Chú :</span>
                <div class="col">
                    <textarea name="note" min="5" > </textarea>
                </div>
            </div>
            <div class="form-group">
                <button>Đặt Hàng</button>
            </div>                       
    </form>
@else
    <div style="height: 500px;">
        <p>Opp!!!!!!!!!!!!!!!  Giỏ hàng chưa có sản phẩm</p><a href="{{route('continue')}}">Tiếp tục mua hàng!!!!!!!!!!!!!</a>
    </div>
@endif