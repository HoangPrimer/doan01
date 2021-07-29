<table class="table table-striped table-bordered border-primary ">
    <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col">Tên </th>
            <th scope="col">Mã SP</th>
            <th scope="col">Nội Dung</th>
            <th scope="col">Thời Gian</th>
            <th scope="col">Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list_rate as $key => $list)
            <tr>
                <td style="text-align: center; width: 50px">{{ $key }}</td>
                <td class="col-sm-2">{{ $list->User->name }}</td>
                <td class="col-sm-2">{{ $list->Product->pro_code }}</td>
                <td>{!! $list->r_content !!}</td>
                <td class="col-sm-1">{{ $list->created_at }}</td>
                <td style="width: 50px">
                    <a data-url="{{ route('del_rate', $list->id) }}" class="btn btn-md btn-danger m-2"
                        id="delete_rate">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $list_rate->links() }}
