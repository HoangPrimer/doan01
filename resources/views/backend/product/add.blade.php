@extends('backend.layout.layout')
@section('content')

<div class="table-text">
    <div class="links">
        <h1>Product</h1>
    </div>
    <div class="title">
         <div class="title-left">
               <h3>THÊM SẢN PHẨM</h3>
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
<form action="{{route('p.a.product')}}" class="form" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
                <label for="masp">Mã Sản Phẩm :</label>
                
                <div class="error">
                <input type="text" name="masp" required>
                    @error('masp')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="nhanhieu">Nhãn Hiệu :</label>
                
                <div class="error">
                <input type="text" name="nhanhieu" required>
                    @error('nhanhieu')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
         <div class="form-group">
                <label for="kieumay">Kiểu Máy :</label>
                
                <div class="error" >
                <select name="kieumay" >
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
                <label for="nguongoc">Nguồn Gốc :</label>
               
                <div class="error">
                <input type="text" name="nguongoc" required>
                    @error('nguongoc')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
       
        <div class="form-group">
                <label for="kichco">Kích Cỡ, Đường Kính (mm):</label>
                
                <div class="error" >
                <input type="number" name="kichco" min="20" value="20" max="50" required>
                    @error('kichco')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="doday">Độ Dày (mm) :</label>
               
                <div class="error">
                <input type="number" name="doday" min="6" value="6" max="25" required>
                    @error('doday')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="chatlieuvo">Chất Liệu Vỏ :</label>
               
                <div class="error">
                <input type="text" name="chatlieuvo" required>
                    @error('chatlieuvo')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="chatlieuday">Chất Liệu Dây :</label>
               
                <div class="error">
                <select name="chatlieuday"  >
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
                <input type="text" name="chatlieukinh" required>
                    @error('chatlieukinh')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="dochiunuoc">Độ Chịu Nước (m) :</label>
               
                <div class="error">
                <input type="number" name="dochiunuoc" min="0" required value="1">
                    @error('dochiunuoc')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="chucnang">Chức Năng :</label>
               
                <div class="error">
                <input type="text" name="chucnang" required>
                    @error('chucnang')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="baohanh">Bảo Hành :</label>
               
                <div class="error">
                <input type="text" name="baohanh" required>
                    @error('baohanh')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="gioitinh">Giới Tính :</label>
               
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
                <label for="hot">Hot :</label>
               
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
                <input type="number" name="gianhap"  min="100000" value="100000" required>
                    @error('gianhap')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="gia">Giá Bán :</label>
               
                <div class="error">
                <input type="number" name="giaban"  min="100000" value="100000" required>
                    @error('giaban')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="giakm">Giá KM :</label>
               
                <div class="error">
                <input type="number" name="giakm"  min="100000" value="100000" required>
                    @error('giakm')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="form-group">
                <label for="soluong">Số Lượng :</label>
               
                <div class="error">
                <input type="number" name="soluong" min="1" value="1" required>
                    @error('soluong')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class="block">
                <label for="mota">Mô Tả :</label>
               
                <div class="error">
                <textarea name="mota" class="ckeditor "></textarea>
                <!-- <textarea name="mota" id="" ></textarea> -->
                    @error('mota')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
        </div>
        <div class=" block">
                <label for="anh">Ảnh : Chọn tối đa 5 ảnh và đúng định dạng bao gồm các đuôi 'jpg','png','jpeg','gif','psd','pdf'</label>
              
                    <div class="dandev-reviews">
                            <div class="form_upload">
                                <label class="dandev_insert_attach"><i class="fas fa-camera-retro"></i><span>Thêm Ảnh</span></label>
                                <!-- <input type="file" name="anh[]" class="dandev_insert_attach"> -->
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
                   THÊM 
               </button>
        </div>
</form>
                    
</div>
<!-- <script>
            $('.dandev_insert_attach').click(function(){
                if($('.list_attach').hasClass('show-btn')=== false){
                    $('.list_attach').addClass('show-btn');
                }

                var _lastimg= jQuery('.dandev_attach_view li').last().find('input[type="file"]').val();
                
                if(_lastimg != ''){
                    var d = new Date();
                    var _time = d.getTime();
                    var _html = '<li id="li_files_'+ _time + '" class="li_file_hide">';
                    _html += '<div class="img-wrap">';
                    _html += '<span class="close" onclick="DelImg(this)">x</span>';
                    _html += '<div class="img-wrap-box"></div>';
                    _html += '</div>';
                    _html += '<div class="'+ _time + '">';
                    _html += '<input name="anh[]" type="file" class="hidden"  onchange="uploadImg(this)" id="files_'+ _time + '" />';
                    _html += '</div>';
                    _html += '</li>';

                    jQuery('.dandev_attach_view').append(_html);
                    jQuery('.dandev_attach_view li').last().find('input[type="file"]').click();
                }
                else
                {
                    if(_lastimg == '') {
                        jQuery('.dandev_attach_view li').last().find('input[type="file"]').click();
                    }
                    else
                    {
                        if($('.list_attach').hasClass('show-btn')=== true){
                            $('.list_attach').removeClass('show-btn');
                }
                    }
                }
                
            })

            
    function uploadImg(el){
       var file_data = $(el).prop('files')[0];
       var type = file_data.type;
       var fileToLoad = file_data;

       var fileReader = new FileReader();
       fileReader.onload =  function(fileLoaderEvent){
               var srcdata = fileLoaderEvent.target.result;
               var nenwImage = document.createElement('img');
                    nenwImage.src = srcdata;

                    var _li = $(el).closest('li');
                    if(_li.hasClass('li_file_hide'))
                    {
                        _li.removeClass('li_file_hide')
                    }
                    _li.find('.img-wrap-box').append(nenwImage.outerHTML);
           }
           fileReader.readAsDataURL(fileToLoad);
       }
    
   function DelImg(el){
       jQuery(el).closest('li').remove();
   }
    
    

    </script> -->
@endsection