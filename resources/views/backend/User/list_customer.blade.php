@extends('backend.layout.layout')
@section('content')
<!-- chi tiet san pham -->
<div class="table-text">
    <div class="links">
        <h1>Product</h1>
    </div>
    <div class="title">
         <div class="title-left">
               <h3>Danh Sách Người Dùng</h3>
         </div>
         <div class="title-right">
              <p style="font-size: 25px;">
            Số Lượng:    {{count($list_customer)}}
</p>
         </div>
    </div>
</div>
<div class="table-add">
        <div class="col_2">
            @if(count($list_customer)>0)
            <table class="users">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Tên </td>
                        <td>Email</td>
                        <td>Điện Thoại</td>
                        <td>Giới Tính</td>
                        <td>Số Đơn Đã Mua</td>
                        <td>Hành Động</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_customer as $ki => $od )
                    <tr>
                        <td><p>{{$ki}}</p></td>
                        <td><p> {{$od ->name}}</p></td>
                        <td><p>{{$od -> email}}</p> </td>
                        <td><p>{{$od->phone}}</p></td>
                        <td><p>{{$od->gender}}</p></td>
                        <td><p>{{count($od->Oder)}}</p></td>
                        <td><a href="{{route('del_customer',$od->id)}}">Xóa</a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="links">
                    {{$list_customer->links()}}
            </div>
            @else
            <p style="width:100%;line-height:50px;font-size:30px;text-align:center;color:red;">Không Có Người Dùng </p>
            @endif
           
        </div>
    </div>
<!-- ennd chi tiet san pham  -->


@endsection