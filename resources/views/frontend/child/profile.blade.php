<div class="in4" id="a1">
    <div class="row_info">
        <img src="{{Auth::user()->image}}" alt="">
    </div>
    <div class="row_info">
        <label for="name">Họ Tên :</label> <span>{{$profile->name}}</span>
    </div>
    <div class="row_info">
        <label for="name">Số Điện Thoai :</label> <span>{{$profile->phone}}</span>
    </div>
    <div class="row_info">
        <label for="name">Email : </label><span>{{$profile->email}}</span>
    </div>
    <div class="row_info">
        <label for="name">Giới Tính :</label> <span>{{$profile->gender}}</span>
    </div>
    <div class="row_info">
        <label >Địa chỉ :</label><span> {{$profile->address}}</span>
    </div>
    <button class="update">Cập Nhật</but>
</div>
<div class="in4" id="a2">
    <i class="far fa-window-close huy"></i>
    <form  data-url="{{route('profiles')}}" enctype="multipart/form-data" method="post" id="form_upload"  >
        @csrf
        <div class="row_info">
            <h3>Cập Nhật Thông Tin</h3>
        </div>
        <div class="row_info">
            <label for="avatar">Avatar :</label>
                <div class="err">
                    <input type="file" name="avatar" >
                    <input type="text" hidden class="id_hidden"  name="id" value="{{$profile->id}}">
                    <p class="er_avatar"></p>
                </div>
        </div>
        <div class="row_info">
            <label for="name">Họ Tên : </label>
                <div class="err">
                    <input type="text" name="name"  value="{{$profile->name}}" >
                    <p class="er_name"></p>
                </div>
        </div>
        <div class="row_info">
            <label for="phone">Phone:</label>
                <div class="err">
                    <input type="text" name="phone"   value="{{$profile->phone}}">
                    <p class="er_phone"></p>
                </div>
        </div>
        <div class="row_info">
            <label for="gender">Giới tính : {{$profile->gender}}</label>
                <div class="err">
                    <input type="radio" name="gender"  value="Nam">Nam
                    <input type="radio" name="gender"  value="Nữ">Nữ
                    <p class="er_gender"></p>
                </div>
        </div>
        <div class="row_info">
            <label for="addresss">Địa Chỉ :</label>
                <div class="err">
                    <input type="text" name="address" value="{{$profile->address}}" >
                    <p class="er_address"></p>
                </div>
        </div>
        <button type="submit" >Gửi</button>
    </form>
</div>