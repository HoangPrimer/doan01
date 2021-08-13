@extends('frontend/layout/layout')
@section('content')
    <section class="py-5">
        <div class="container ">
            <div class="row  py-2">

                <div class="col-sm-12 col-md-12 col-lg-10 mx-auto p-3 border-show">
                    <div class="my-2 d-flex flex-wrap justify-content-between">
                        <span class="fs-4 lh-base "> Xin chào <span class="fs-3 fw-bold "> {{ Auth::user()->name }} -
                            0{{ Auth::user()->phone }}</span></span>
                        <span class="lh-base  fs-4 text-dark">Chi Tiết Đơn Hàng #{{ $or->od_code }}</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table fs-5">
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        @php
                                            $a = DB::table('products')
                                                ->where('pro_code', $item->i_product_code)
                                                ->first();
                                        @endphp
                                        <td style="width: 120px">
                                            <img style="width: 80px"
                                                src="{{ DB::table('images')->where('img_product_id', $a->id)->value('img_file_path') }}"
                                                alt="">
                                        </td>
                                        <td>Đồng Hồ {{ $item->i_product_code }} </td>
                                        <td class="col-sm-1"> {{ $item->i_amount }} </td>
                                        <td class="col-sm-1 text-danger">{{ number_format($item->i_total) }}đ</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="w-100 border-bottom border-primary py-3">
                        <h4 class="text-end text-danger">Tổng Tiền : {{ number_format($or->od_total) }} VND</h4>
                    </div>
                    <div class="w-100 border-bottom border-primary py-3">
                        <h5>Địa chỉ và thông tin nhận hàng :</h5>
                        <ul>
                            <li class="fs-5">{{ $or->od_name }} - 0{{ $or->od_phone }}</li>
                            <li class="fs-5">Địa chỉ nhận hàng: {{ $or->od_address }}</li>
                            <li class="fs-5">Ghi chú : {{ $or->od_note }}</li>
                            <li class="fs-5">Ghi chú : {{ $or->od_payment }}</li>
                        </ul>
                    </div>
                    <div class="w-100 mt-3  py-3 text-center ">
                        <a href="{{ route('profile') }}" class="btn btn-lg btn-primary text-light">Quay Lại Danh Sách Đơn
                            Hàng</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="update-profile">
            <form class="col-lg-6 col-sm-12 update" id="update_profile" data-url="{{ route('profiles') }}"
                enctype="multipart/form-data">
                @csrf
                <input type="text" value="{{ Auth::id() }}" name="id" hidden />
                <div class="mb-3">
                    <h4 class="mb-5">Thông Tin Cá Nhân</h4>
                </div>
                <div class="mb-3">
                    <label class="fs-5 fw-bold">Họ Tên :</label>
                    <div class="my-2">
                        <input class="form-control my-1" type="text" name="name" value=" {{ Auth::user()->name }}">
                        <p class="fs-5 err_name text-danger"></p>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="fs-5 fw-bold">Điện Thoại :</label>
                    <div class="my-2">
                        @if (Auth::user()->phone == '')
                            <input class="form-control my-1" type="text" name="phone" placeholder=" Chưa có thông tin">
                        @else
                            <input class="form-control my-1" type="text" name="phone"
                                value=" 0{{ Auth::user()->phone }}">
                        @endif
                        <p class="fs-5 err_phone text-danger"></p>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="fs-5 fw-bold">Giới Tính :</label>
                    <div class="my-2">
                        @if (Auth::user()->gender == '')
                            <select class="form-control" name="gender">
                                <option value="">Chưa có thông tin</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        @else
                            <select class="form-control" name="gender" id="gender">
                                <option value="">Chưa có thông tin</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        @endif
                        <p class="fs-5 err_gender text-danger"></p>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="fs-5 fw-bold">Địa Chỉ :</label>
                    <div class="my-2">
                        @if (Auth::user()->address == '')
                            <input class="form-control my-1" type="text" name="address" placeholder=" Chưa có thông tin">
                        @else
                            <input class="form-control my-1" type="text" name="address"
                                value=" {{ Auth::user()->address }}">
                        @endif
                        <p class="fs-5 err_address text-danger"></p>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-lg text-light btn-success me-5"> Cập Nhật <i
                            class="ms-3 fas fa-check"></i></button>
                    <zz class="btn btn-lg text-light btn-danger close-update"> Hủy <i class="ms-3 fas fa-undo-alt"></i></zz>
                </div>
            </form>
        </div>
    </section>
    <script>
        let gender = $('#gender-info').text();
        $(document).ready(function() {
            $('#gender').val(gender);
        });
    </script>
@endsection
