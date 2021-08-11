<table class="table table-striped table-bordered border-primary ">
    <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col">Thông Tin</th>
            <th scope="col">Mã Đơn Hàng</th>
            <th scope="col">Tổng Tiền</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Thời Gian</th>
            <th scope="col">Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list_order_onbyway as $key => $list)
            <tr>
                <td style="text-align: center;">{{ $key }}</td>
                <td>
                    <ul class="m-0">
                        <li>Name: {{ $list->od_name }}</li>
                        <li>Email: {{ $list->od_email }}</li>
                        <li>Phone: 0{{ $list->od_phone }}</li>
                        <li>Address: {{ $list->od_address }}</li>
                    </ul>
                </td>
                <td>{{ $list->od_code }}</td>
                <td>{{ number_format($list->od_total) }} VNĐ </td>
                <td>
                    @if ($list->od_status == 2)
                        <button class="btn  btn-primary">Đang Giao</button>
                    @endif
                </td>
                <td>{{ date('d-m-Y', strtotime($list->created_at)) }}</td>
                <td style="width: 220px">
                    <a href="{{ route('order_details', $list->id) }}" class="btn btn-md btn-success m-2"
                        title="Thông tin chi tiết">
                        Chi tiết <i class="ms-2 fas fa-info-circle "></i>
                    </a>
                    <div class="menu">
                        <a class="menu-button btn btn-info d-flex align-items-center">
                            Hành Động
                            <i class="ms-3 fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu menu-action">
                            <li>
                                <a data-url="{{ route('del_order', $list->id) }}" class=" delete_order" title="Xóa">
                                    <i class="mx-2 text-danger fas fa-trash-alt"></i> Xóa

                                </a>
                            </li>
                            <li class="dropdown-divider"> </li>
                            <li>
                                <a class="nav-link disabled" href="{{ route('action', ['id' => $list->id, '1']) }}">
                                    <i class="mx-2 text-info fas fa-check"></i> Duyệt
                                </a>
                            </li>
                            <li>
                                <a class="nav-link disabled" href="{{ route('action', ['id' => $list->id, '2']) }}">
                                    <i class="mx-2 text-primary fas fa-truck"></i> Đang Giao
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('action', ['id' => $list->id, '3']) }}">
                                    <i class="mx-2 text-success fas fa-check-double"></i></i> Đã Giao
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('action', ['id' => $list->id, '4']) }}" id="cancel_order_new"
                                    title="Hủy đơn">
                                    <i class="mx-2 text-danger fas fa-ban"></i> Hủy
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{!! $list_order_onbyway->links() !!}
