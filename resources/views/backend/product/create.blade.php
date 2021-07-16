@extends('backend.layout.layout')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
    <h2 class="m-0">Tạo Mới Sản Phẩm </h2>
    <div class="nav">
        <div class="nav-item">
            <a href="" class="nav-link">Home /</a>
        </div>
        <div class="nav-item">
            <a href="" class="nav-link">Product /</a>
        </div>
        <div class="nav-item">
            <a href="" class="nav-link">Create</a>
        </div>
    </div>
</div>
<div class="card col-lg-12 p-2 ">
    <form data-url="{{route('post_create_product')}}" method="post" id="create_product">
        @csrf
        <div class="row mt-2">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <label for="pro_code">Mã Sản Phẩm:</label>
                <input type="text" class="form-control" name="pro_code" id="pro_code" placeholder="Nhập mã sản phẩm ...">
                <span class="text-danger err_pro_code fs-5"></span>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <label for="pro_category_id">Danh Mục:</label>
                <select type="text" class="form-control" name="pro_category_id" id="pro_category_id">
                    <option value="">Chọn --</option>
                    @foreach($list_category as $category)
                    <option value="{{$category->id}}"> {{$category->c_name}}</option>
                    @endforeach
                </select>
                <span class="text-danger err_pro_category_id fs-5"></span>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <label for="pro_trademark_id">Thương Hiệu:</label>
                <select type="text" class="form-control" name="pro_trademark_id" id="pro_trademark_id">
                    <option value="">Chọn --</option>
                    @foreach($list_trademark as $trademark)
                    <option value="{{$trademark->id}}"> {{$trademark->tr_name}}</option>
                    @endforeach
                </select>
                <span class="text-danger err_pro_trademark_id fs-5"></span>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <label for="pro_source">Nguồn Gốc:</label>
                <input type="text" class="form-control" name="pro_source" id="pro_source" placeholder="Nhập nguồn gốc ...">
                <span class="text-danger err_pro_source fs-5"></span>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <label for="pro_machine_type">Kiểu Máy :</label>
                <select type="text" class="form-control" name="pro_machine_type" id="pro_machine_type">
                    <option value="">Chọn --</option>
                    <option value="Quartz (Pin)"> Quartz (Pin)</option>
                    <option value="Automatic "> Automatic </option>
                    <option value="Năng Lượng Mặt Trời"> Năng Lượng Mặt Trời</option>
                    <option value="Kinetic"> Kinetic</option>
                    <option value="Lên cót tay"> Lên cót tay</option>
                </select>
                <span class="text-danger err_pro_machine_type fs-5"></span>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <label for="pro_size">Kích Cỡ (mm) :</label>
                <input type="text" class="form-control" name="pro_size" id="pro_size" placeholder="Nhập đường kính ...">
                <span class="text-danger err_pro_size fs-5"></span>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <label for="pro_thickness">Độ Dày (mm) :</label>
                <input type="text" class="form-control" name="pro_thickness" id="pro_thickness" placeholder="Nhập độ dày ...">
                <span class="text-danger err_pro_thickness fs-5"></span>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <label for="pro_shell_material">Chất Liệu Vỏ:</label>
                <input type="text" class="form-control" name="pro_shell_material" id="pro_shell_material" placeholder="Nhập chất liệu vỏ ...">
                <span class="text-danger err_pro_shell_material fs-5"></span>
            </div>
        </div>
        <div class="row mt-2 ">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <label for="pro_rope_material">Loại Dây:</label>
                <select type="text" class="form-control" name="pro_rope_material" id="pro_rope_material">
                    <option value="">Chọn --</option>
                    <option value="Thép Không Gỉ"> Thép Không Gỉ</option>
                    <option value="Dây Da"> Dây Da </option>
                    <option value="Dây vải"> Dây vải</option>
                    <option value="Titanium"> Titanium</option>
                    <option value="Dây Cao Su">Dây Cao Su</option>
                    <option value="Dây nhựa">Dây nhựa</option>
                </select>
                <span class="text-danger err_pro_rope_material fs-5"></span>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <label for="pro_glass_material">Kính :</label>
                <select type="text" class="form-control" name="pro_glass_material" id="pro_glass_material">
                    <option value="">Chọn --</option>
                    <option value="Kính Mica"> Kính Mica</option>
                    <option value="Kính Khoáng Crystal"> Kính Khoáng Crystal </option>
                    <option value="Kính Hardlex">Kính Hardlex</option>
                    <option value="Kính sapphire"> Kính sapphire</option>
                </select>
                <span class="text-danger err_pro_glass_material fs-5"></span>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <label for="pro_waterproof">Chống Nước(m):</label>
                <input type="number" class="form-control" name="pro_waterproof" id="pro_waterproof" placeholder="Nhập chống nước ...">
                <span class="text-danger err_pro_waterproof fs-5"></span>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <label for="pro_function">Chức Năng :</label>
                <input type="text" class="form-control" name="pro_function" id="pro_function" placeholder="Nhập chức năng ...">
                <span class="text-danger err_pro_function fs-5"></span>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <label for="pro_guarantee">Bảo Hành :</label>
                <input type="text" class="form-control" name="pro_guarantee" id="pro_guarantee" placeholder="Nhập bảo hành ...">
                <span class="text-danger err_pro_guarantee fs-5"></span>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <label for="pro_manufacturing">Nơi sản xuất :</label>
                <input type="text" class="form-control" name="pro_manufacturing" id="pro_manufacturing" placeholder="Nhập nơi sản xuất">
                <span class="text-danger err_pro_manufacturing fs-5"></span>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <label for="pro_amount">Số Lượng :</label>
                <input type="number" class="form-control" name="pro_amount" id="pro_amount" placeholder="Nhập số lượng">
                <span class=" text-danger err_pro_amount fs-5"></span>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <label for="pro_price_entry">Giá Nhập :</label>
                <input type="number" class="form-control" name="pro_price_entry" id="pro_price_entry" placeholder="Nhập giá nhập">
                <span class="text-danger err_pro_price_entry fs-5"></span>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <label for="pro_price">Giá Bán :</label>
                <input type="number" class="form-control" name="pro_price" id="pro_price" placeholder="Nhập giá bán ...">
                <span class="text-danger err_pro_price fs-5"></span>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <label for="pro_sale">Giá Được Giảm :</label>
                <input type="number" class="form-control " name="pro_sale" id="pro_sale" value="0">
                <span class="text-danger err_pro_sale fs-5"></span>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <label for="pro_hot">Hot :</label>
                <div class="form-control">
                    <input type="radio" class="form-check-input me-2" name="pro_hot" value="1"><span class="me-4">Có</span>
                    <input type="radio" class="form-check-input me-2" name="pro_hot" value="0"><span class="me-4">Không</span>
                </div>
                <span class="text-danger err_pro_hot fs-5"></span>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-6">
                <label for="pro_gender">Giới Tính :</label>
                <div class="form-control">
                    <input type="radio" class="form-check-input me-2" name="pro_gender" value="Nam"><span class="me-4">Nam</span>
                    <input type="radio" class="form-check-input me-2" name="pro_gender" value="Nữ"><span class="me-4">Nữ</span>
                    <input type="radio" class="form-check-input me-2" name="pro_gender" value="Cặp Đôi" class="me-4"><span>Cặp Đôi</span>
                </div>
                <span class="text-danger err_pro_gender fs-5"></span>
            </div>
        </div>
        <div class="row pb-2 mt-2">
            <div class="col-sm-12">
                <label>Ảnh : Chọn tối đa 5 ảnh.</label>
                <div class="table-responsive">
                    <table class="table  table-striped p-0 m-0">
                        <thead>
                            <tr class="d-flex p-3 list_pro_image justify-content-between">
                                <th class="list_pro_image_item">
                                    <i class="far fa-times-circle close_pro_image"></i>
                                    <label for="" class="fa fa-plus fs-3 label_pluss"></label>
                                    <input type="file" name="pro_image[]" id="pro_image" hidden />
                                    <img src="" alt="" class="pro_image " />
                                </th>
                                <th class="list_pro_image_item">
                                    <i class="far fa-times-circle close_pro_image"></i>
                                    <label for="" class="fa fa-plus fs-3 label_pluss"></label>
                                    <input type="file" name="pro_image[]" id="pro_image_1" hidden />
                                    <img src="" alt="" class="pro_image " />
                                </th>
                                <th class="list_pro_image_item">
                                    <i class="far fa-times-circle close_pro_image"></i>
                                    <label for="" class="fa fa-plus fs-3 label_pluss"></label>
                                    <input type="file" name="pro_image[]" id="pro_image_2" hidden />
                                    <img src="" alt="" class="pro_image " />
                                </th>
                                <th class="list_pro_image_item">
                                    <i class="far fa-times-circle close_pro_image"></i>
                                    <label for="" class="fa fa-plus fs-3 label_pluss"></label>
                                    <input type="file" name="pro_image[]" id="pro_image_3" hidden />
                                    <img src="" alt="" class="pro_image " />
                                </th>
                                <th class="list_pro_image_item">
                                    <i class="far fa-times-circle close_pro_image"></i>
                                    <label for="" class="fa fa-plus fs-3 label_pluss"></label>
                                    <input type="file" name="pro_image[]" id="pro_image_4" hidden />
                                    <img src="" alt="" class="pro_image " />
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <span class="text-danger err_pro_image  fs-5"></span>
                <span class="text-danger err_pro_image1  fs-5"></span>
            </div>
            <div class="col-sm-12 mt-2">
                <label for="pro_desc">Mô Tả :</label>
                <textarea name="pro_desc" class="ckeditor form-control" id="pro_desc"></textarea>
                <span class="text-danger err_pro_desc  fs-5"></span>
            </div>
            <div class="col-sm-12 mt-3">
                <button type="submit" class="btn btn-success btn-lg">Lưu <i class="fas fa-check ms-2"></i></button>
                <a href="{{ route ('list_product')}}" class="btn btn-danger btn-lg">Back List<i class="fas fa-undo ms-2"></i></a>
            </div>
        </div>
    </form>
</div>

@endsection