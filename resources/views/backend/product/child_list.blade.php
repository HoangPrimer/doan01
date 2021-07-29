<table class="table table-striped table-bordered border-primary ">
    <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col">Mã Sản Phẩm</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Số Lượng</th>
            <th scope="col"> Đã Bán</th>
            <th scope="col">Nổi Bật</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list_product as $key => $list)
            <tr>
                <td style="text-align: center;">{{ $key }}</td>
                <td>{{ $list->pro_code }}</td>
                <td class="d-flex justify-content-between p-2">
                    @foreach ($list->Image as $img)
                        <img src="{{ $img->img_file_path }}" alt=""
                            style="width:120px;margin:5px;border: 1px solid #ccc;" />
                    @endforeach
                </td>
                <td>{{ $list->pro_amount }}</td>
                <td>{{ $list->pro_amount_sell }}</td>
                <td>
                    @if ($list->pro_hot === 1)
                        <a data-url="{{ route('show_hot_product', $list->id) }}"
                            class="btn btn-md btn-danger show_hot_product">Không</a>
                    @else
                        <a data-url="{{ route('show_hot_product', $list->id) }}"
                            class="btn btn-md btn-primary show_hot_product">Có</a>
                    @endif
                <td>
                    @if ($list->pro_status === 1)
                        <a data-url="{{ route('show_hide_product', $list->id) }}"
                            class="btn btn-md btn-danger show_hide_product">Ẩn</a>
                    @else
                        <a data-url="{{ route('show_hide_product', $list->id) }}"
                            class="btn btn-md btn-primary show_hide_product">Hiện</a>
                    @endif
                </td>
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
