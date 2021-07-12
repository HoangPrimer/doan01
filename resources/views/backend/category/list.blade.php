@extends('backend.layout.layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Danh Sách Danh Mục ({{count($list_category)}})</h2>
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

<div class="row mb-3">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <a class="btn btn-lg btn-primary " href="{{route('create_category')}}">Thêm</a>
        <a class="btn btn-lg  btn-primary sort_category" data-url="{{route('sort_category','new')}}" onclick="change_sort_category(this)">Mới Nhất</a>
        <a class="btn btn-lg btn-secondary sort_category" data-url="{{route('sort_category','old')}}" onclick="change_sort_category(this)">Cũ nhất</a>
    </div>
    <div class="col-lg-9 col-md-6 col-sm-12 live_seach_category">
        <input class="form-control form-control-light w-100 py-2 " type="text" id="live_search_category" data-url="{{ route ('live_search_category')}}" placeholder="Search" aria-label="Search">
    </div>
</div>

<div class="table-responsive ">
    <table class="table table-striped table-bordered border-primary list_category">
        @include('backend.category.child_list')
    </table>
    {{$list_category->links()}}
</div>

@endsection