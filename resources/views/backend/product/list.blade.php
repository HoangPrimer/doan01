@extends('backend.layout.layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h2 class="m-0 ">Danh Sách Sản Phẩm (<span class="total_product">{{count($all_product)}}</span>) </h2>
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

<div class="row mb-2">
    <div class="col-lg-4 col-md-12 col-sm-12 d-flex">
        <a class="btn btn-lg btn-primary me-2" href="{{route('create_product')}}">Thêm</a>
        <button class="btn-sort btn btn-light border">Sắp xếp theo : <span class="text-sort  ms-2 fs-5">Mới Nhất</span> <i class="fa fa-angle-down ms-2"></i>
            <div class="menu-sort">
                <a class=" sort_product " data-url="{{route('sort_product','new')}}" onclick="change_sort_product(this)">Mới Nhất</a>
                <a class=" sort_product" data-url="{{route('sort_product','old')}}" onclick="change_sort_product(this)">Cũ Nhất</a>
                <a class=" sort_product" data-url="{{route('sort_product','abc_asc')}}" onclick="change_sort_product(this)">A -> Z</a>
                <a class=" sort_product" data-url="{{route('sort_product','abc_desc')}}" onclick="change_sort_product(this)">Z -> A</a>
            </div>
        </button>
    </div>
    <div class="col-lg-8 col-md-12 col-sm-12 live_seach_category">
        <input class="form-control form-control-light w-100 py-2 " type="text" id="live_search_product" data-url="{{ route ('live_search_product')}}" placeholder="Search" aria-label="Search">
    </div>
</div>
@csrf
<div class="table-responsive list_product">
    @include('backend.product.child_list')
</div>

<script>
    $(document).ready(function() {

        $(document).on('click', '.page-link', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            let text = $('.text-sort').text();
            let key;
            if (text == 'Mới Nhất') {
                key = 'new';
            }
            if (text == 'Cũ Nhất') {
                key = 'old';
            }
            if (text == 'A -> Z') {
                key = 'abc_asc';
            }
            if (text == 'Z -> A') {
                key = 'abc_desc';
            }
            fetch_data(page, key);
        });

        function fetch_data(page, key) {
            var _token = $("input[name=_token]").val();
            $.ajax({
                url: "{{route('sort')}}",
                method: "POST",
                data: {
                    _token: _token,
                    page: page,
                    key: key
                },
                success: function(data) {
                    $('.list_product').html(data);
                }
            });
        }

    });
</script>

@endsection