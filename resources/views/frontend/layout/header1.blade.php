@if(Auth::check())
    <img src="{{Auth::user()->image}}" class="dropbtn"  alt="loading" onclick="myFunction()">
        <div id="myDropdown" class="dropdown-content">
            <a  href="{{ route('logout')}}" >Đăng Xuất</a> 
            <a  href="{{ route('profile',Auth::id())}}">Thông Tin Cá Nhân</a>
        </div>
@else
    <i class="fas fa-user-tie fs-2 dropbtn"  onclick="myFunction()" ></i> 
        <div id="myDropdown" class="dropdown-content"> 
            <a href="{{route('login')}}"></i>Đăng Nhập/Đăng Ký</a>
        </div>
@endif