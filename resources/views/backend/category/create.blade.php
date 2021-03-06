@extends('backend.layout.layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
        <h2 class="m-0">Tạo Mới Danh Mục </h2>
        <div class="nav">
            <div class="nav-item">
                <a href="" class="nav-link">Home /</a>
            </div>
            <div class="nav-item">
                <a href="" class="nav-link">Category /</a>
            </div>
            <div class="nav-item">
                <a href="" class="nav-link">Create</a>
            </div>
        </div>
    </div>
    <div class="card col-lg-12 p-2">
        <form data-url="{{ route('post_create_category') }}" method="post" id="create_category">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <label for="c_name">Tên Danh Mục :</label>
                    <input type="text" class="form-control" name="c_name" id="c_name" placeholder="Nhập tên danh mục ...">
                    <span class="text-danger err_c_name fs-5"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="c_desc">Mô Tả :</label>
                    <textarea name="c_desc" class="ckeditor form-control" id="c_desc"></textarea>
                    <span class="text-danger err_c_desc fs-5"></span>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-lg">Lưu <i class="fas fa-check ms-2"></i></button>
                    <a href="{{ route('list_category') }}" class="btn btn-danger btn-lg">Back List<i
                            class="fas fa-undo ms-2"></i></a>
                </div>
            </div>
        </form>
    </div>

@endsection
