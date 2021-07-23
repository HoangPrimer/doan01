<table class="table table-striped table-bordered border-primary ">
    <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col">Tên Khách Hàng</th>
            <th scope="col">Email</th>
            <th scope="col">Số Điện Thoại</th>
            <th scope="col">Tổng Tiền</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list_product as $key => $list)
            <tr>
                <td style="text-align: center;">{{ $key }}</td>
                <td>{{$list->od_name}}</td>
                <td>{{$list->od_email}}</td>
                <td>{{$list->od_phone}}</td>
                <td>{{$list->od_total}}</td>
                <td>{{$list->od_status}}</td>
                <td>
                    <a href="{{ route('update_product', $list->id) }}" class="btn btn-md btn-primary m-2" id="pro_abc">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a data-url="{{ route('delete_product', $list->id) }}" class="btn btn-md btn-danger m-2"
                        id="delete_product">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{!! $list_product->links() !!}
