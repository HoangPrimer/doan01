<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset ('/bootstaps5/css/bootstrap.css') }}">
    <link rel="stylesheet"  href="{{ asset ('/css/mycss.css') }}">
    <!-- <link rel="stylesheet"  href="{{ asset ('/css/frontend.css') }}">   -->
    <link href="{{asset('/css/fontawesome-free-5.15.3-web/css/all.css' )}}" rel="stylesheet"> <!--load all styles -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
    <title>Xwatch VN</title>
</head>
<body>

@if(session('message'))
            <div id="toast">
                 <div class="toast toast--success">
                     <div class="toast__icon">
                         <i class="far fa-check-circle"></i>
                    </div>
                     <div class="toast__body">
                         <p>{{ session('message') }}</p>
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
 
<header >
    <section class="navbar navbar-expand-xl navbar-expand-lg navbar-expand-md navbar-dark bg-dark">
        <div class="container">
                <div class="col-lg-3 col-md-4 col-sm-6 order-sm-first order-md-first">
                    <a class="navbar-brand" href="{{route('home')}}">
                        <img src="{{asset ('/image/default/logo.png')}}" alt="">
                    </a>
                </div>
                <div class="d-md-none col-sm-1 order-sm-4  ">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                </div>
              
                <div class="col-lg-3 col-md-4 col-sm-12 order-sm-5 order-md-1">
                    <div class="navbar-nav topbar-form-search">
                        <form class="d-flex" action="{{route('search')}}" id="serch_all" >
                            <input class="form-control me-3" type="text" name="keys" placeholder="bạn muốn tìm gì..." required>
                            <button  class="btn btn-outline-success btn-primary btn-lg " >
                                <i class="fas fa-search" style="color: #fff;"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 order-sm-1 order-md-2">
                    <div class="d-flex ">
                        <a href="#" class="alink-dark "> Lịch Sử Đặt Hàng </a>
                    </div>
                </div>
                <div class="col-lg-2  topbar-hotline order-md-3">
                    <div class="d-flex align-items-center ">
                        <i class="fas fa-phone-alt fs-1 me-4 text-light"></i>
                        <div class=" flex-column" >
                            <span class="color-red221 fs-5">Mua Hàng</span>
                            <a href="#" class="alink-dark fs-2">1900 0325</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 order-sm-2 order-md-4">
                    <div class=" header__cart">  
                            @include('frontend.layout.header')
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 order-sm-3 order-md-5">
                    <div class="header__profile dropdown">   
                                @include('frontend.layout.header1')
                    </div>
                </div>
        </div>
    </section>
    <nav class="navbar navbar-expand-lg  navbar-expand-md   navbar-dark bg-secondary p-0 ">
        <div class="container">
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link active " href="{{route('home')}}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="{{route('home')}}">
                            Thương Hiệu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('drec','Nam')}}">
                            Đồng Hồ Nam
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{route('drec','Nu')}}">
                            Đồng Hồ Nữ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('drec','Cap-Doi')}}">
                            Cặp Đôi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  disabled" href="#">
                            Giới Thiệu
                        </a>
                    </li>
                </ul> 
            </div>  
        </div>
    </nav>
</header>
<main >
                     @yield('content')
</main>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="footer__hotline">
                    <i class="fas fa-phone-volume"></i>
                    <a class="alink-dark" href="">
                        1900 0325
                        <span>TƯ VẤN BÁN HÀNG</span>
                    </a>
                </div>
                <div class="footer__hotline">
                    <i class="far fa-comment-dots"></i>
                    <a class="alink-dark" href="">
                        0247 306 2555
                        <span>HỖ TRỢ DỊCH VỤ</span>
                    </a>
                </div>
                <div class="footer__hotline">
                    <i class="fas fa-cog"></i>
                    <a class="alink-dark" href="">
                        0247 306 2555
                        <span>TƯ VẤN KỸ THUẬT</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="footer__info">
                    <ul class="menu-sub1">
                        <li><a href="">Chăm sóc khách hàng</a><li>
                        <li ><a href=""> Hướng dẫn mua hàng</a></li>
                        <li > <a href=""> Chính sách đổi trả</a></li>
                        <li > <a href=""> Chính sách bảo hành</a></li>
                        <li ><a href="">Tra cứu bảo hành</a></li>
                    </ul> 
                    <ul class="menu-sub1">
                        <li><a href="">Về Xwatch</a></li>
                        <li ><a href="">Giới thiệu về Xwatch</a></li>
                        <li ><a href="">Triết lý kinh doanh</a></li>
                        <li ><a href="">Giấy chứng nhận và giải thưởng</a></li>
                        <li ><a href="">Khách hàng nói gì về chúng tôi</a></li>
                    </ul>
                    <ul class="menu-sub1">
                        <li> <a href="">Tiện ích</a></li>
                        <li ><a href="">Kiến thức đồng hồ</a></li>
                        <li ><a href="">Thông tin liên hệ</a></li>
                        <li ><a href="">Tuyển dụng</a></li>
                    </ul>
                </div>
                <div class="footer__share">
                    <a href="">Đồng hồ chính hãng</a>
                    <a href="">Đồng hồ nam đẹp</a>
                    <a href="">Đồng hồ nữ giá rẻ</a>
                    <a href="">Orient </a>
                    <a href="">Seiko</a>
                    <a href="">Citizen </a>
                </div>
                <div class="footer__share1">
                    <a href="" class="blue"><i class="fab fa-facebook-f"></i></a>
                    <a href="" class="red"><i class="fab fa-youtube"></i></a>
                    <a href="" class="blue"><i class="far fa-envelope"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 ">
                <div class="line"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="footer__logo">
                    <a href=""><img src="{{ asset('/image/default/logo_footer.png')}}" ></a>
                </div>
            </div> 
            <div class="col-lg-9 col-md-9">
                <div class="footer__service">
                    <h3>SERVICE CENTER</h3>
                    <p>Miền Bắc: 2 Xã Đàn, Đống Đa, Hà Nội | Hotline: 0247.306.3555</p>
                    <p>Miền Nam: 378 Lý Thái Tổ, P10, Q10 (Vòng xoay Ngã Bảy) | Hotline: 1900.0325 (Nhánh 2)</p>
                    <p>- Giờ làm việc: 10h00 - 18h00</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="footer__logo">
                    <a href=""><img src="{{ asset('/image/default/logo_luxury.png')}}" ></a>
                    <a href=""><img src="{{ asset('/image/default/logo_tham_dinh.png')}}" ></a>
                    <a href=""><img class="small1 " src="{{ asset('/image/default/dathongbao.png')}}" ></a>
                    <a href=""><img class="small2  " src="{{ asset('/image/default/dmca_protected_21_120.png')}}" ></a>
                </div>
            </div> 
            <div class="col-lg-9 col-md-9">
                <div class="footer__address">
                    <div class="footer__address--tab">
                        <span class="tab-links act"  onclick="changeadd('region1',this)">HÀ NỘI</span>
                        <span class="tab-links"  onclick="changeadd('region2',this)">HỒ CHÍ MINH</span>
                    </div>
                    <div id="region1" class="region">
                        <ul class="region1">
                            <li class="name">Xwatch Đường Láng</li>
                            <li class="add"><i class="fas fa-map-marker-alt"></i> 472 Đường Láng, Đống Đa (Open: 8h30 - 21h30)</li>
                            <li class="add"> <i class="fas fa-phone-alt"></i>0939 868 388</li>
                        </ul>
                        <ul class="region1">
                            <li class="name">Xwatch Xã Đàn</li>
                            <li class="add"><i class="fas fa-map-marker-alt"></i> Số 2 Xã Đàn, Đống Đa, Hà Nội (Open: 8h30 - 21h30)</li>
                            <li class="add"> <i class="fas fa-phone-alt"></i>0961 688 182</li>
                        </ul>
                        <ul class="region1">
                            <li class="name">Xwatch Quang Trung</li>
                            <li class="add"><i class="fas fa-map-marker-alt"></i> 150 Quang Trung, Hà Đông (Open: 8h30 - 21h30)</li>
                            <li class="add"> <i class="fas fa-phone-alt"></i>0969 629 929</li>
                        </ul>
                        <ul class="region1">
                            <li class="name">Xwatch Xuân Thủy</li>
                            <li class="add"><i class="fas fa-map-marker-alt"></i>211 Xuân Thủy, Q. Cầu Giấy (Đối diện ĐHSP) (Open: 8h30 - 21h30)</li>
                            <li class="add"> <i class="fas fa-phone-alt"></i>0358 708 090</li>
                        </ul>
                        <ul class="region1">
                            <li class="name">Xwatch Luxury</li>
                            <li class="add"><i class="fas fa-map-marker-alt"></i> 318 phố Huế, Hai Bà Trưng (Open: 8h30 - 21h30)</li>
                            <li class="add"> <i class="fas fa-phone-alt"></i>0888882345</li>
                        </ul>
                        <ul class="region1">
                            <li class="name">Mua hàng Online</li>
                            <li class="add"><i class="fas fa-map-marker-alt"></i>Mua hàng: cskh.xwatch@gmail.com (Open: 8h30 - 18h00)</li>
                            <li class="add"> <i class="fas fa-phone-alt"></i>19000325</li>
                        </ul>
                    </div>
                    <div id="region2"  class="region">
                        <ul class="region1">
                            <li class="name">Xwatch N.T.Minh Khai</li>
                            <li class="add"><i class="fas fa-map-marker-alt"></i>26 N.T.Minh Khai, P. Đa Kao, Q1 (Open: 8h30 - 21h30)</li>
                            <li class="add"> <i class="fas fa-phone-alt"></i>082 999 5566</li>
                        </ul>
                        <ul class="region1">
                            <li class="name">Xwatch Lý Thái Tổ</li>
                            <li class="add"><i class="fas fa-map-marker-alt"></i>378 Lý Thái Tổ, P10, Q10 (Vòng xoay Ngã Bảy) (Open: 8h30 - 21h30)</li>
                            <li class="add"> <i class="fas fa-phone-alt"></i>0903 248 222</li>
                        </ul>
                        <ul class="region1">
                            <li class="name">Mua hàng Online</li>
                            <li class="add"><i class="fas fa-map-marker-alt"></i>Hỗ trợ mua hàng: cskh.xwatch@gmail.com (Open: 8h30 - 18h00)</li>
                            <li class="add"> <i class="fas fa-phone-alt"></i>19000325</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
   </div>  
</footer>
<script src="/bootstaps5/js/bootstrap.js"></script>
<script src="/js/xwatch.js"></script>
</body>

</html>

