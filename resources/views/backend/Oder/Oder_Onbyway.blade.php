@extends('backend.layout.layout')
@section('content')
<div class="table-text">
    <div class="links">
        <h1>Product</h1>
    </div>
    <div class="title">
         <div class="title-left">
               <h3>Đơn Đang Giao</h3>
         </div>
         <div class="title-right">
              <p style="font-size: 25px;">
            Số Lượng:    {{count($order_onbyway)}}
</p>
         </div>
    </div>
</div>
<div class="table-add">
        <div class="col_2">
            @if(count($order_onbyway)>0)
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
                    @foreach($order_onbyway as $key => $li)
                  
                    <tr>
                        <td> <p>{{$key}}</p></td>
                        <td> <p>{{$li->Name}}</p></td>
                        <td> <p>{{$li->Phone}}</p></td>
                        <td><p>{{$li->Address}}</p></td>
                        <td><p>{{$li->Email}}</p></td>
                        <td> <p> {{number_format( $li->TongTien)}}</p></td>
                        <td> <p> {{$li->create_at}}</p></td>
                        <td><p style="color: blue;">{{$li->TrangThai}}</p></td>
                        <td> <a href="{{route('order_details',$li->id)}}">Xem Chi Tiết</a></td>
                        
                    </tr>
                    @endforeach
                    </tbody>
                    
                </table>
                <div class="link">
                    {{$order_onbyway->links()}}
                </div>
            @else
            <p style="width:100%;line-height:50px;font-size:30px;text-align:center;color:red;">Không Có Đơn Hàng </p>
            @endif
        </div>
</div>
@endsection