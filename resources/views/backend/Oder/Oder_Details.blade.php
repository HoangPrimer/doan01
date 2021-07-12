@extends('backend.layout.layout')
@section('content')
<!-- chi tiet san pham -->
<div class="table-text">
    <div class="links">
        <h1>Product</h1>
    </div>
    <div class="title">
         <div class="title-left">
               <h3>Chi Tiết Đơn Hàng</h3>
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
            <table class="details">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Tên Sản Phẩm</td>
                        <td>Đơn Giá</td>
                        <td>Số Lượng</td>
                        <td>Thành Tiền</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order_details->Item as $ki => $od )
                    <tr>
                        <td>{{$ki}}</td>
                        <td> {{$od->MaSP}}</td>
                        <td>{{number_format( $od->Gia)}} VNĐ</td>
                        <td>{{number_format( $od->SoLuong)}}</td>
                        <td>{{number_format( $od->TongTien)}} VNĐ</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <h2 >Tổng Tiền: {{number_format($order_details ->TongTien)}} VNĐ</h2>
            <div class="info">
                    
                
                    <div class="form-group">
                                <i class="fas fa-signature"></i><span> Họ Tên :</span>
                                <div class="col">
                                    <p>{{$order_details ->Name}}</p>
                                </div>
                    </div>
                    <div class="form-group">
                                <i class="fas fa-mobile-alt"></i><span> Số Điện Thoại :</span>
                                <div class="col">
                                    <p>{{$order_details ->Phone}}</p>
                                </div>
                    </div>
                    <div class="form-group">
                                <i class="fas fa-map-marked-alt"></i></i><span>Địa Chỉ :</span>
                                <div class="col">
                                    <p>{{$order_details ->Address}}</p>
                                </div>
                    </div>
                    <div class="form-group">
                                <i class="fas fa-at"></i></i><span>Email :</span>
                                <div class="col">
                                     <p>{{$order_details ->Email}}</p>
                                </div>
                    </div>
                    <div class="form-group">  
                                <i class="fas fa-venus-mars"></i></i><span>Giới tính :</span>
                                <div class="col">
                                    <p>{{$order_details ->Gender}}</p>
                                </div>
                    </div>
                    <div class="form-group">  
                                <i class="fas fa-dollar-sign"></i></i><span>Thanh Toán :</span>
                                <div class="col">
                                    <p>{{$order_details ->HinhThucThanhToan}}</p>
                                </div>
                    </div>
                    <div class="form-group">  
                                <i class="fas fa-clipboard-list"></i></i><span>Ghi Chú :</span>
                                <div class="col">
                                   <textarea name="note"> {{$order_details ->GhiChu}}</textarea>
                                   
                                </div>
                    </div>                          
                </div> 
                <div class="action">
                    <div class="items">
                        <h1>Hành Động</h1>
                    </div>
                    @if($order_details->TrangThai === 'Chờ Duyệt')
                    <div class="items">
                       <a href="{{route('accept',$order_details->id)}}">Duyệt</a>
                    </div>
                    <div class="items">
                        <a href="{{route('onbyway',$order_details->id)}}">Đang Giao</a>
                    </div>
                    <div class="items">
                        <a href="{{route('done',$order_details->id)}}">Đã Giao</a>
                    </div>
                    <div class="items">
                        <a href="{{route('del_oder',$order_details->id)}}">Xóa</a>
                    </div>
                    @else
                        @if($order_details->TrangThai === 'Đã Duyệt')
                        <div class="items">
                            <a href="{{route('onbyway',$order_details->id)}}">Đang Giao</a>
                        </div>
                        <div class="items">
                            <a href="{{route('done',$order_details->id)}}">Đã Giao</a>
                        </div>
                        <div class="items">
                            <a href="{{route('del_oder',$order_details->id)}}">Xóa</a>
                        </div>
                        @else
                            @if($order_details->TrangThai === 'Đang Giao')
                                <div class="items">
                                    <a href="{{route('done',$order_details->id)}}">Đã Giao </a>
                                </div>
                                <div class="items">
                                    <a href="{{route('del_oder',$order_details->id)}}">Xóa</a>
                                </div>
                                @else
                                <div class="items">
                                    <a href="{{route('del_oder',$order_details->id)}}">Xóa</a>
                                </div>
                            @endif
                        @endif
                    @endif
                </div>
        </div>
    </div>
<!-- ennd chi tiet san pham  -->


@endsection