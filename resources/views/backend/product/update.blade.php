@extends('backend.layout.layout')
@section('content')

<div class="table-text">
    <div class="links">
        <h1>Product</h1>
    </div>
    <div class="title">
         <div class="title-left">
               <h3>Cập Nhật Sản Phẩm</h3>
         </div>
         <div class="title-right">
              <a href="{{route('add_product')}}">
                ADD
                <i class="fas fa-plus"></i>
            </a>
         </div>
    </div>
</div>
<div class="table-add">
<form action="{{route('updates',$update->id)}}" class="form" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
                <label for="masp">Mã Sản Phẩm :</label>
                
                <div class="error">
                <input type="text" name="masp" required value="{{$update->MaSP}}">
                    @error('masp')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="nhanhieu">Nhãn Hiệu :</label>
                
                <div class="error">
                <input type="text" name="nhanhieu" required value="{{$update->ThuongHieu}}">
                    @error('nhanhieu')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
         <div class="form-group">
                <label for="kieumay">Kiểu Máy :</label>
                
                <div class="error" >
                <select name="kieumay" value="{{$update->KieuMay}}">
                    <option value="Automatic">AUTOMATIC</option>
                    <option value="Quartz">QUARTZ</option>
                    <option value="Năng Lượng Mặt Trời">Năng Lượng Mặt Trời</option>
                    <option value="KINETIC">KINETIC</option>
                    <option value="Lên Cót Tay">Lên Cót Tay</option>
                </select>
                    @error('kieumay')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="nguongoc" >Nguồn Gốc :</label>
               
                <div class="error">
                <input type="text" name="nguongoc" required value="{{$update->NguonGoc}}">
                    @error('nguongoc')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
       
        <div class="form-group">
                <label for="kichco">Kích Cỡ, Đường Kính (mm):</label>
                
                <div class="error" >
                <input type="number" name="kichco" min="20"  max="50" required value="{{$update->KichCo}}">
                    @error('kichco')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="doday">Độ Dày (mm) :</label>
               
                <div class="error">
                <input type="number" name="doday" min="6"  max="40" required value="{{$update->DoDay}}">
                    @error('doday')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="chatlieuvo">Chất Liệu Vỏ :</label>
               
                <div class="error">
                <input type="text" name="chatlieuvo" required value="{{$update->ChatLieuVo}}">
                    @error('chatlieuvo')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="chatlieuday">Chất Liệu Dây :</label>
               
                <div class="error">
                <select name="chatlieuday"  value="{{$update->ChatLieuDay}}">
                    <option value="Thép Không Gỉ">Thép Không Gỉ</option>
                    <option value="Dây Da">Dây Da</option>
                    <option value="Dây Vải">Dây Vải</option>
                    <option value="Titanium">Titanium</option>
                    <option value="Dây Cao Su">Dây Cao Su</option>
                    <option value="Dây Nhựa">Dây Nhựa</option>
                </select>
                    @error('chatlieuday')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="chatlieukinh">Chất Liệu Kính : </label>
               
                <div class="error">
                <input type="text" name="chatlieukinh" required value="{{$update->ChatLieuKinh}}">
                    @error('chatlieukinh')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="dochiunuoc">Độ Chịu Nước (m) :</label>
               
                <div class="error">
                <input type="number" name="dochiunuoc" min="0" required value="{{$update->DoChiuNuoc}}">
                    @error('dochiunuoc')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="chucnang">Chức Năng :</label>
               
                <div class="error">
                <input type="text" name="chucnang" required value="{{$update->ChucNang}}">
                    @error('chucnang')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="baohanh">Bảo Hành :</label>
               
                <div class="error">
                <input type="text" name="baohanh" required value="{{$update->BaoHanh}}">
                    @error('baohanh')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="gioitinh">Giới Tính : {{$update->GioiTinh}}</label>
               
                <div class="error">
                <input type="radio" name="gioitinh" value="Nam" required> Nam
                <input type="radio" name="gioitinh" value="Nu" required> Nữ
                <input type="radio" name="gioitinh" value="Cap-Doi" required> Cặp Đôi
                    @error('gioitinh')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="hot">Hot :{{$update->Hot}}</label>
               
                <div class="error">
                <input type="radio" name="hot" value="Có" required> Có
                <input type="radio" name="hot" value="Không" required> Không
                    @error('hot')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="gia">Giá Nhập:</label>
               
                <div class="error">
                <input type="number" name="gianhap"  min="100000" value="{{$update->GiaNhap}}" required>
                    @error('gianhap')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="gia">Giá Bán :</label>
               
                <div class="error">
                <input type="number" name="giaban"  min="100000" value="{{$update->GiaBan}}" required>
                    @error('giaban')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="giakm">Giá KM :</label>
               
                <div class="error">
                <input type="number" name="giakm"  min="100000" value="{{$update->GiaKM}}" required>
                    @error('giakm')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="soluong">Số Lượng :</label>
               
                <div class="error">
                <input type="number" name="soluong" min="1" value="{{$update->SoLuong}}" required>
                    @error('soluong')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="block">
                <label for="mota">Mô Tả :</label>
               
                <div class="error">
                <textarea name="mota" class="ckeditor " >{{$update->MoTa}}</textarea>
                <!-- <textarea name="mota" id="" ></textarea> -->
                     @error('mota')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="block">
                <label >Ảnh Cũ : </label>
                <div class="image" >
                    @foreach($update->Image as $img)
                        <img  src="{{$img->File_Path}}" alt="">
                    @endforeach
                </div>
        </div>
        <div class=" block">
                <label for="anh">Lưu Ý:  Nếu bạn thêm ảnh mới thì tất cả ảnh cũ sẽ bị xóa. Nên chọn đủ 5 ảnh để đảm bảo!!!</label>
                <label for="anh">Ảnh : Chọn tối đa 5 ảnh và đúng định dạng bao gồm các đuôi 'jpg','png','jpeg','gif','psd','pdf'</label>
              
                    <div class="dandev-reviews">
                            <div class="form_upload">
                                <label class="dandev_insert_attach"><i class="fas fa-camera-retro"></i><span>Thêm Ảnh</span></label>
                                <input type="file" name="anh[]" class="dandev_insert_attach" hidden>
                            </div>
                            <div class="list_attach ">
                                <ul class="dandev_attach_view">

                                </ul>
                                <span class="dandev_insert_attach"> <i class="dandev-plus">+</i></span>
                            </div>
                    </div>
                @error('anh')
                    <span>{{ $message }}</span>
                    @enderror
                    @error('anh.*')
                    <span>{{ $message }}</span>
                    @enderror
              
                   
                
         </div>
        <div class="block">
               <button type="submit">
                   Cập Nhật
               </button>
        </div>
</form>
                    
</div>

@endsection