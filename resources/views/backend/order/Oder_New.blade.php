@extends('backend.layout.layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
        <h2 class="m-0 ">Danh Sách Đơn Hàng (<span class="total_product"></span>) </h2>
        <div class="nav">
            <div class="nav-item">
                <a href="" class="nav-link">Home /</a>
            </div>
            <div class="nav-item">
                <a href="" class="nav-link">Product /</a>
            </div>
            <div class="nav-item">
                <a href="" class="nav-link">List</a>
            </div>
        </div>
    </div>

    <div class="row mb-2 py-2">
        <div class="col-lg-5 col-md-12 col-sm-12 d-flex justify-content-between align-items-center">
            <a class="btn btn-lg btn-primary" href="">Thêm</a>
            <div class="form-group">
                <span class="fs-4 me-2"> Sắp xếp theo :</span>
                <select class="sort_list_category px-2 py-1" data-url="">
                    <option value="new">Mới Nhất</option>
                    <option value="old">Cũ Nhất</option>
                    <option value="abc_asc">Từ A -> Z </option>
                    <option value="abc_desc">Từ Z -> A</option>
                </select>
            </div>
        </div>
        <div class="col-lg-7 col-md-12 col-sm-12 live_seach_category">
            <input class="form-control form-control-light w-100 py-2 " type="text" id="live_search_order" data-url=""
                placeholder="Search" aria-label="Search">
        </div>
    </div>
    <div class="table-responsive list_order">
        @include('backend.order.child_order')
    </div>
@endsection
