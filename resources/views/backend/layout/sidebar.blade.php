<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
    <div class="position-sticky pt-3">
        <div class="px-3 mb-3 d-flex align-items-center flex-wrap ">
            <div class="image">
                <img src="{{Auth::user()->image}}" style="width:50px; height:50px; border-radius:50%;" alt="User Image">
            </div>
            <div class="info ms-2 mt-2">
                <h4 class=" text-light ">{{Auth::user()->name}}</h4>
            </div>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item ">
                <a class="nav-link dropdown-btn abc " href="{{route('ad.home')}}">
                    <span> <i class="fas fa-home me-2"></i>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-btn">
                    <span><i class="fas fa-stream me-2"></i>Danh Mục</span>
                    <i class="fa fa-caret-down"></i>
                </a>
                <div class="dropdown-container">
                    <a class="nav-link abc " href="{{route('list_category')}}">Danh Sách </a>
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
                    <a class="nav-link abc" href="{{route('create_product')}}">Thêm Mới</a>
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