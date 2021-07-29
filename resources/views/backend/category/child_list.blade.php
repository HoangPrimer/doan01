<table class="table table-striped table-bordered border-primary ">
    <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Slug</th>
            <th scope="col">Mô Tả</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Thời Gian</th>
            <th scope="col">Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list_category as $key => $list)
            <tr>
                <td style="text-align: center;">{{ $key }}</td>
                <td class="col-sm-1">{{ $list->c_name }}</td>
                <td class="col-sm-1">{{ $list->c_slug }}</td>
                <td>{!! $list->c_desc !!}</td>
                @if ($list->c_status === 1)
                    <td><a data-url="{{ route('show_hide_category', $list->id) }}"
                            class="btn btn-md btn-danger show_hide_category">Ẩn</a></td>
                @else
                    <td><a data-url="{{ route('show_hide_category', $list->id) }}"
                            class="btn btn-md btn-primary show_hide_category">Hiện</a></td>
                @endif
                <td class="col-sm-1">{{ $list->created_at }}</td>
                <td>
                    <a href="{{ route('update_category', $list->id) }}" class="btn btn-md btn-primary m-2">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a data-url="{{ route('delete_category', $list->id) }}" class="btn btn-md btn-danger m-2"
                        id="delete_category">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $list_category->links() }}
