@extends('backend.layout.layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-2 border-bottom">
    <h2 class="m-0">Danh Sách Danh Mục (<span class="total_category">{{count($all_category)}}</span>) </h2>
    <div class="nav">
        <div class="nav-item">
            <a href="" class="nav-link">Home /</a>
        </div>
        <div class="nav-item">
            <a href="" class="nav-link">Category /</a>
        </div>
        <div class="nav-item">
            <a href="" class="nav-link">List</a>
        </div>
    </div>
</div>

<div class="row mb-2">
    <div class="col-lg-4 col-md-12 col-sm-12">
        <a class="btn btn-lg btn-primary me-2 " href="{{route('create_category')}}">Thêm</a>
        <button class="btn-sort btn btn-light border">Sắp xếp theo : <span class="text-sort  ms-2 fs-5">Mới Nhất</span> <i class="fa fa-angle-down ms-2"></i>
            <div class="menu-sort">
                <a class="sort_product" data-url="{{route('sort_category','new')}}" onclick="change_sort_category(this)">Mới Nhất</a>
                <a class="sort_product" data-url="{{route('sort_category','old')}}" onclick="change_sort_category(this)">Cũ nhất</a>
            </div>
        </button>
    </div>
    <div class="col-lg-8 col-md-12 col-sm-12 live_seach_category">
        <input class="form-control form-control-light w-100 py-2 " type="text" id="live_search_category" data-url="{{ route ('live_search_category')}}" placeholder="Search" aria-label="Search">
    </div>
</div>

<div class="table-responsive list_category">
        @include('backend.category.child_list')
</div>

@endsection