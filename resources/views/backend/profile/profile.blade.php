@extends('backend.layout.layout')
@section('content')
    <div class="main-profile">
        <div class="mx-auto profile-info  ">
            <div class="mb-3">
                <img class="img-profile" src="{{ $profile->image }}" alt="">
            </div>
            <div class="mb-2">
                <h4>Thông Tin Cá Nhân</h4>
            </div>
            <div class="mb-2">
                <label>Họ Tên : {{ $profile->name }}</label>
            </div>
            <div class="mb-2">
                <label>Điện Thoại : 0{{ $profile->phone }}</label>
            </div>
            <div class="mb-2">
                <label>Email : {{ $profile->email }}</label>
            </div>
            <div class="mb-2">
                <label>Giới Tính : {{ $profile->gender }}</label>
            </div>
            <div class="mb-2">
                <label>Địa Chỉ : {{ $profile->address }}</label>
            </div>
            <div class="mt-3">
                <button class="btn btn-lg text-light btn-info btn-outline-primary" id="updateprofile"> Cập Nhật</button>
            </div>
        </div>
    </div>
    <div class="update-profile">
        <form class="col-lg-6 col-sm-12 update" id="update_profile" data-url="{{ route('post_update_profile', $profile->id) }}"
             enctype="multipart/form-data">
            @csrf
            <a class="url-profile" href="{{route('admin_profile',$profile->id)}}" hidden></a>
            <i class="fs-4 fas fa-window-close close-update"></i>
            <div class="mb-2">
                <h4 class="mb-5">Thông Tin Cá Nhân</h4>
            </div>
            <div class="mb-2">
                <label>Avatar :</label>
                <input class="form-control my-1" type="file" name="avatar">
                <p class="err_avatar text-danger "></p>
            </div>
            <div class="mb-2">
                <label>Họ Tên :</label>
                <input class="form-control my-1" type="text" name="name" value=" {{ $profile->name }}">
                <p class="err_name text-danger"></p>
            </div>
            <div class="mb-2">
                <label>Điện Thoại :</label>
                <input class="form-control my-1" type="text" name="phone" value=" 0{{ $profile->phone }}">
                <p class="err_phone text-danger"></p>
            </div>
            <div class="mb-2">
                <label>Giới Tính :</label>
                <input class="my-1 ms-5 me-3" type="radio" name="gender" value="Nam"  {{ ($profile->gender ?? '') == 'Nam' ? 'checked' : '' }} ><span>Nam</span>
                <input class="my-1 ms-5 me-3" type="radio" name="gender" value="Nữ"  {{ ($profile->gender ?? '') == 'Nữ' ? 'checked' : '' }}><span>Nữ</span>
                <p class="err_gender text-danger"></p>
            </div>
            <div class="mb-2">
                <label>Địa Chỉ :</label>
                <input class="form-control my-1" type="text" name="address" value=" {{ $profile->address }}">
                <p class="err_address text-danger"></p>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-lg text-light btn-primary"> Cập Nhật</button>
            </div>
        </form>
    </div>

@endsection
