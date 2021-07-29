@extends('backend.layout.layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-2 border-bottom">
        <h2 class="m-0">Chi Tiết Đơn Hàng </h2>
        <div class="nav">
            <div class="nav-item">
                <a href="" class="nav-link">Home /</a>
            </div>
            <div class="nav-item">
                <a href="" class="nav-link">Order /</a>
            </div>
            <div class="nav-item">
                <a href="" class="nav-link">Details</a>
            </div>
        </div>
    </div>
    <section class="my-3">
        <div class="container-fluid border p-3">
            <div class="row d-flex justify-content-between flex-wrap px-3">
                <div class="col-lg-5 my-2 p-3 border border-primary">
                    <div class="mb-4">
                        <h4>Thông Tin Khách Hàng</h4>
                    </div>
                    <div class=" table-responsive">
                        <table div class="table table-striped ">
                            <thead>
                                <tr class="border-bottom">
                                    <th style="width: 200px">Họ Tên </th>
                                    <th scope="col">{{ $order_details->od_name }}</th>
                                </tr>
                                <tr class="border-bottom">
                                    <th scope="col">Số Điện Thoại </th>
                                    <th scope="col">{{ $order_details->od_phone }}</th>
                                </tr>
                                <tr class="border-bottom">
                                    <th scope="col">Email</th>
                                    <th scope="col">{{ $order_details->od_email }}</th>
                                </tr>
                                <tr class="border-bottom">
                                    <th scope="col">Giới Tính</th>
                                    <th scope="col">{{ $order_details->od_gender }}</th>
                                </tr>
                                <tr class="border-bottom">
                                    <th scope="col">Hình Thức Thanh Toán</th>
                                    <th scope="col">{{ $order_details->od_payment }}</th>
                                </tr>
                                <tr class="border-bottom">
                                    <th scope="col">Ghi Chú</th>
                                    <th scope="col">{{ $order_details->od_note }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class="col-lg-6 border border-primary my-2 p-3">
                    <div class="mb-4">
                        <h4>Danh sách sản phẩm</h4>
                    </div>
                    <div class="table-responsive">
                        <table div class="table table-striped table-bordered border-primary ">
                            <thead>
                                <tr>
                                    <th scope="col">Sản Phẩm</th>
                                    <th scope="col">Số Lượng</th>
                                    <th scope="col">Tổng Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order_details->Item as $list)
                                    <tr>
                                        <td>{{ $list->i_product_code }}</td>
                                        <td>{{ $list->i_amount }}</td>
                                        <td>{{ number_format($list->i_total) }} VNĐ</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="text-dark fw-bold">Tổng Cộng</td>
                                    <td colspan="2" class="text-end text-danger fw-bold">
                                        {{ number_format($order_details->od_total) }} VNĐ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="input-group">
                    @if ($order_details->od_status == 'Chờ Duyệt')
                        <a href="{{ route('accept', $order_details -> id) }}" class="btn btn-info mx-3">Duyệt</a>
                        <a href="{{ route('onbyway', $order_details -> id) }}" class="btn btn-primary mx-3">Đang Giao</a>
                        <a href="{{ route('done', $order_details -> id) }}" class="btn btn-success mx-3">Đã Giao</a>
                        <a href="{{ route('cancel_order', $order_details -> id) }}" class="btn btn-danger mx-3">Hủy</a>
                    @elseif ($order_details->od_status == 'Đã Duyệt')
                        <a href="{{ route('onbyway', $order_details -> id) }}" class="btn btn-primary mx-3">Đang Giao</a>
                        <a href="{{ route('done', $order_details -> id) }}" class="btn btn-success mx-3">Đã Giao</a>
                        <a href="{{ route('cancel_order', $order_details -> id) }}" class="btn btn-danger mx-3">Hủy</a>
                    @elseif ($order_details->od_status == 'Đang Giao')
                        <a href="{{ route('done', $order_details -> id) }}" class="btn btn-success mx-3">Đã Giao</a>
                        <a href="{{ route('cancel_order', $order_details -> id) }}" class="btn btn-danger mx-3">Hủy</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- ennd chi tiet san pham  -->
@endsection
