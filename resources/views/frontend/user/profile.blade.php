@extends('frontend/layout/layout')
@section('content')
    <section class="py-5">
        <div class="container border-show ">
            <div class="row">
                <div class="img-cover">
                    <div class="avatar">
                        <div class="avatar-img">
                            <img src="{{ Auth::user()->image }}" alt="">
                            <form data-url="{{ route('avatar') }}" enctype="multipart/form-data" id="avatar">
                                @csrf
                                <label for="change-avatar" class=" fas fa-camera-retro"></label>
                                <input type="file" id="change-avatar" name="avatar" hidden />
                                <input type="text" value="{{ Auth::id() }}" name="id" hidden />
                                <button type="submit" hidden />ok </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-lg-4 info " style=" border-bottom-left-radius:10px">
                    <div class="mb-3">
                        <label class="fs-5 fw-bold">Họ Tên :</label>
                        <div class="info-item">
                            <span class="fs-5">{{ Auth::user()->name }}</span>
                            <i class="fs-5 fas fa-pencil-alt"></i>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="fs-5 fw-bold">Số Điện Thoại :</label>
                        <div class="info-item">
                            @if (Auth::user()->phone == '')
                                <span class="fs-5">Chưa có thông tin</span>
                            @else
                                <span class="fs-5" id="phone">0{{ Auth::user()->phone }}</span>
                            @endif
                            <i class="fs-5 fas fa-pencil-alt"></i>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="fs-5 fw-bold">Email :</label>
                        <div class="info-item">
                            <span class="fs-5">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="fs-5 fw-bold">Giới Tính :</label>
                        <div class="info-item">
                            @if (Auth::user()->gender == '')
                                <span class="fs-5">Chưa có thông tin</span>
                            @else
                                <span class="fs-5">{{ Auth::user()->gender }}</span>
                            @endif
                            <i class="fs-5 fas fa-pencil-alt"></i>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="fs-5 fw-bold">Địa Chỉ :</label>
                        <div class="info-item">
                            @if (Auth::user()->address == '')
                                <span class="fs-5">Chưa có thông tin</span>
                            @else
                                <span class="fs-5">{{ Auth::user()->address }}</span>
                            @endif
                            <i class="fs-5 fas fa-pencil-alt"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-8 ">
                    <div class="container-fluid list-order p-0">
                        <h4 class="my-3">Đơn Hàng Mua Gần Đây</h4>
                        <div class="table-responsive">
                            <table class="table table-striped  fs-5">
                                <thead>
                                    <tr>
                                        <td style="width: 150px;">Mã Đơn Hàng</td>
                                        <td style="width: 220px;">Sản Phẩm</td>
                                        <td>Tổng Tiền</td>
                                        <td>Ngày Mua</td>
                                        <td>Trạng Thái</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($a = DB::table('orders')->where('od_phone', Auth::user()->phone)->orderBy('id', 'desc')->get()
        as $item)
                                        <tr>
                                            <td style="width: 150px;">
                                                <a href="{{ route('user_order_details', $item->od_code) }}"
                                                    style="width: 140px !important ;word-break: break-all" class="fs-5">
                                                    #{{ $item->od_code }}
                                                </a>
                                            </td>
                                            <td style="width: 220px;word-break: break-all">
                                                @foreach (DB::table('items')->where('i_order_id', $item->id)->get()
        as $i)
                                                    Đồng Hồ {{ $i->i_product_code }} ,
                                                @endforeach
                                            </td>
                                            <td>{{ number_format($item->od_total) }}đ</td>
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                            <td>
                                                @if ($item->od_status == 0)
                                                    Chờ Duyệt

                                                @elseif( $item->od_status == 1 )
                                                    Đã Duyệt
                                                @elseif( $item->od_status == 2 )
                                                    Đang Giao
                                                @elseif( $item->od_status == 3 )
                                                    Đã Giao
                                                @else
                                                    Đã Hủy
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
                    <h4 class="mb-3">Thông Tin Cá Nhân</h4>
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
                        <select class="form-control" name="gender">
                            <option value="" {{ Auth::user()->gender == '' ? "selected='selected'" : '' }}>Chưa có
                                thông tin</option>
                            <option value="Nam" {{ (Auth::user()->gender ?? '') == 'Nam' ? "selected='selected'" : '' }}>
                                Nam</option>
                            <option value="Nữ" {{ (Auth::user()->gender ?? '') == 'Nữ' ? "selected='selected'" : '' }}>Nữ
                            </option>
                        </select>
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
                            class="ms-2 fas fa-check"></i></button>
                    <zz class="btn btn-lg text-light btn-danger close-update"> Hủy <i class="ms-2 fas fa-undo-alt"></i></zz>
                </div>
            </form>
        </div>
    </section>

@endsection
