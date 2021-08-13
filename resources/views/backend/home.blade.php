@extends('backend.layout.layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4 g-3">
        <div class="col ">
            <div class="card ">
                <div class="card-body m-0 p-0 d-flex">
                    <div class="card-body-item bg-success">
                        <i class="fas fa-shopping-bag text-light"></i>
                    </div>
                    <div class="p-3 ">
                        <h4>Tổng số đơn hàng</h4>
                        <p><span class="fw-bold">{{ $all_order }}</span> <a href=""
                                class="d-inline nav-link disabled text-decoration-none">(Chi tiết)</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col ">
            <div class="card ">
                <div class="card-body m-0 p-0 d-flex">
                    <div class="card-body-item bg-primary">
                        <i class="far fa-comments text-light"></i>
                    </div>
                    <div class="p-3 ">
                        <h4>Tổng số bình luận</h4>
                        <p><span class="fw-bold">{{ $all_comment }}</span> <a href="{{ route('list_comment') }}"
                                class="text-decoration-none">(Chi tiết)</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col ">
            <div class="card ">
                <div class="card-body m-0 p-0 d-flex">
                    <div class="card-body-item bg-warning">
                        <i class="fas fa-star-half-alt text-light"></i>
                    </div>
                    <div class="p-3 ">
                        <h4>Tổng số đánh giá</h4>
                        <p><span class="fw-bold">{{ $all_rate }}</span> <a href="{{ route('list_rate') }}"
                                class="text-decoration-none">(Chi tiết)</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col ">
            <div class="card ">
                <div class="card-body m-0 p-0 d-flex">
                    <div class="card-body-item bg-info">
                        <i class="fas fa-users text-light"></i>
                    </div>
                    <div class="p-3 ">
                        <h4>Tổng số người dùng</h4>
                        <p><span class="fw-bold">{{ $all_user }}</span> <a href="{{ route('list_user') }}"
                                class="text-decoration-none">(Chi tiết)</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-xl-12 overflow-scroll scroll-hidden ">
            <div id="container" style=" height:500px;min-width: 1000px; " data-listDay="{{ $list_day }}"
                data-money="{{ $arrRevuenueOrderMonth }}" data-money-default="{{ $arrRevuenueOrderMonthDefault }}"
                data-money-cancel="{{ $arrRevuenueOrderMonthCancel }}"
                data-money-onway="{{ $arrRevuenueOrderMonthOnway }}"
                data-money-approved="{{ $arrRevuenueOrderMonthApproved }}">
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-xl-8 overflow-scroll scroll-hidden">
            <div id="container-2" style=" height:500px;min-width: 1000px; " data-money-product="{{ $arrTop10Money }}">
            </div>
        </div>
        <div class="col-xl-4 ">
            <div id="container-1" style=" height:500px;" data-json="{{ $status_order }}">
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-between mt-5 mx-2 ">
        <div class="col-lg-12 col-xl-8 p-0">
            <div class="table-responsive   border-primary border-top border-3 p-1 "
                style="background-color: rgb(246, 241, 241)">
                <h4 class="m-0 py-2 border-bottom border-1 border-primary">Đơn hàng mới</h4>
                <table class="table border-primary">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col">Thông Tin</th>
                            <th scope="col">Mã Đơn Hàng</th>
                            <th scope="col">Tổng Tiền</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Thời Gian</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_new as $key => $list)
                            <tr>
                                <td style="text-align: center;">{{ $key }}</td>
                                <td>
                                    <ul class="m-0">
                                        <li>Name: {{ $list->od_name }}</li>
                                        <li>Email: {{ $list->od_email }}</li>
                                        <li>Phone: 0{{ $list->od_phone }}</li>
                                        <li>Address: {{ $list->od_address }}</li>
                                    </ul>
                                </td>
                                <td>{{ $list->od_code }}</td>
                                <td>{{ number_format($list->od_total) }} VNĐ </td>
                                <td>
                                    @if ($list->od_status == 0)
                                        <label class="px-2 text-light bg-secondary">Chờ duyệt</label>
                                    @elseif ($list->od_status == 1)
                                        <label class="px-2 text-light bg-info">Đã duyệt</label>
                                    @elseif ($list->od_status == 2)
                                        <label class="px-2 text-light bg-primary">Đang giao</label>
                                    @elseif ($list->od_status == 3)
                                        <label class="px-2 text-light bg-success">Đã giao</label>
                                    @elseif ($list->od_status == 4)
                                        <label class="px-2 text-light bg-danger">Đã hủy</label>
                                    @endif
                                </td>
                                <td>{{ date('d-m-Y', strtotime($list->created_at)) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class=" col-lg-12 col-xl-3 p-0">
            <div class="content border-top border-3 border-primary  p-2" style="background-color: rgb(246, 241, 241)">
                <h4 class="m-0 py-2">Top sản phẩm bán chạy</h4>
                <ul class="nav flex-column">
                    @foreach ($top_sell as $top)
                        <li class="nav-item border-top py-2 d-flex justify-content-between">
                            <div class="d-flex ">
                                <div class="image">
                                    <img style="width:80px" src="{{ $top->Image()->value('img_file_path') }}" alt="">
                                </div>
                                <div class="ms-2 break-all" style="max-width: 170px;">
                                    <p class="m-0 fw-bold">{{ $top->pro_amount_sell }} lượt mua</p>
                                    <p class="m-0 ">{{ $top->pro_code }}</p>
                                </div>
                            </div>
                            <div style="width: 110px !important;" class="text-end">
                                <p class="text-danger">{{ number_format($top->pro_price) }} đ </p>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>

            <div class="content border-primary border-top border-3 p-2"
                style="margin-top: 80px;background-color: rgb(246, 241, 241)">
                <h4 class="m-0 py-2 border-bottom border-1">Top sản phẩm xem nhiều</h4>
                <ul class="nav flex-column">
                    @foreach ($top_view as $top)
                        <li class="nav-item border-1 border-bottom py-2 d-flex justify-content-between">
                            <div class="d-flex ">
                                <div class="image">
                                    <img style="width:80px" src="{{ $top->Image()->value('img_file_path') }}" alt="">
                                </div>
                                <div class="ms-2 break-all" style="max-width: 170px;">
                                    <p class="m-0 fw-bold"><i class="far fa-eye"></i> {{ $top->pro_view }} lượt xem</p>
                                    <p class="m-0 ">{{ $top->pro_code }}</p>
                                </div>
                            </div>
                            <div style="width: 110px !important;" class="text-end">
                                <p class="text-danger">{{ number_format($top->pro_price) }} đ </p>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>


@endsection
