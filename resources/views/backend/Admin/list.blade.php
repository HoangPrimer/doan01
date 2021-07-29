@extends('backend.layout.layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-2 border-bottom">
        <h2 class="m-0">Danh Sách Admin (<span class="total_admin">{{ count($all_admin) }}</span>) </h2>
        <div class="nav">
            <div class="nav-item">
                <a href="" class="nav-link">Home /</a>
            </div>
            <div class="nav-item">
                <a href="" class="nav-link">Admin /</a>
            </div>
            <div class="nav-item">
                <a href="" class="nav-link">List</a>
            </div>
        </div>
    </div>

    <div class="row mb-2 py-2">
        <div class="col-lg-5 col-md-12 col-sm-12 d-flex align-items-center justify-content-between">
            <div class="form-group me-2">
                <span class="fs-4"> Sắp xếp theo :</span>
                <select class="sort_list_admin px-2 py-1" data-url="{{ route('sort_admin') }}">
                    <option value="new">Mới Nhất</option>
                    <option value="old">Cũ Nhất</option>
                    <option value="abc_asc">Từ A -> Z</option>
                    <option value="abc_desc">Từ Z -> A</option>
                </select>
            </div>
        </div>
        <div class="col-lg-7 col-md-12 col-sm-12 live_seach_category">
            <input class="form-control form-control-light w-100 py-2 " type="text" id="live_search_admin"
                data-url="{{ route('live_search_admin') }}" placeholder="Search" aria-label="Search">
        </div>
    </div>

    <div class="table-responsive list_admin">
        @include('backend.admin.child_list')
    </div>
    <script>
        $(document).ready(function() {

            $(document).on('click', '.page-link', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                let key = $('.sort_list_admin').val();
                fetch_data(page, key);
            });

            function fetch_data(page, key) {
                $.ajax({
                    url: "{{ route('sort_admin') }}",
                    method: "GET",
                    data: {
                        page: page,
                        key: key
                    },
                    success: function(data) {
                        $('.list_admin').html(data.new_list_admin);
                    }
                });
            }

        });
    </script>
@endsection
