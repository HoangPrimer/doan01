<table class="table table-striped table-bordered border-primary ">
    <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col">Tên </th>
            <th scope="col">Email</th>
            <th scope="col">SĐT</th>
            <th scope="col">Giới Tính</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">Thời Gian</th>
            <th scope="col">Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list_user as $key => $list)
            <tr>
                <td style="text-align: center; width: 50px">{{ $key }}</td>
                <td class="col-sm-2">{{ $list->name }}</td>
                <td class="col-sm-2">{{ $list->email }}</td>
                <td class="col-sm-1">{{ $list->phone }}</td>
                <td style="width: 100px">{{ $list->gender }}</td>
                <td >{{ $list->address }}</td>
                <td class="col-sm-1">{{ $list->created_at }}</td>
                <td style="width: 50px">
                    <a data-url="{{ route('del_user', $list->id) }}" class="btn btn-md btn-danger m-2"
                        id="delete_user">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $list_user->links() }}
