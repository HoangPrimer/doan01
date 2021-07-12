@extends('frontend.layout.layout')
@section('content')
<section class=" bg-dark p-0">
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="/image/default/slide1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="/image/default/slide2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="/image/default/slide3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="/image/default/slide4.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="/image/default/slide5.jpg" class="d-block w-100" alt="...">
            </div>
           
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    </div>
</section>
<section class="my-3">
    <div class="container">
        <div class="row">
            <div class=" col-md-4 col-lg-12 col-md-12">
                <div class="product__hot-title">
                    <span class=" fw-normal">SẢN PHẨM NỔI BẬT</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" col-lg-12 col-md-12">
                <div class="product__hot-menu">
                    <span class="item_btn " onclick="change__product('nam',this)">ĐỒNG HỒ NAM</span>
                    <span class="item_btn " onclick="change__product('nu',this)">ĐỒNG HỒ NỮ</span>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class=" col-lg-12 col-md-12">
               
                <div id="nam" class="list__product">
                    @if(count($a)>0)
                        @foreach($a as $pd)
                        <div class="list__product--items">
                            <div class="fram__inner">
                                <div class="image">
                                    <a href="{{route('prode',$pd->id)}}" title="Chi tiết sản phẩm">
                                        <img src="{{$pd->Image()->value('File_Path')}}" alt="loading">
                                    </a>
                                    <span>Trả góp 0 %</span>
                                    @if($pd->GiaKM !== 0)
                                        <div class="sale">
                                            -{{number_format(100-$pd->GiaKM*100/$pd->GiaBan)}}%
                                        </div>
                                    @endif
                                    @if($pd->Hot === "Có")
                                        <div class="sale-1">
                                            Hot
                                        </div>
                                    @endif
                                </div>
                                <div class="price">
                                    <a href="{{route('prode',$pd->id)}}" title="Chi tiết sản phẩm">{{$pd->MaSP}} </a>
                                    <span>{{$pd->ThuongHieu}} - {{$pd->GioiTinh}} - {{$pd->KichCo}} - {{$pd->ChatLieuKinh}} </span>
                                    @if( $pd->GiaKM === 0 )
                                        <gia>{{number_format($pd->GiaBan)}} - VND </gia>
                                    @else
                                        <del>{{number_format($pd->GiaBan)}} - VND </del>
                                        <gia>{{number_format($pd->GiaKM)}} - VND </gia>
                                    @endif
                                    <a href="#" 
                                        title="Thêm vào giỏ hàng" 
                                        class="shopping"
                                        data-url="{{route('addtocart',$pd->id)}}"
                                        >
                                            <i class="fas fa-cart-plus"></i>
                                    </a>
                                        @for( $i=1 ; $i<= 5 ; $i++)
                                            @php if($i<= number_format( DB::table('rates')->where('Product_id',$pd->id)->avg('Star'))){ $color='color: #4737d6;' ; } 
                                                else { $color=' color: #c6caca;' ; } 
                                            @endphp
                                                <zz data-index="{{$i}}"  class="fa fa-star" style="{{$color}}"></zz>
                                        @endfor
                                </div>
                            </div>
                        </div>
                @endforeach
                        <div class="next-page">
                        <!-- <a href="#">Trang Tiếp Theo <i class="fas fa-arrow-right"></i></a> -->
                        {{$a->links()}}
                        </div>
                        @else
                    <div class="not" style="width:100%; min-height:300px;float:left;text-align:center;display:flex;align-items: center;">
                        <p style="font-size: 30px; color:blue; margin:0 auto">Hiện tại chưa có sản phẩm</p>
                    </div>
                @endif
                </div>
              
              
               
                <div id="nu" class="list__product">
                    @if(count($b)>0)
                    @foreach($b as $pd)
                    <div class="list__product--items">
                        <div class="fram__inner">
                            <div class="image">
                                <a href="{{route('prode',$pd->id)}}" title="Chi tiết sản phẩm">
                                    <img src="{{$pd->Image()->value('File_Path')}}" alt="loading">
                                </a>
                                <span>Trả góp 0 %</span>
                                @if($pd->GiaKM !== 0)
                                    <div class="sale">
                                        -{{number_format(100-$pd->GiaKM*100/$pd->GiaBan)}}%
                                    </div>
                                @endif
                                @if($pd->Hot === "Có")
                                    <div class="sale-1">
                                         Hot
                                    </div>
                                @endif
                            </div>
                            <div class="price">
                                <a href="{{route('prode',$pd->id)}}" title="Chi tiết sản phẩm">{{$pd->MaSP}} </a>
                                <span>{{$pd->ThuongHieu}} - {{$pd->GioiTinh}} - {{$pd->KichCo}} - {{$pd->ChatLieuKinh}} </span>
                                @if( $pd->GiaKM === 0 )
                                    <gia>{{number_format($pd->GiaBan)}} - VND </gia>
                                @else
                                    <del>{{number_format($pd->GiaBan)}} - VND </del>
                                    <gia>{{number_format($pd->GiaKM)}} - VND </gia>
                                @endif
                                <a href="#" 
                                    title="Thêm vào giỏ hàng" 
                                    class="shopping"
                                    data-url="{{route('addtocart',$pd->id)}}"
                                    >
                                        <i class="fas fa-cart-plus"></i>
                                </a>
                                    @for( $i=1 ; $i<= 5 ; $i++)
                                        @php if($i<= number_format( DB::table('rates')->where('Product_id',$pd->id)->avg('Star'))){ $color='color: #4737d6;' ; } 
                                            else { $color=' color: #c6caca;' ; } 
                                        @endphp
                                            <zz data-index="{{$i}}"  class="fa fa-star" style="{{$color}};" ></zz>
                                    @endfor
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div class="next-page">
                            {{$b->links()}}
                    </div>
                @else
                    <div class="not" style="width:100%; min-height:300px;float:left;text-align:center;display:flex;align-items: center;">
                        <p style="font-size: 30px; color:blue; margin:0 auto">Hiện tại chưa có sản phẩm</p>
                    </div>
                @endif
                </div>
               
            </div>
        </div>
    </div>
</section>

<section class="my-3 bg-secondary ">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="shipping__item">
                            <a  href="#" alt="1 đổi 1 trong vòng 30 ngày nếu lỗi của nhà sản xuất">
                                <svg x="0px" y="0px" viewBox="0 0 186.61 160.29" style="enable-background:new 0 0 186.61 160.29;" xml:space="preserve">
                                    <g>
                                    <g>
                                    <path d="M92.34,145.82c-30.88,0-57.83-22.02-64.09-52.35l-0.59-2.85H47.1L23.55,66.99L0,90.63h13.17l0.31,2    c6.04,38.57,39.94,67.66,78.86,67.66c36.62,0,67.9-24.54,77.11-59.38l-6.4,6.42l-8.1-8.13    C146.65,126.85,121.47,145.82,92.34,145.82"></path>
                                    <path d="M171.2,67.66C165.17,29.09,131.26,0,92.34,0C55.12,0,22.93,26.14,14.61,61.93l8.94-8.97l6.63,6.66    c8.77-26.78,33.78-45.15,62.17-45.15c30.88,0,57.83,22.02,64.08,52.35l0.59,2.85h-17.5l23.55,23.64l23.55-23.64h-15.09    L171.2,67.66z"></path>
                                    </g>
                                    <g>
                                    <path d="M86.79,157.04l-26.78-7.88l24.54-92.43H63.02l57.09-29.16L86.79,157.04z"></path>
                                    </g>
                                    </g>
                                </svg>	
                            </a>
                    <div class="shipping__item--link">
                        <a class="alink-dark text-uppercase" href="#" alt="1 đổi 1 trong vòng 30 ngày nếu lỗi của nhà sản xuất">1 đổi 1 trong vòng 30 ngày</a>
                        <a  class="alink-dark text-uppercase" href="#" alt="1 đổi 1 trong vòng 30 ngày nếu lỗi của nhà sản xuất">nếu lỗi của nhà sản xuất</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="shipping__item1">
                    <a href="#" alt="Miễn phí vận chuyển">
                        <svg x="0px" y="0px" viewBox="0 0 277.1 146.9" style="enable-background:new 0 0 277.1 146.9;" xml:space="preserve">
                                <style type="text/css">
                                    .th1{fill:none;stroke:#000000;stroke-width:9;stroke-linecap:round;stroke-miterlimit:10;}
                                    .th2{fill:#100F15;}
                                </style>
                                <g>
                                    <path class="th1" d="M137.3,106.7h50.3c6,0,10.8-4.8,10.8-10.8V15.3c0-6-4.8-10.8-10.8-10.8H58.2c-6,0-10.8,4.8-10.8,10.8v5.5"/>
                                    <path class="th1" d="M198.8,27.4h37.8c4.7,0,9,2.6,11.2,6.7l24.9,46.9v33.7c0,3.9-3.2,7.1-7.1,7.1h-19.7"/>
                                    <path class="th1" d="M48.4,108.6v8c0,3.7,3,6.7,6.7,6.7h30.3"/>
                                    <line class="th1" x1="127.8" y1="122.8" x2="202.1" y2="122.8"/>
                                    <path class="th1" d="M250.2,45.1H224v30.3c0,6.1,4.9,11,11,11h37.6"/>
                                    <circle class="th1" cx="222.9" cy="122.2" r="20.2"/>
                                    <circle class="th1" cx="222.9" cy="122.2" r="6.6"/>
                                    <circle class="th1" cx="106.7" cy="122.2" r="20.2"/>
                                    <circle class="th1" cx="106.7" cy="122.2" r="6.6"/>
                                    <g>
                                        <g>
                                            <path d="M103.9,48.1H91.8l-2.7,13.3h-7.6l6.6-33.1H110l-1.2,5.9H94.6l-1.6,8h12.1L103.9,48.1z"/>
                                            <path d="M115.6,48.7l-2.5,12.7h-7.6l6.6-33.1h12c3.4,0,6,0.9,7.8,2.7c1.9,1.8,2.5,4.2,1.9,7.2c-0.4,1.8-1.1,3.4-2.2,4.6     c-1.1,1.2-2.5,2.2-4.4,2.9c1.7,0.6,2.9,1.6,3.5,3c0.6,1.4,0.7,3,0.4,4.9l-0.4,2.1c-0.2,0.9-0.3,1.9-0.2,3c0,1.1,0.3,1.9,0.8,2.3     l-0.1,0.5h-7.8c-0.5-0.5-0.7-1.3-0.6-2.4c0.1-1.2,0.2-2.3,0.4-3.4l0.4-2c0.3-1.7,0.2-2.9-0.3-3.7c-0.5-0.8-1.5-1.2-3-1.2H115.6z      M116.8,42.8h4.5c1.2,0,2.2-0.4,3.1-1.1c0.9-0.7,1.5-1.7,1.7-3c0.3-1.4,0.1-2.5-0.4-3.3c-0.6-0.8-1.5-1.2-2.8-1.2h-4.4     L116.8,42.8z"/>
                                            <path d="M156.5,47.2h-11.8l-1.6,8.2h14l-1.2,5.9h-21.6l6.6-33.1h21.6l-1.2,5.9h-14l-1.4,7.1h11.8L156.5,47.2z"/>
                                            <path d="M181.3,47.2h-11.8l-1.6,8.2h14l-1.2,5.9h-21.6l6.6-33.1h21.6l-1.2,5.9h-14l-1.4,7.1h11.8L181.3,47.2z"/>
                                        </g>
                                        <g>
                                            <path d="M97.8,66.1c-1.4-1.3-3.4-2-5.9-2c-2.4,0-4.5,0.6-6.2,1.7c-1.7,1.1-2.8,2.7-3.2,4.8c-0.4,2,0,3.6,1.3,4.9     c1.3,1.3,3.2,2.4,5.9,3.4c1.4,0.6,2.4,1.2,2.8,1.6c0.5,0.5,0.6,1.2,0.4,2.2c-0.1,0.6-0.5,1.1-1.1,1.5c-0.4,0.3-0.9,0.5-1.4,0.5     c-0.1,0-0.1,0-0.2,0c-0.1,0-0.2,0-0.4,0c-0.2,0-0.4,0-0.7,0H81c0.3,1,0.8,1.9,1.8,2.5c1.7,1.2,3.8,1.8,6.2,1.8     c2.5,0,4.6-0.5,6.3-1.6c1.7-1.1,2.8-2.7,3.2-4.8c0.4-2.1,0.1-3.8-1-5.1c-1.1-1.3-2.9-2.4-5.3-3.2c-1.8-0.7-3-1.3-3.6-1.7     c-0.5-0.4-0.7-1.1-0.5-2c0.1-0.6,0.5-1,1.1-1.5c0.6-0.4,1.2-0.6,1.9-0.6c1,0,1.7,0.3,2.2,0.9c0.5,0.6,0.7,1.4,0.5,2.3h5.4l0-0.1     C99.7,69.2,99.3,67.4,97.8,66.1z"/>
                                            <path d="M118.6,88.7h-5.6l2-9.8h-7.9l-2,9.8h-5.6l4.9-24.3h5.6l-2,10.2h7.9l2-10.2h5.6L118.6,88.7z"/>
                                            <path d="M128,88.7h-5.6l4.9-24.3h5.6L128,88.7z"/>
                                            <path d="M139.1,80.4l-1.7,8.3h-5.6l4.9-24.3h9.3c2.5,0,4.5,0.7,5.9,2.2c1.4,1.5,1.8,3.4,1.4,5.7c-0.5,2.5-1.7,4.5-3.5,5.9     c-1.8,1.4-4.1,2.1-6.9,2.1H139.1z M140,76h3.8c1,0,1.9-0.3,2.6-1c0.7-0.7,1.2-1.5,1.4-2.6c0.2-1.1,0.1-2-0.3-2.7     c-0.4-0.7-1.2-1-2.3-1h-3.7L140,76z"/>
                                            <path d="M90.4,84.7L90.4,84.7l-0.2,0C90.3,84.7,90.3,84.7,90.4,84.7z"/>
                                        </g>
                                        <g>
                                            <path class="th2" d="M49.1,28.5c-15.8,0-28.7,12.9-28.7,28.7s12.9,28.7,28.7,28.7C65,85.9,77.8,73,77.8,57.2S65,28.5,49.1,28.5      M49.1,82.3C35.3,82.3,24,71,24,57.2c0-13.8,11.3-25.1,25.1-25.1c13.8,0,25.1,11.3,25.1,25.1C74.2,71,62.9,82.3,49.1,82.3"/>
                                            <polygon class="th2" points="62.7,82.3 52.9,72.6 28.7,96.7 12.4,96.7 56.3,52.8 85.8,82.3    "/>
                                            <path class="th2" d="M49.1,85.9C65,85.9,77.8,73,77.8,57.2S65,28.5,49.1,28.5c-15.8,0-28.7,12.9-28.7,28.7S33.3,85.9,49.1,85.9      M49.1,32.1c13.8,0,25.1,11.3,25.1,25.1c0,13.8-11.3,25.1-25.1,25.1C35.3,82.3,24,71,24,57.2C24,43.4,35.3,32.1,49.1,32.1"/>
                                            <polygon class="th2" points="35.6,32.1 45.4,41.8 69.5,17.7 85.8,17.7 41.9,61.6 12.4,32.1    "/>
                                        </g>
                                    </g>
                                    <line class="th1" x1="4.5" y1="106.7" x2="76.8" y2="106.7"/>
                                </g>
                        </svg>	
                    </a>
                    <div class="shipping__item--link">
                            <a  class="alink-dark text-uppercase" href="#" alt="Miễn phí vận chuyển">Miễn phí vận chuyển</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="shipping__item">
                        <a href="#" alt="Tặng gói bảo hành người dùng trong 5 năm">
                            <svg x="0px" y="0px" viewBox="0 0 198.9 199.07" style="enable-background:new 0 0 198.9 199.07;" xml:space="preserve">
                                <g>
                                    <path d="M50.53,47.99l-1.71-6.38l2.6,1.57c7.04-4.38,14.67-7.54,22.72-9.42l4.32-17.55h25.94l4.32,17.55   c8.05,1.87,15.68,5.04,22.72,9.42l15.47-9.36l3.28,3.28l-26.79,26.79l-0.93-0.65c-9.14-6.4-19.87-9.78-31.04-9.78   c-11.32,0-21.83,3.49-30.53,9.45L48.25,50.26L50.53,47.99z"/>
                                    <path d="M26.97,67.63l-1.21-2l5.63,1.51l2.27-2.27l12.72,12.72c-5.76,8.61-9.13,18.94-9.13,30.06c0,11.17,3.38,21.9,9.78,31.04   c3.61,5.15,8.04,9.6,13.17,13.23c9.18,6.49,19.98,9.91,31.22,9.91c29.88,0,54.18-24.3,54.18-54.18c0-11.25-3.43-22.05-9.91-31.22   l-0.66-0.93l26.77-26.77l3.44,3.44l-9.37,15.47c4.38,7.04,7.54,14.67,9.42,22.72l17.55,4.32v25.94l-17.55,4.32   c-1.88,8.05-5.04,15.69-9.42,22.72l9.37,15.47l-18.34,18.34l-15.47-9.36c-7.04,4.38-14.67,7.55-22.72,9.42l-4.32,17.55H78.46   l-4.31-17.55c-8.05-1.87-15.68-5.04-22.72-9.42l-15.47,9.36l-18.34-18.34l9.37-15.47c-4.38-7.04-7.54-14.67-9.42-22.72L0,120.61   V94.67l17.55-4.32C19.43,82.3,22.59,74.67,26.97,67.63"/>
                                    <path d="M4.95,31.7l14.53,14.53c0.76,0.76,1.99,0.76,2.75,0l7.4-7.4c0.76-0.76,0.76-1.99,0-2.75L15.1,21.56l3.22-3.21l22.64,6.07   l6.07,22.64l-3.22,3.22l42.46,42.46c1.62-0.56,3.35-0.88,5.16-0.88c2.45,0,4.76,0.57,6.82,1.57L167,24.66l-2.72-2.72l4.64-17.31   L186.23,0l3.3,3.3l-11.12,11.12c-0.58,0.58-0.58,1.52,0,2.1l3.97,3.97c0.58,0.58,1.52,0.58,2.1,0L195.6,9.36l3.3,3.3l-4.64,17.31   l-17.31,4.64l-2.72-2.72l-68.69,68.69c1.06,2.12,1.68,4.51,1.68,7.05c0,8.72-7.07,15.79-15.79,15.79   c-8.72,0-15.79-7.07-15.79-15.79c0-1.59,0.24-3.12,0.68-4.57L33.66,60.41l-3.21,3.21L7.81,57.56L1.74,34.92L4.95,31.7z"/>
                                </g>
                            </svg>	
                        </a>
                        <div class="shipping__item--link">
                                <a  class="alink-dark text-uppercase" href="#" alt="Tặng gói bảo hành người dùng trong 5 năm">Tặng gói bảo hành người </a>
                                <a  class="alink-dark text-uppercase" href="#" alt="Tặng gói bảo hành người dùng trong 5 năm">dùng trong 5 năm</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section> 

<section class="my-5">
        <div class="container">
           <div class="row">
               <div class="col-lg-12 col-md-12">
                   <div class="promotion__image">
                       <div class="promotion__image--left">
                            <img src="./image/default/bst-dong-ho-cho-nam_1562154973.jpg" alt="#">
                           
                        </div>
                        <div class="promotion__image--right">
                            <img src="./image/default/bst-danh-cho-nu_1562151982.jpg" alt="#">
                            <img src="./image/default/dong-ho-cap-doi_1593660350.jpg" alt="#">
                        </div>
                    </div>
               </div>
           </div>
        </div>
</section>

<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="feedback__title">
                    <span>KHÁCH HÀNG NÓI GÌ VỀ CHÚNG TÔI</span>
                </div>
            </div> 
        </div>
        <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="feedback__video">
                        <iframe src="https://www.youtube.com/embed/Eq3zOHKpaXI" frameborder="0"></iframe>
                        <div class="summary">
                            <i class="fab fa-xing"></i>
                            <span>Tôi thực sự an tâm và tin tưởng vào chất lượng dịch vụ của XWatch. Lần đầu tiên thấy chiếc đồng hồ của mình được chăm...</span>
                            <i class="fab fa-xing "></i>
                        </div>
                    </div>
                    <div class="bot-item">
                        <img src="./image/default/mc-thai-tuan-s_1562056608.jpg" alt="#">
                        <span>MC Thái Tuấn</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="feedback__video">
                        <iframe src="https://www.youtube.com/embed/-Nmvp5wOT9g?" frameborder="0"></iframe>
                        <div class="summary">
                            <i class="fab fa-xing"></i>
                            <span>Điều mà Linh ấn tượng nhất là chế độ bảo hành 5 năm theo tiêu chuẩn Thuỵ Sĩ cho cả lỗi người dùng. Điều này không phải...</span>
                            <i class="fab fa-xing "></i>
                        </div>
                    </div>
                    <div class="bot-item">
                        <img src="./image/default/dkl_1556784984.jpg" alt="#">
                        <span>Nhạc sĩ Dương Khắc Linh</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="feedback__video">
                        <iframe src="https://www.youtube.com/embed/UxbMGxGVh_A" frameborder="0"></iframe>
                        <div class="summary">
                            <i class="fab fa-xing"></i>
                                <span>Tôi ủng hộ những người đặt lợi ích của khách hàng làm mục tiêu phấn đấu. Vì vậy, tôi đã ủng hộ và lựa chọn XWATCH.</span>
                            <i class="fab fa-xing "></i>
                        </div>
                    </div>
                    <div class="bot-item">
                        <img src="./image/default/xuanbac1_1556785029.jpg" alt="#">
                        <span>Nghệ Sỹ Xuân Bắc</span>
                    </div>
                </div>
        </div>
    </div>
</section>

<section id="expertise">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="product__hot-title">
                    <span >THẨM ĐỊNH ĐỒNG HỒ</span>
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="expertise__image">
                    <a href="#"><img src="./image/default/250-trieu-mua-dong-ho-fake_1562925486.jpg" alt="#"></a>
                    <a href="#">CẢNH BÁO LỪA ĐẢO! 250 TRIỆU VẪN MUA PHẢI ĐỒNG HỒ ...</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="expertise__image">
                    <a href="#"><img src="./image/default/fake-min.jpg" alt="#"></a>
                    <a href="#">“80 - 90% ĐỒNG HỒ TẠI VIỆT NAM LÀ HÀNG GIẢ!”...</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="expertise__image">
                    <a href="#"><img src="./image/default/tham3.jpg" alt="#"></a>
                    <a href="#">THẨM ĐỊNH ĐỒNG HỒ - HÀNH TRÌNH MẠNH MẼ TẨY CHAY...</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="expertise__image">
                    <a href="#"><img src="./image/default/fake123.jpg" alt="#"></a>
                    <a href="#">"KHAI TỬ ĐỒNG HỒ FAKE" BÙNG NỔ TRÊN KHẮP CÁC MẶT...</a>
                </div>
            </div>
               
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3"></div>
            <div class="col-lg-6 col-md-6 ">
                <div class="expertise__title">
                    CLICK ĐỂ ĐĂNG KÝ THẨM ĐỊNH ĐỒNG HỒ
                </div>
            </div>
            <div class="col-lg-3 col-md-3"></div>
        </div>
            
    </div>
</section>

<section id="news">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="news__title">
                    <span>XWATCH - TIN TỨC VÀ SỰ KIỆN</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="news__item">
                    <a href="#"><img src="./image/default/tin1.jpg" alt="#"></a>
                    <a href="#">TẤT TẦN TẬT VỀ ĐỒNG HỒ SEIKO 5: HUYỂN THOẠI VỀ...</a>
                    <p> <i class="far fa-calendar-alt me-2"></i>19/04/2021</p>
                    <span>Cùng với Orient SK Mặt Lửa, Casio F91, Poljot, Rado Silver Star, hai đại diện danh giá đến từ thương ... </span>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="news__item">
                    <a href="#"><img src="./image/default/tin2.png" alt="#"></a>
                    <a href="#">OGIVAL TRÂU VÀNG PHÚ QUÝ - BÁU VẬT PHONG THỦY...</a>
                    <p> <i class="far fa-calendar-alt  me-2"></i>04/02/2021</p>
                    <span>Năm Tân Sửu sở hữu Ngưu Vàng là chuẩn nhất, đặc biệt là các bác tuổi Sửu lại càng tuyệt vời hơn. ... </span>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="news__item">
                    <a href="#"><img src="./image/default/tin3.jpg" alt="#"></a>
                    <a href="#">[NEW] SRWATCH GALAXY “LIMITED”: NGỠ TƯỞNG SIÊU ...</a>
                    <p> <i class="far fa-calendar-alt  me-2"></i>02/02/2021</p>
                    <span>Nếu nhìn thoáng qua, rất nhiều anh em sẽ lầm tưởng đẩy là siêu phẩm đình đám đến từ Thụy Sĩ - HUBLOT ... </span>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="news__tv">
                    <span>BÁO CHÍ NÓI VỀ XWATCH</span>
                    <a href="#">
                        <img src="./image/default/dantri_1557884275.jpg" alt="#">
                    </a>
                    <a href="#">
                        <img src="./image/default/vietnamnet-logo_1557884261.png" alt="#">
                    </a>
                    <a href="#">
                        <img src="./image/default/1200px-vtv1_logo_2013_finalsvg_1557884248.png" alt="#">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection