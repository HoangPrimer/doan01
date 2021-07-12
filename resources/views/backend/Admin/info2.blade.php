<div class="close">
                <i class="fa fa-times close2"></i>
            </div>
            <div class="top_info">
                <h2>Thông Tin Cá Nhân</h2>
            </div>
<div id="change" class="bot_info">
            <form class="form_info" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form_group">
                    <input type="text" class="name" placeholder="Nhập họ tên" value="{{$user->name}}">
                    <p   class="err_name"></p>
                </div>
                <div class="form_group">
                    <input type="text" class="phone" placeholder="Nhập số điện thoại" value="{{$user->phone}}">
                    <p   class="err_phone"></p>
                </div>
                <div class="form_group">
                    <label for="gender" style="display: inline-block;width:100%">Giới Tính : {{$user->gender}}</label>
                    <input type="radio" name="gender"  value="Nam" ><span>Nam</span>
                    <input type="radio" name="gender"  value="Nữ" ><span>Nữ</span>
                    <p   class="err_gender"></p>
                </div>
                <div class="form_group">
                    <input type="text" class="address" placeholder="Nhập địa chỉ"  value="{{$user->address}}">
                    <p   class="err_address"></p>
                </div>
                <div class="btn">
                    <a data-url="{{route('change_profile')}}" data-id="{{Auth::id()}}" class="change_profile"> Ok </a>
                    <a class="back">Back</a>
                </div>
                </form>       
            </div>