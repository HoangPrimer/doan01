@extends('backend.layout.layout')
@section('content')
<!-- chi tiet san pham -->
<div class="table-text">
    <div class="links">
        <h1>Product</h1>
    </div>
    <div class="title">
         <div class="title-left">
               <h3>Lịch Sử Hành Động</h3>
         </div>
         <div class="title-right">
              <p style="font-size: 25px;">
            Số Lượng:    {{count($list_history)}}
</p>
         </div>
    </div>
</div>
<div class="table-add">
        <div class="col_2">
            @if(count($list_history)>0)
            <table class="history">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Tên Admin </td>
                        <td>Hành Động</td>
                        <td>Mô Tả</td>
                        <td>Thời Gian</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_history as $ki => $od )
                    <tr>
                        <td><p>{{$ki}}</p></td>
                        <td><p> {{$od ->User->name}}</p></td>
                        <td><p>{{$od -> Action}}</p> </td>
                        <td><p>{{$od->Desc}}</p></td>
                        <td><p>{{$od->created_at}}</p></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="links">
                    {{$list_history->links()}}
            </div>
            @else
            <p style="width:100%;line-height:50px;font-size:30px;text-align:center;color:red;">Không Có Lịch Sử </p>
            @endif
           
        </div>
    </div>
<!-- ennd chi tiet san pham  -->


@endsection