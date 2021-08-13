<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="col-sm-1">#</th>
                    <th>Sản Phẩm</th>
                    <th>Ảnh</th>
                    <th class="col-sm-2">Giá</th>
                    <th class="col-sm-2">Số Lượng</th>
                    <th class="col-sm-2 text-end">Thành Tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order_details->Item as $key => $item)
                    <tr>
                        <td>{{ $key += 1 }}</td>
                        <td>Đồng Hồ {{ $item->i_product_code }}</td>
                        <td>
                            <?php $id = DB::table('products')->where('pro_code',$item->i_product_code)->first()->id;
                                  $img  = DB::table('images')->where('img_product_id',$id)->first()->img_file_path;
                             ?>
                            <img style="width: 100px" src="{{$img}}" alt="">
                        </td>
                        <td>{{ number_format($item->i_price) }} đ</td>
                        <td>{{ $item->i_amount }}</td>
                        <td class="text-end">{{ number_format($item->i_total) }} đ</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <h4 class="text-end text-danger">Tổng Tiền: {{ number_format($order_details->od_total) }} đ</h4>
    <h4>Thông tin khách hàng</h4>
    <ul>
        <li>{{ $order_details->od_name }} - 0{{ $order_details->od_phone }} - {{$order_details->od_gender}}</li>
        <li>{{ $order_details->od_address }}</li>
        <li>{{ $order_details->od_payment }}</li>
        <li>{{ $order_details->od_note }}</li>
    </ul>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary close-modal" >Close</button>
    @if ($order_details->od_status == 0)
        <a class="btn btn-success" href="{{ route('action', ['id' => $order_details->id, '1']) }}">
            <i class="mx-2 text-light fas fa-check"></i> Duyệt
        </a>
    @endif
</div>
