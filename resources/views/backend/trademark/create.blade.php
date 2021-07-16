@extends('backend.layout.layout')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h2 class="m-0">Tạo Mới Thương Hiệu </h2>
    <div class="nav">
        <div class="nav-item">
            <a href="" class="nav-link">Home /</a>
        </div>
        <div class="nav-item">
            <a href="" class="nav-link">Trademark /</a>
        </div>
        <div class="nav-item">
            <a href="" class="nav-link">Create</a>
        </div>
    </div>
</div>
<div class="card col-lg-12 p-2 ">
    <form data-url="{{route('post_create_trademark')}}" method="post" id="create_trademark">
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-5">
                <label for="tr_name">Tên Thương Hiệu :</label>
                <input type="text" class="form-control" name="tr_name" id="tr_name" placeholder="Nhập tên danh mục ...">
                <span class="text-danger err_tr_name fs-5"></span>
            </div>
            <div class="form-group mt-3">
                <label for="tr_logo" class="btn btn-lg btn-primary mb-3">Logo : <i class="fas fa-camera-retro fs-3 ms-2"></i></label>
                <input type="file" id="tr_logo" name="tr_logo" hidden>
                <div class="upload_logo" id="upload_tr_logo">
                    <i class="far fa-times-circle close_logo_preview"></i>
                    <label for="tr_logo" class="fa fa-plus fs-3 label_plus"></label>
                    <img src="" alt="" class="logo_preview " />
                </div>
                <span class="text-danger err_tr_logo fs-5"></span>
            </div>
            <div class="form-group mt-3">
                <label for="tr_desc">Mô Tả :</label>
                <textarea name="tr_desc" class="ckeditor form-control" id="tr_desc"></textarea>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-success btn-lg">Lưu <i class="fas fa-check ms-2"></i></button>
                <a href="{{ route ('list_trademark')}}" class="btn btn-danger btn-lg">Back List<i class="fas fa-undo ms-2"></i></a>
            </div>
        </div>
    </form>
</div>

@endsection