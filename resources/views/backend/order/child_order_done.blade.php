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
        @foreach ($list_order_done as $key => $list)
            <tr>
                <td style="text-align: center;">{{ $key }}</td>
                <td>{{ $list->od_name }}</td>
                <td>{{ $list->od_email }}</td>
                <td>{{ $list->od_phone }}</td>
                <td>{{ number_format($list->od_total) }} VNĐ </td>
                <td>{{ $list->od_status }}</td>
                <td style="width: 160px">
                    <a href="{{ route('order_details', $list->id) }}" class="btn btn-md btn-success m-2"
                       title="Thông tin chi tiết">
                        <i class=" fas fa-info-circle "></i>
                    </a>
                    <a href="{{ route('cancel_order', $list->id) }}" class="btn btn-md btn-primary m-2"
                     id="cancel_order_new" title="Hủy đơn"  >
                        <i class="fas fa-ban"></i>
                    </a>
                    <a data-url="{{ route('del_order', $list->id) }}" class="btn btn-md btn-danger m-2 delete_order"
                        title="Xóa">
                       <i class="fas fa-trash-alt"></i>
                   </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{!! $list_order_done->links() !!}