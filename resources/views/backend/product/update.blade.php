@extends('backend.layout.layout')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h2 class="m-0">Cập Nhật Sản Phẩm </h2>
    <div class="nav">
        <div class="nav-item">
            <a href="" class="nav-link">Home /</a>
        </div>
        <div class="nav-item">
            <a href="" class="nav-link">Product /</a>
        </div>
        <div class="nav-item">
            <a href="" class="nav-link">Update</a>
        </div>
    </div>
</div>
<div class="card col-lg-12 p-2 ">
    <form data-url="{{route('post_update_product',$update_product->id)}}" method="post" id="update_product">
        @csrf
        <div class="row mt-2">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <label for="pro_code">Mã Sản Phẩm :</label>
                <input type="text" class="form-control" name="pro_code" id="pro_code" placeholder="{{$update_product->pro_code}}">
                <span class="text-danger err_pro_code fs-5"></span>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <label for="pro_category_id">Danh Mục Sản Phẩm : </label>
                <select type="text" class="form-control" name="pro_category_id" id="pro_category_id">
                    <option value="{{$update_product->Category->id}}">{{$update_product->Category->c_name}}</option>
                    @foreach($list_category as $category)
                    <option value="{{$category->id}}"> {{$category->c_name}}</option>
                    @endforeach
                </select>
                <span class="text-danger err_pro_category_id fs-5"></span>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <label for="pro_guarantee">Bảo Hành :</label>
                <input type="text" class="form-control" name="pro_guarantee" id="pro_guarantee" value="{{$update_product->pro_guarantee}}">
                <span class="text-danger err_pro_guarantee fs-5"></span>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 mt-2">
                <label for="pro_price">Giá Bán :</label>
                <input type="number" class="form-control" name="pro_price" id="pro_price" value="{{$update_product->pro_price}}">
                <span class="text-danger err_pro_price fs-5"></span>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6  mt-2">
                <label for="pro_sale">Giá Khuyến Mãi :</label>
                <input type="number" class="form-control" name="pro_sale" id="pro_sale" value="{{$update_product->pro_sale}}">
                <span class="text-danger err_pro_sale fs-5"></span>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6  mt-2">
                <label for="pro_amount">Số Lượng :</label>
                <input type="number" class="form-control" name="pro_amount" id="pro_amount" value="{{$update_product->pro_amount}}">
                <span class="text-danger err_pro_amount fs-5"></span>
            </div>
        </div>
        <div class="form-group mt-3">
            <label>Ảnh : Chọn tối đa 5 ảnh.</label>
            <div class="table-responsive">
                <table class="table  table-striped table-bordered p-0 m-0">
                    <thead>
                        <tr class="d-flex p-3 list_pro_image justify-content-between">
                            @foreach($update_product->Image as $key => $img)
                            <th class="list_pro_image_item">
                                <i class="far fa-times-circle close_pro_image"></i>
                                <label for="" class="fa fa-plus fs-3 label_pluss"></label>
                                <input type="file" name="pro_image[]" id="pro_image_{{$key}}" hidden />
                                <img src="{{$img->img_file_path}}" alt="" class="pro_image " />
                            </th>
                            @endforeach
                        </tr>
                    </thead>
                </table>
            </div>
            <span class="text-danger err_pro_image  fs-5"></span>
            <span class="text-danger err_pro_image1  fs-5"></span>
        </div>
        <div class="form-group mt-3">
            <label for="pro_desc">Mô Tả :</label>
            <textarea name="pro_desc" class="ckeditor form-control" id="pro_desc"> {{$update_product->pro_desc}}</textarea>
            <span class="text-danger err_pro_desc  fs-5"></span>
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success btn-lg">Lưu <i class="fas fa-check ms-2"></i></button>
            <a href="{{ route ('list_product')}}" class="btn btn-danger btn-lg">Back List<i class="fas fa-undo ms-2"></i></a>
        </div>
</div>
</form>
</div>

@endsection