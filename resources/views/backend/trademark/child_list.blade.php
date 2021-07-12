<thead>
    <tr>
        <th scope="col" class="text-center">#</th>
        <th scope="col">Tên</th>
        <th scope="col">Slug</th>
        <th scope="col">Logo</th>
        <th scope="col">Mô Tả</th>
        <th scope="col">Thời Gian</th>
        <th scope="col">Hành Động</th>
    </tr>
</thead>
<tbody>
    @foreach($list_trademark as $key => $list)
    <tr>
        <td style="text-align: center;">{{$key}}</td>
        <td class="col-sm-1">{{$list->tr_name}}</td>
        <td class="col-sm-1">{{$list->tr_slug}}</td>
        <td class="col-sm-1">
            <img src="{{$list->tr_logo}}" alt=""/ style="min-width: 100px;max-width: 100%; background-color: #d7ecdd;">
        </td>
        <td>{!!$list->tr_desc!!}</td>
        <td class="col-sm-1">{{$list->created_at}}</td>
        <td>
            <a href="{{ route ('update_trademark',$list->id)}}" class="btn btn-md btn-primary m-2">
                <i class="fas fa-pencil-alt"></i>
            </a>
            <a data-url="{{ route ('delete_trademark',$list->id)}}" class="btn btn-md btn-danger m-2" id="delete_trademark">
                <i class="fas fa-trash-alt"></i>
            </a>
        </td>
    </tr>
    @endforeach
</tbody>