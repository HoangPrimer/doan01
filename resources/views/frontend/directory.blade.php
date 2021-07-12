@extends('frontend.layout.layout')
@section('content')
<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ads__left">
                    <img src="{{ asset ('/image/default/qc1.png')}}" alt="quang cao dong ho">
                </div>
                <div class="ads__right">
                    <img src="{{ asset ('/image/default/qc2.png')}}" alt="quang cao dong ho">
                    <img src="{{ asset ('/image/default/qc3.png')}}" alt="quang cao dong ho">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- danh sach san pham -->
<section id="product__hot">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                   <div class="list__fillter">
                        <p>THƯƠNG HIỆU</p>
                        <a href=""> OP OLYM PIANUS - OLYMPIA STAR</a>
                        <a href=""> ORIENT</a>
                        <a href="">BENTLEY</a>
                        <a href=""> OGIVAL</a>
                        <a href=""> CITIZEN</a>
                        <a href=""> FREELOOK</a>
                        <a href=""> SRWATCH</a>
                        <a href="">ELIXA</a>
                        <a href="">FESTINA</a>
                        <a href="">SEIKO</a>
                        <a href=""> BULOVA</a>
                   </div> 
                   <div class="list__fillter">
                        <p>mức giá</p>
                        <a href=""> dưới 2 TRIỆU</a>
                        <a href=""> TỪ 2 TRIỆU - 5 TRIỆU</a>
                        <a href="">TỪ 5 TRIỆU - 10 TRIỆU</a>
                        <a href=""> TỪ 10 TRIỆU - 20 TRIỆU</a>
                        <a href=""> TỪ 20 TRIỆU - 50 TRIỆU</a>
                        <a href=""> TỪ 50 TRIỆU - 100 TRIỆU</a>
                   </div> 
                   <div class="list__fillter">
                        <p>kiểu máy</p>
                        <a href=""> AUTOMATIC</a>
                        <a href=""> QUARTZ</a>
                        <a href="">NĂNG LƯỢNG MẶT TRỜI</a>
                        <a href=""> KINETIC</a>
                        <a href=""> LÊN CÓT TAY</a>
                   </div> 
                   <div class="list__fillter">
                        <p> chất liệu dây</p>
                        <a href=""> THÉP KHÔNG GỈ</a>
                        <a href=""> DÂY DA</a>
                        <a href="">DÂY VẢI</a>
                        <a href=""> TITANIUM</a>
                        <a href=""> DÂY CAO SU</a>
                        <a href=""> DÂY NHỰA</a>
                    </div>
                   <div class="list__fillter">
                        <p>size mặt</p>
                        <a href=""> < 30 MM</a>
                        <a href=""> TỪ 30 MM - 34 MM</a>
                        <a href="">TỪ 35 MM - 39 MM</a>
                        <a href=""> TỪ 40 MM - 43 MM</a>
                        <a href=""> TRÊN 43 MM</a>
                   </div> 
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="list__product">
                @if(count($a)>0)
                @foreach($a as $pd)
                    <div class="list__product--directory">
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
                        {{$a->links()}}
                </div>
                @else
                    <div class="not" style="width:100%; min-height:1000px;float:left;text-align:center;display:flex;align-items: center;">
                        <p style="font-size: 30px; color:blue; margin:0 auto">Hiện tại chưa có sản phẩm</p>
                    </div>
                @endif
            </div> 
        </div>
    </div>
</section>

<!-- kien thuc dong ho -->
<section id="news">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="news__title">
                    <span>KIẾN THỨC ĐỒNG HỒ</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="expertise__image">
                    <a href="#"><img src="./image/default/tin1.jpg" alt="#"></a>
                    <a href="#">TẤT TẦN TẬT VỀ ĐỒNG HỒ SEIKO 5: HUYỂN THOẠI VỀ...</a>
                    <p class="my-2"> <i class="far fa-calendar-alt"></i>19/04/2021</p>
                    <span>Cùng với Orient SK Mặt Lửa, Casio F91, Poljot, Rado Silver Star, hai đại diện danh giá đến từ thương ... </span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="expertise__image">
                    <a href="#"><img src="./image/default/tin2.png" alt="#"></a>
                    <a href="#">OGIVAL TRÂU VÀNG PHÚ QUÝ - BÁU VẬT PHONG THỦY...</a>
                    <p class="my-2"> <i class="far fa-calendar-alt"></i>04/02/2021</p>
                    <span>Năm Tân Sửu sở hữu Ngưu Vàng là chuẩn nhất, đặc biệt là các bác tuổi Sửu lại càng tuyệt vời hơn. ... </span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="expertise__image">
                    <a href="#"><img src="./image/default/tin3.jpg" alt="#"></a>
                    <a href="#">[NEW] SRWATCH GALAXY “LIMITED”: NGỠ TƯỞNG SIÊU ...</a>
                    <p class="my-2"> <i class="far fa-calendar-alt"></i>02/02/2021</p>
                    <span>Nếu nhìn thoáng qua, rất nhiều anh em sẽ lầm tưởng đẩy là siêu phẩm đình đám đến từ Thụy Sĩ - HUBLOT ... </span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <div class="expertise__image">
                    <a href="#"><img src="./image/default/tin3.jpg" alt="#"></a>
                    <a href="#">[NEW] SRWATCH GALAXY “LIMITED”: NGỠ TƯỞNG SIÊU ...</a>
                    <p class="my-2"> <i class="far fa-calendar-alt"></i>02/02/2021</p>
                    <span>Nếu nhìn thoáng qua, rất nhiều anh em sẽ lầm tưởng đẩy là siêu phẩm đình đám đến từ Thụy Sĩ - HUBLOT ... </span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end kien thuc dong ho -->
@endsection