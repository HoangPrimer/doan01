@extends('frontend.layout.layout')
@section('content')
    <section class="py-5">
        <div class="container border-show py-3">
            <div class="d-flex justify-content-between">
                <div class="ads__left">
                    <img src="{{ asset('/image/default/qc1.png') }}" alt="quang cao dong ho">
                </div>
                <div class="ads__right">
                    <img src="{{ asset('/image/default/qc2.png') }}" alt="quang cao dong ho">
                    <img src="{{ asset('/image/default/qc3.png') }}" alt="quang cao dong ho">
                </div>
            </div>
            <div class="p-3  mt-4 c_desc">
                {!! $category_desc->c_desc !!}
                <form action="">
                    <input type="text" value="{{ $id }}" hidden class="category_id" />
                </form>
            </div>
        </div>
    </section>

    <!-- danh sach san pham -->
    <section id="product__hot " class="py-3">
        <div class="container border-show py-3">
            <div class="row">
                <div class=" col-lg-3 col-md-4 ">
                    <ul class="list-fillter">
                        <li class="fillter-item">
                            <h4 class="d-flex justify-content-between" onclick="changefillter('thuonghieu',this)">Thương
                                Hiệu
                                <i class="fas fa-angle-down d-md-none show_item_fillter"></i>
                                <i class="fas fa-angle-up d-md-none d-none hide_item_fillter"></i>
                            </h4>
                            <ul class="sub-fillter list-group" id="thuonghieu">
                                @foreach ($trademark as $tra)
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input ckeck_product" id="trademark"
                                                    value="{{ $tra->id }}"> {{ $tra->tr_name }}
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="fillter-item">
                            <h4 class="d-flex justify-content-between" onclick="changefillter('gia',this)">Mức Giá
                                <i class="fas fa-angle-down d-md-none show_item_fillter"></i>
                                <i class="fas fa-angle-up d-md-none d-none hide_item_fillter"></i>
                            </h4>
                            <ul class="sub-fillter list-group" id="gia">
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input ckeck_product" name="price"
                                                id="price" value="0"> Bỏ Chọn
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input ckeck_product" name="price"
                                                id="price" value="1"> Dưới 2 triệu
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input ckeck_product" name="price"
                                                id="price" value="2"> Từ 2 - 5 triệu
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input ckeck_product" name="price"
                                                id="price" value="3"> Từ 5 - 10triệu
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input ckeck_product" name="price"
                                                id="price" value="4"> Từ 10 - 15 triệu
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input ckeck_product" name="price"
                                                id="price" value="5"> Từ 15 - 20 triệu
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input ckeck_product" name="price"
                                                id="price" value="6"> Trên 20 triệu
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="fillter-item">
                            <h4 class="d-flex justify-content-between" onclick="changefillter('kieumay',this)">Kiểu Máy
                                <i class="fas fa-angle-down d-md-none show_item_fillter"></i>
                                <i class="fas fa-angle-up d-md-none d-none hide_item_fillter"></i>
                            </h4>
                            <ul class="sub-fillter list-group" id="kieumay">
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input ckeck_product" id="may"
                                                value="Quartz (Pin)"> Quartz (Pin)
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input ckeck_product" id="may"
                                                value="Automatic"> Automatic
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input ckeck_product" id="may"
                                                value="Năng Lượng Mặt Trời"> Năng Lượng Mặt Trời
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input ckeck_product" id="may"
                                                value="Kinetic"> Kinetic
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input ckeck_product" id="may"
                                                value="Lên Cót Tay"> Lên Cót Tay
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="fillter-item">
                            <h4 class="d-flex justify-content-between" onclick="changefillter('day',this)"> Chất Liệu Dây
                                <i class="fas fa-angle-down d-md-none show_item_fillter"></i>
                                <i class="fas fa-angle-up d-md-none d-none hide_item_fillter"></i>
                            </h4>
                            <ul class="sub-fillter list-group" id="day">
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input ckeck_product" id="clday"
                                                value="Thép Không Gỉ"> Thép Không Gỉ
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input ckeck_product" id="clday"
                                                value="Dây Da"> Dây Da
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input ckeck_product" id="clday"
                                                value="Dây Vải"> Dây Vải
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input ckeck_product" id="clday"
                                                value="Titanium"> Titanium
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input ckeck_product" id="clday"
                                                value="Dây Cao Su"> Dây Cao Su
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input ckeck_product" id="clday"
                                                value="Dây Nhựa"> Dây Nhựa
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="fillter-item">
                            <h4 class="d-flex justify-content-between" onclick="changefillter('size',this)">Size mặt
                                <i class="fas fa-angle-down d-md-none show_item_fillter"></i>
                                <i class="fas fa-angle-up d-md-none d-none hide_item_fillter"></i>
                            </h4>
                            <ul class="sub-fillter list-group" id="size">
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input ckeck_product" name="size"
                                                id="kichco" value="0"> Bỏ Chọn
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input ckeck_product" name="size"
                                                id="kichco" value="1"> Dưới 30 mm
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input ckeck_product" name="size"
                                                id="kichco" value="2"> Từ 30 mm - 34 mm
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input ckeck_product" name="size"
                                                id="kichco" value="3"> Từ 35 mm - 39 mm
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input ckeck_product" name="size"
                                                id="kichco" value="4"> Từ 40 mm - 43 mm
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input ckeck_product" name="size"
                                                id="kichco" value="5"> Trên 43 mm
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class=" col-lg-9 col-md-8">
                    <div class="row py-1 mb-3 mx-2 d-flex align-items-center flex-wrap"
                        style="background-color: bisque;border: 1px solid #ccc; ">
                        <div class="col-sm-6 my-1">
                            <span class="fs-4">Sắp xếp theo :</span>
                            <select id="sort_category_product" class="ms-3 pe-3 py-1"
                                data-url="{{ route('category.sort') }}">
                                <option value="new">Mới Nhất </option>
                                <option value="old">Cũ Nhất </option>
                                <option value="hot">Nổi Bật </option>
                                <option value="hot_sell">Bán Chạy </option>
                                <option value="min_price">Giá Thấp Trước </option>
                                <option value="max_price">Giá Cao Trước</option>
                            </select>

                        </div>
                        <div class="col-sm-6 my-1">
                            <input type="text" class="form-control" placeholder="Search ..." id="search_category_product"
                                data-url="{{ route('category.search') }}">
                        </div>
                    </div>
                    <div id="result_fillter" class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 category_product_list">
                        @include('frontend.category.child_category')
                    </div>
                </div>
            </div>
    </section>

@endsection
