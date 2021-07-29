@extends('backend.layout.layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
        <h2 class="m-0 ">Danh Sách Đơn Đã Hủy (<span class="total_order_cancel">{{ count($all_order_cancel) }}</span>) </h2>
        <div class="nav">
            <div class="nav-item">
                <a href="" class="nav-link">Home /</a>
            </div>
            <div class="nav-item">
                <a href="" class="nav-link">Order /</a>
            </div>
            <div class="nav-item">
                <a href="" class="nav-link">Cancel</a>
            </div>
        </div>
    </div>

    <div class="row mb-2 py-2">
        <div class="col-lg-5 col-md-12 col-sm-12 d-flex justify-content-between align-items-center">
            <div class="form-group">
                <span class="fs-4 me-2"> Sắp xếp theo :</span>
                <select class="sort_list_order_cancel px-2 py-1" data-url="{{ route('sort_order_cancel') }}">
                    <option value="new">Mới Nhất</option>
                    <option value="old">Cũ Nhất</option>
                    <option value="abc_asc">Từ A -> Z </option>
                    <option value="abc_desc">Từ Z -> A</option>
                </select>
            </div>
        </div>
        <div class="col-lg-7 col-md-12 col-sm-12 live_seach_category">
            <input class="form-control form-control-light w-100 py-2 " type="text" id="live_search_order_cancel"
                data-url="{{ route('live_search_order_cancel') }}" placeholder="Search" aria-label="Search">
        </div>
    </div>
    <div class="table-responsive list_order_cancel">
        @include('backend.order.child_order_cancel')
    </div>
    <script>
        $(document).ready(function() {

            $(document).on('click', '.page-link', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                let key = $('.sort_list_order_cancel').val();
                fetch_data(page, key);
            });

            function fetch_data(page, key) {
                $.ajax({
                    url: "{{ route('sort_order_cancel') }}",
                    method: "GET",
                    data: {
                        _token: _token,
                        page: page,
                        key: key
                    },
                    success: function(data) {
                        $('.list_order_cancel').html(data.new_list_order_cancel);
                    }
                });
            }
        });
    </script>

@endsection
