@extends('backend.layout.layout')
@section('content')
<!-- chi tiet san pham -->
<div class="table-text">
    <div class="links">
        <h1>Product</h1>
    </div>
    <div class="title">
         <div class="title-left">
               <h3>Danh Sách Đánh Giá</h3>
         </div>
         <div class="title-right">
              <p style="font-size: 25px;">
            Số Lượng:    {{count($list_rate)}}
</p>
         </div>
    </div>
    
</div>
<div class="table-add">
        <div class="col_2">
            @if(count($list_rate)>0)
            <table class="rate">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Tên</td>
                        <td>Mã Sản Phẩm</td>
                        <td>Sao</td>
                        <td>Nội Dung</td>
                        <td>Hành Động</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_rate as $ki => $od )
                    <tr>
                        <td><p>{{$ki}}</p></td>
                        <td><p> {{$od->User ->name}}</p></td>
                        <td><p>{{$od -> Product->MaSP}}</p> </td>
                        <td><p>{{$od->Star}}</p></td>
                        <td><p>{{$od->Content}}</p></td>
                        <td><a href="{{route('del_rate',$od->id)}}">Xóa</a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="links">
                    {{$list_rate->links()}}
            </div>
            @else
            <p style="width:100%;line-height:50px;font-size:30px;text-align:center;color:red;">Không Có Đánh Giá </p>
            @endif
           
        </div>
    </div>
<!-- ennd chi tiet san pham  -->


@endsection