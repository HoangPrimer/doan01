<div class="close">
                <i class="fa fa-times close1"></i>
            </div>
            <div class="top_info">
                <h2>Thông Tin Cá Nhân</h2>
            </div>
            <div id="info" class="bot_info">
                <div class="img">
                    <img style="width: 50px; height: 50px;" src="{{Auth::user()->image}}" alt="">
                </div>
                <div class="form_group">
                    <label for="name">Họ Tên : {{$user->name}}</label>
                </div>
                <div class="form_group">
                    <label for="email">Email : {{$user->email}}</label>
                </div>
                <div class="form_group">
                    <label for="phone">Điện Thoại : {{$user->phone}}</label>
                </div>
                <div class="form_group">
                    <label for="gender">Giới Tính : {{$user->gender}}</label>
                </div>
                <div class="form_group">
                    <label for="address">Địa Chỉ : {{$user->address}}</label>
                </div>
                <div class="btn">
                    <a class="update_info"> Cập Nhật Thông Tin</a>
                </div>
                           
            </div>
