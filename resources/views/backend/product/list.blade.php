@extends('backend.layout.layout')
@section('content')
<div class="table-text">
    <div class="links">
        <h1>Product</h1>
    </div>
    <div class="title">
         <div class="title-left">
               <h3>Danh Sách Sản Phẩm</h3>
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
        <div class="col_2">
            @if(count($list)>0)
                <table class="list_product">
                    <thead>
                    <tr>
                        <td> STT</td>
                        <td> Tên</td>
                        <td> Ảnh</td>
                        <td>Số Lượng</td>
                        <td> Giá Bán</td>
                        <td> Giá KM</td>
                        <td> Hot</td>
                        <td> Hành Động</td>
                        <td>Flag_Del</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $key => $li)
                  
                    <tr>
                        <td> {{$key}}</td>
                        <td><a href="{{route('prode',$li->id)}}"> {{$li->MaSP}}</a></td>
                        <td>  @foreach( $li->Image as $Img)
                            <img  src="{{$Img->File_Path}}" alt="">
                            @endforeach
                        </td>
                        <td><p>{{$li->SoLuong}}</p></td>
                        <td> <p> {{number_format($li->GiaBan)}}</p> </td>
                        <td><p> {{number_format($li->GiaKM)}}</p> </td>
                        <td>  <p>{{$li->Hot}}</p></td>
                        <td> 
                            <a href="{{route('update_product',$li->id)}}">Cập Nhật</a>
                            
                        </td>
                        @if($li->Flag_Delete === 0)
                        <td> <a style="background-color: red;" href="{{route('delete_product',$li->id)}}">Ẩn</a></td>
                        @else
                        <td> <a style="background-color: #10bbda;" href="{{route('delete_product',$li->id)}}">Hiện</a></td>
                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                    
                </table>
                <div class="links">
                    {{$list->links()}}
                </div>
            @else
            <p style="width:100%;line-height:50px;font-size:30px;text-align:center;color:red;">Không Có Sản Phẩm </p>
                @endif
        </div>
</div>
@endsection