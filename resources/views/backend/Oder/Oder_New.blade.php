@extends('backend.layout.layout')
@section('content')
<div class="table-text">
    <div class="links">
        <h1>Product</h1>
    </div>
    <div class="title">
         <div class="title-left">
               <h3>Đơn Hàng Mới</h3>
         </div>
       
         <div class="title-right">
              <p style="font-size: 25px;">
            Số Lượng:    {{count($new)}}
</p>
         </div>
    </div>
</div>
<div class="table-add">
        <div class="col_2">
        @if(count($new)>0)
                <table class="oder_new">
                    <thead>
                    <tr>
                        <td> STT</td>
                        <td> Tên Khách Hàng</td>
                        <td> Số Điện Thoại</td>
                        <td>Địa Chỉ</td>
                        <td>Email</td>
                        <td>Tổng Tiền</td>
                        <td>Thời Gian</td>
                        <td>Tình Trạng</p></td>
                        <td>Hành Động</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($new as $key => $li)
                  
                    <tr>
                        <td> <p>{{$key}}</p></td>
                        <td> <p>{{$li->Name}}</p></td>
                        <td> <p>{{$li->Phone}}</p></td>
                        <td><p>{{$li->Address}}</p></td>
                        <td><p>{{$li->Email}}</p></td>
                        <td> <p> {{number_format( $li->TongTien)}}</p></td>
                        <td> <p> {{$li->created_at}}</p></td>
                        <td>
                            @if($li->TrangThai === 'Chờ Duyệt')
                                <p style="color: red;"> {{$li->TrangThai}}</p>
                            @else
                                <p style="color: blue;"> {{$li->TrangThai}}</p>
                            @endif
                        </td>
                        <td> <a href="{{route('order_details',$li->id)}}">Xem Chi Tiết</a></td>
                        
                    </tr>
                    @endforeach
                    </tbody>
                    
                </table>
                <div class="link">
                    {{$new->links()}}
                </div>
            @else
                <p style="width:100%;line-height:50px;font-size:30px;text-align:center;color:red;">Không Có Đơn Hàng Mới</p>
            @endif
          
        </div>
</div>

@endsection