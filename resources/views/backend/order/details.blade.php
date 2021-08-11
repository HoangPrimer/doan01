@extends('backend.layout.layout')
@section('content')
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-header">Chi tiết đơn hàng</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-sm-1">#</th>
                                <th>Sản Phẩm</th>
                                <th class="col-sm-2">Giá</th>
                                <th class="col-sm-2">Số Lượng</th>
                                <th class="col-sm-2 text-end">Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_details->Item as $key => $item)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>Đồng Hồ {{ $item->i_product_code }}</td>
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
                    <li>{{ $order_details->od_name }} - 0{{ $order_details->od_phone }}</li>
                    <li>{{ $order_details->od_address }}</li>
                    <li>{{ $order_details->od_note }}</li>
                </ul>
            </div>
            <div class="card-footer text-end">
                @if ($order_details->od_status == 0)
                    <a class="btn btn-success" href="{{ route('action', ['id' => $order_details->id, '1']) }}">
                        <i class="mx-2 text-light fas fa-check"></i> Duyệt
                    </a>
                @endif
                {{-- <a class="btn btn-danger" href="{{ route('order.back') }}">
                    <i class="mx-2 text-light fas fa-undo"></i> Quay lại
                </a> --}}
            </div>
        </div>
    </div>

@endsection
