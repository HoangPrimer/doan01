<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="{{ asset ('/bootstaps5/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{asset('css/backend.css')}}">
    <link href="{{asset('css/fontawesome-free-5.15.3-web/css/all.css')}}" rel="stylesheet">
    <!--load all styles -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    @if(session('message'))
    <div id="toast">
        <div class="toasts toast--success">
            <div class="toast__icon">
                <i class="far fa-check-circle"></i>
            </div>
            <div class="toast__body">
                {{ session('message') }}
            </div>
            <div class="toast__close">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div>
    @endif
    @if(session('error'))
    <div id="toast">
        <div class="toast toast--error">
            <div class="toast__icon">
                <i class="far fa-check-circle"></i>
            </div>
            <div class="toast__body">
                {{ session('error') }}
            </div>
            <div class="toast__close">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div>
    @endif

    <header class="navbar navbar-expand-md navbar-dark sticky-top bg-dark flex-md-nowrap py-3 shadow">
        <a id="url_list_category" data-url="{{route('list_category')}}" hidden>location</a>
        <a id="url_list_trademark" data-url="{{route('list_trademark')}}" hidden>location</a>
        <a id="url_list_category" data-url="{{route('list_category')}}" hidden>location</a>
        <a id="url_list_category" data-url="{{route('list_category')}}" hidden>location</a>
        <a id="url_list_category" data-url="{{route('list_category')}}" hidden>location</a>
        <a id="url_list_category" data-url="{{route('list_category')}}" hidden>location</a>
        <a class="navbar-brand col-md-3 col-lg-2 col-sm-4 me-0 px-5 fs-4 " href="#">
            Admin LTE
        </a>
        <button class="navbar-toggler d-md-none collapsed me-3 " type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container-fluid">
            <input class="form-control form-control-dark w-100 " type="text" placeholder="Search" aria-label="Search">
            <div class="d-flex px-3">
                <div class="nav-item text-nowrap">
                    <a class="profile fs-6 text-light nav-link" href="#">Profile</a>
                </div>
                <div class="nav-item text-nowrap">
                    <a class="nav-link text-light  fs-6" href="{{route('logout')}}">Sign out</a>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid  ">
        <div class="row">
            <!-- start  header -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class="user-panel  p-1 mb-5  d-flex align-items-center flex-wrap ">
                        <div class="image">
                            <img src="{{Auth::user()->image}}" style="width:50px; height:50px; border-radius:50%;" alt="User Image">
                        </div>
                        <div class="info ms-2 mt-2">
                            <h4 class=" text-light ">{{Auth::user()->name}}</h4>
                        </div>
                    </div>

                    <ul class="nav flex-column">
                        <li class="nav-item ">
                            <a class="nav-link active dropdown-btn abc" aria-current="page" href="{{route('ad.home')}}">

                                <span> <i class="fas fa-home me-2"></i>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-btn">

                                <span><i class="fas fa-stream me-2"></i>Danh Mục</span>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-container">
                                <a class="nav-link abc" href="{{route('list_category')}}">Danh Sách </a>
                                <a class="nav-link abc" href="{{route('create_category')}}">Thêm Mới</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-btn">

                                <span><i class="fas fa-trademark me-2"></i>Thương Hiệu</span>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-container">
                                <a class="nav-link abc" href="{{route('list_trademark')}}">Danh Sách </a>
                                <a class="nav-link abc" href="{{route('create_trademark')}}">Thêm Mới</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-btn">

                                <span> <i class="fas fa-shopping-cart me-2"></i>Sản Phẩm</span>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-container">
                                <a class="nav-link abc" href="{{route('list_product')}}">Danh Sách </a>
                                <a class="nav-link abc" href="{{route('add_product')}}">Thêm Mới</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-btn">

                                <span> <i class="fas fa-file-alt me-2"></i>Đơn Hàng</span>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-container">
                                <a class="nav-link abc" href="{{route('order_new')}}">Đơn Hàng Mới</a>
                                <a class="nav-link abc" href="{{route('order_onbyway')}}">Đơn Hàng Đang Giao</a>
                                <a class="nav-link abc" href="{{route('oder_done')}}">Đơn Hàng Đã Giao</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-btn">

                                <span> <i class="fas fa-users me-2"></i>Người Dùng</span>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-container">
                                <a class="nav-link abc" href="{{route('list_comment')}}">Bình Luận</a>
                                <a class="nav-link abc" href="{{route('list_rate')}}">Đánh Giá</a>
                                <a class="nav-link abc" href="{{route('list_user')}}">Danh Sách Người Dùng</a>
                                <a class="nav-link abc" href="{{route('list_customer')}}">Danh Sách Khách Hàng</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-btn">
                                <span> <i class="fas fa-users-cog me-2"></i>Quản Trị</span>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-container">
                                <a class="nav-link abc" href="{{route('list_admin')}}">Danh Sách Admin</a>
                                <a class="nav-link abc" href="{{route('history_action')}}">Lịch Sử Hoạt Động</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- end header  -->

            <!-- start main -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>

            <!-- end   main -->
        </div>
    </div>

    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/js/backend.js"></script>
    <script src="/bootstaps5/js/bootstrap.js"></script>
</body>

</html>