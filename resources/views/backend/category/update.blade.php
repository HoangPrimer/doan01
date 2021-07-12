@extends('backend.layout.layout')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Cập Nhật Danh Mục </h2>
    <div class="nav">
        <div class="nav-item">
            <a href="" class="nav-link">Home /</a>
        </div>
        <div class="nav-item">
            <a href="" class="nav-link">Category /</a>
        </div>
        <div class="nav-item">
            <a href="" class="nav-link">Update</a>
        </div>
    </div>
</div>
<div class="card col-lg-8 ">
    <form data-url="{{route('post_update_category',$update_category->id)}}" method="post" id="update_category">
        @csrf
        <div class="card-body">
            <div class="form-group my-3">
                <label for="c_name">Tên Danh Mục :</label>
                <input type="text" class="form-control" name="c_name" id="c_name" placeholder="{{$update_category->c_name}}">
                <span class="text-danger err_c_name fs-5"></span>
            </div>
            <div class="form-group my-3">
                <label for="c_desc">Mô Tả :</label>
                <textarea name="c_desc" class="ckeditor form-control" id="c_desc">{!!$update_category->c_desc!!}</textarea>
                <span class="text-danger err_c_desc fs-5"></span>
            </div>
            <button type="submit" class="btn btn-success btn-lg">Cập Nhật<i class="fas fa-check ms-2"></i></button>
            <a href="{{ route ('list_category')}}" class="btn btn-danger btn-lg">Back List<i class="fas fa-undo ms-2"></i></a>
        </div>
    </form>
</div>

@endsection