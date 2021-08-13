<section class="navbar navbar-expand-lg navbar-expand-md navbar-dark bg-dark  ">
    <div class="container py-1 ">
        <div class=" col-lg-4 col-md-4 logo">
            <a class="navbar-brand " href="{{route('home')}}">
                <img src="{{asset ('/image/default/logo.png')}}" alt="">
            </a>
        </div>
        <div class="container-fluid order-2 order-md-1">
            <div class="row">
                <div class=" col-lg-6 col-md-12 p-0">
                    <form class="d-flex position-relative h-100 " action="{{route('search')}}" id="serch_all">
                        <input class="form-control" type="text" name="keys" placeholder="bạn muốn tìm gì..." required>
                        <button class="btn-search">
                            <i class="fas fa-search" style="color: #000;"></i>
                        </button>
                    </form>
                </div>
              
                <div class="col-lg-6 d-flex align-items-center justify-content-center topbar-hotline ">
                    <div class="d-flex ">
                        <i class="fas fa-phone-alt fs-1 me-4 text-light"></i>
                        <div class=" flex-column">
                            <span class="color-red221 fs-5">Mua Hàng</span>
                            <a href="#" class="alink-dark fs-4 d-block">1900 0325</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-md-2 col-sm-4 d-flex align-items-center justify-content-end dropdown p-0 order-1 order-md-2 ">
            <a href="{{route('cart')}}" class="alink-dark position-relative mt-1 ">
                <i class="fas fa-shopping-cart fs-2"></i>
                @if(session('cart'))
                <span class="amount-pro">{{count($cart)}}</span>
                @else
                <span class="amount-pro">0</span>
                @endif
            </a>
            @if(Auth::check())
            <img src="{{Auth::user()->image}}" class="dropbtn" alt="loading" onclick="myFunction()" />
            <div id="myDropdown" class="dropdown-content">
                <a href="{{ route('logout')}}">Đăng Xuất</a>
                <a href="{{ route('profile')}}" class="url-profile">Thông Tin Cá Nhân</a>
            </div>
            @else
            <i class="fas fa-user-tie fs-2 dropbtn" onclick="myFunction()"></i>
            <div id="myDropdown" class="dropdown-content">
                <a href="{{route('login')}}"></i>Đăng Nhập/Đăng Ký</a>
            </div>
            @endif
            <button class="navbar-toggler d-md-none ms-3 " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</section>
<nav class="navbar navbar-expand-lg navbar-expand-md  navbar-dark bg-secondary p-0 m-0">
    <div class="container">
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ">
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link active " href="{{route('home')}}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled text-light" href="{{route('home')}}">
                        Thương Hiệu
                    </a>
                </li>
                @if(!empty($category))
                @foreach($category as $cate)
                    @if(count(DB::table('products')->where('pro_category_id',$cate->id)->get())>0)
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{route('category.index',$cate->c_slug)}}">
                            {{$cate->c_name}}
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link disabled" href="">
                            {{$cate->c_name}}
                            </a>
                        </li>
                        @endif
                @endforeach
                @endif
                <li class="nav-item">
                    <a class="nav-link disabled text-light" href="{{route('home')}}">
                        Liên hệ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled text-light" href="{{route('home')}}">
                        Tin Tức
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
