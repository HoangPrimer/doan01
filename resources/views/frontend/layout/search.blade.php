@extends('frontend.layout.layout')
@section('content')
    <section id="product__hot " class=" py-5">
        @if (count($search) > 0)
            <div class="container">
                <h4>Tìm thấy {{ count($all) }} kết quả</h4>
            </div>
            <div class="container border-show main-search ">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row py-1 mb-3 d-flex align-items-center flex-wrap">
                            <div class="col-sm-6 my-1">
                                <span class="fs-4">Sắp xếp theo :</span>
                                <select id="sort_search_product" class="ms-3 pe-3 py-1"
                                    data-url="{{ route('search_sort') }}">
                                    <option value="hot_sell">Bán Chạy </option>
                                    <option value="min_price">Giá Thấp Trước </option>
                                    <option value="max_price">Giá Cao Trước</option>
                                </select>
                                <input id="query" type="text" value="{{ $key }}" hidden />
                            </div>
                        </div>
                        <div class="abcs">
                            @include('frontend.layout.child_search')
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container mb-3">
                <span class="fs-4">Rất tiếc, chúng tôi không tìm thấy kết quả phù hợp cho từ khóa <strong
                        class="text-danger"> "{{ $key }}"</strong></span>
            </div>
            <div class="container border-show py-5 d-flex justify-content-center">
                <div class="text-start">
                    <h4>Để tìm được kết quả chính xác hơn, bạn vui lòng:</h4>
                    <ul class="fs-5">
                        <li>Kiểm tra lỗi chính tả của từ khóa đã nhập</li>
                        <li>Thử lại bằng từ khóa khác</li>
                        <li>Thử lại bằng những từ khóa tổng quát hơn</li>
                        <li>Thử lại bằng những từ khóa ngắn gọn hơn</li>
                    </ul>
                </div>
            </div>
        @endif
    </section>

@endsection
