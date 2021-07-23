 @if (!empty($cart))
     <form data-url="{{ route('order') }}" method="post" id="form_oder">
         @csrf
         <div class="table-responsive">
             <table class="table table-bordered border-primary">
                 <thead>
                     <tr>
                         <td>
                             <p class="fs-4">STT</p>
                         </td>
                         <td>
                             <p class="fs-4">Tên Sản Phẩm</p>
                         </td>
                         <td>
                             <p class="fs-4">Đơn Giá</p>
                         </td>
                         <td>
                             <p class="fs-4">Số Lượng</p>
                         </td>
                         <td>
                             <p class="fs-4">Thành Tiền</p>
                         </td>
                         <td>
                             <p class="fs-4">Hành Động</p>
                         </td>
                     </tr>
                 </thead>
                 <tbody>
                     @php
                         $total = 0;
                         $id = 0;
                     @endphp
                     @foreach ($cart as $key => $ac)
                         @php
                             $total += $ac['price'] * $ac['soluong'];
                         @endphp
                         <tr>
                             <td>
                                 <p class="fs-4">{{ $id += 1 }}</p>
                             </td>
                             <td>
                                 <p class="fs-4">Đồng hồ {{ $ac['thuonghieu'] }} {{ $ac['masp'] }}</p>
                             </td>
                             <td>
                                 <p class="fs-4">{{ number_format($ac['price']) }} VNĐ</p>
                             </td>
                             <td><input class="form-control soluong" type="number" value="{{ $ac['soluong'] }}"
                                     min="1">
                             </td>
                             <td>
                                 <p class="fs-4">{{ number_format($ac['price'] * $ac['soluong']) }} VNĐ</p>
                             </td>
                             <td>
                                 <div class="btn-group d-flex flex-wrap justify-content-between">
                                     <a href="" data-id="{{ $key }}" data-url="{{ route('cart.update') }}"
                                         class="cart_update btn-primary fs-4 p-2 my-1 me-3">Cập nhật</a>
                                     <a href="" data-id="{{ $key }}" data-url="{{ route('cart.delete') }}"
                                         class="del_cart btn-danger fs-4 p-2 my-1">Xóa</a>
                                 </div>
                             </td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
         <h4 style="text-align: right;">Tổng Tiền: {{ number_format($total) }} VNĐ</h4>

         <input type="text" hidden name='tongtien' value="{{ $total }}">
         <div class="col-lg-6">
             @if (Auth::check())
                 <div class="mb-4">
                     <span class="fs-3"><i class="fas fa-signature"></i> Họ Tên : </span>
                     <div class="my-2 d-flex align-items-center">
                         <input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}">
                     </div>
                     <p class="err_name text-danger fs-5"></p>
                 </div>
                 <div class="mb-4">
                     <span class="fs-3"> <i class="fas fa-mobile-alt"></i> Số Điện Thoại :</span>
                     <div class="my-2 d-flex align-items-center">
                         <input class="form-control" type="number" name="phone" value="{{ Auth::user()->phone }}">
                     </div>
                     <p class="err_phone text-danger fs-5"></p>
                 </div>
                 <div class="mb-4">
                     <span class="fs-3"> <i class="fas fa-at"></i>Email :</span>
                     <div class="my-2 d-flex align-items-center">
                         <input class="form-control" type="email" name="email" value="{{ Auth::user()->email }}">
                     </div>
                     <p class="err_email text-danger fs-5"></p>
                 </div>
                 <div class="mb-4">
                     <span class="fs-3"> <i class="fas fa-map-marked-alt"></i>Địa Chỉ :</span>
                     <div class="my-2 d-flex align-items-center">
                         <input class="form-control" type="text" name="address" value="{{ Auth::user()->address }}">
                     </div>
                     <p class="err_address text-danger fs-5"></p>
                 </div>
                 <div class="mb-4">
                     <span class="fs-3"><i class="fas fa-venus-mars"></i>Giới tính :</span>
                     <div class="my-2 d-flex align-items-center">
                         <input class="form-check-input fs-4" type="radio" name="gender" value="Nam"><span
                             class="mx-3 fs-4">Nam</span>
                         <input class="form-check-input fs-4" type="radio" name="gender" value="Nữ"><span
                             class="mx-3 fs-4">Nữ</span>
                     </div>
                     <p class="err_gender text-danger fs-5"></p>
                 </div>
                 <div class="mb-4">
                     <span class="fs-3"><i class="fas fa-dollar-sign"></i>Thanh Toán :</span>
                     <div class="my-2 d-flex align-items-center">
                         <input class="form-check-input fs-4 me-3" type="radio" name="payment"
                             value="Thanh Toán Khi Nhận Hàng">
                         <span class="fs-4">Thanh Toán Khi Nhận Hàng</span>
                     </div>
                     <p class="err_payment text-danger fs-5"></p>
                 </div>
                 <div class="mb-4">
                     <span class="fs-3"> <i class="fas fa-clipboard-list"></i> Ghi Chú :</span>
                     <div class="my-2">
                         <textarea class="form-control" name="note" min="5"> </textarea>
                     </div>
                 </div>
                 <div class="mb-4">
                     <button class="btn btn-primary fs-4">Đặt Hàng</button>
                 </div>
             @else
                 <div class="mb-4">
                     <span class="fs-3"><i class="fas fa-signature"></i> Họ Tên : </span>
                     <div class="my-2 d-flex align-items-center">
                         <input class="form-control" type="text" name="name" placeholder="Nhập họ tên ...">
                     </div>
                     <p class="err_name text-danger fs-5"></p>
                 </div>
                 <div class="mb-4">
                     <span class="fs-3"> <i class="fas fa-mobile-alt"></i> Số Điện Thoại :</span>
                     <div class="my-2 d-flex align-items-center">
                         <input class="form-control" type="number" name="phone" placeholder="Nhập số điện thoại ...">
                     </div>
                     <p class="err_phone text-danger fs-5"></p>
                 </div>
                 <div class="mb-4">
                     <span class="fs-3"> <i class="fas fa-map-marked-alt"></i>Địa Chỉ :</span>
                     <div class="my-2 d-flex align-items-center">
                         <input class="form-control" type="text" name="address"
                             placeholder="số nhà, đường, phố, xã phường, quận huyện, tỉnh thành phố ...">
                     </div>
                     <p class="err_address text-danger fs-5"></p>
                 </div>
                 <div class="mb-4">
                     <span class="fs-3"> <i class="fas fa-at"></i>Email :</span>
                     <div class="my-2 d-flex align-items-center">
                         <input class="form-control" type="email" name="email" placeholder="Nhập email ...">
                     </div>
                     <p class="err_email text-danger fs-5"></p>
                 </div>
                 <div class="mb-4">
                     <span class="fs-3"><i class="fas fa-venus-mars"></i>Giới tính :</span>
                     <div class="my-2 d-flex align-items-center">
                         <input class="form-check-input fs-4" type="radio" name="gender" value="Nam"><span
                             class="mx-3 fs-4">Nam</span>
                         <input class="form-check-input fs-4" type="radio" name="gender" value="Nữ"><span
                             class="mx-3 fs-4">Nữ</span>
                     </div>
                     <p class="err_gender text-danger fs-5"></p>
                 </div>
                 <div class="mb-4">
                     <span class="fs-3"><i class="fas fa-dollar-sign"></i>Thanh Toán :</span>
                     <div class="my-2 d-flex align-items-center">
                         <input class="form-check-input fs-4 me-3" type="radio" name="payment"
                             value="Thanh Toán Khi Nhận Hàng">
                         <span class="fs-4">Thanh Toán Khi Nhận Hàng</span>
                     </div>
                     <p class="err_payment text-danger fs-5"></p>
                 </div>
                 <div class="mb-4">
                     <span class="fs-3"> <i class="fas fa-clipboard-list"></i> Ghi Chú :</span>
                     <div class="my-2">
                         <textarea class="form-control" name="note" min="5"> </textarea>
                     </div>
                 </div>
                 <div class="mb-4">
                     <button class="btn btn-primary fs-4">Đặt Hàng</button>
                 </div>
             @endif
         </div>
     </form>
 @else
     <div style="height: 500px;">
         <p>Opp!!!!!!!!!!!!!!! Giỏ hàng chưa có sản phẩm</p><a href="{{ route('continue') }}">Tiếp tục mua
             hàng!!!!!!!!!!!!!</a>
     </div>
 @endif
