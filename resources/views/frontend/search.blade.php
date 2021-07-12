@extends('frontend.layout.layout')
@section('content')
<div class="xjsha">
    <div class="container">
        <div class="image-left">
            <img src="{{ asset ('/image/default/qc1.png')}}" alt="quang cao dong ho">
        </div>
       <div class="image-right">
           <img src="{{ asset ('/image/default/qc2.png')}}" alt="quang cao dong ho">
           <img src="{{ asset ('/image/default/qc3.png')}}" alt="quang cao dong ho">
       </div>
    </div>
</div>

<!-- danh sach san pham -->
<div class="main_product">
        
        <div class="container">
            <div class="back">
                <div class="list_directory">
                   <div class="list_items">
                       <div class="list_items-title">
                           <p>THƯƠNG HIỆU</p>
                       </div>
                       <div class="list_items-name">
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
                   </div> 
                   <div class="list_items">
                       <div class="list_items-title">
                           <p>mức giá</p>
                       </div>
                       <div class="list_items-name">
                                    <a href=""> dưới 2 TRIỆU</a>
                                    <a href=""> TỪ 2 TRIỆU - 5 TRIỆU</a>
                                    <a href="">TỪ 5 TRIỆU - 10 TRIỆU</a>
                                    <a href=""> TỪ 10 TRIỆU - 20 TRIỆU</a>
                                    <a href=""> TỪ 20 TRIỆU - 50 TRIỆU</a>
                                    <a href=""> TỪ 50 TRIỆU - 100 TRIỆU</a>
                       </div>
                   </div> 
                   <div class="list_items">
                       <div class="list_items-title">
                           <p>kiểu máy</p>
                       </div>
                       <div class="list_items-name">
                                    <a href=""> AUTOMATIC</a>
                                    <a href=""> QUARTZ</a>
                                    <a href="">NĂNG LƯỢNG MẶT TRỜI</a>
                                    <a href=""> KINETIC</a>
                                    <a href=""> LÊN CÓT TAY</a>
                       </div>
                   </div> 
                   <div class="list_items">
                       <div class="list_items-title">
                           <p> chất liệu dây</p>
                       </div>
                       <div class="list_items-name">
                                    <a href=""> THÉP KHÔNG GỈ</a>
                                    <a href=""> DÂY DA</a>
                                    <a href="">DÂY VẢI</a>
                                    <a href=""> TITANIUM</a>
                                    <a href=""> DÂY CAO SU</a>
                                    <a href=""> DÂY NHỰA</a>
                       </div>
                   </div> 
                   <div class="list_items">
                       <div class="list_items-title">
                           <p>size mặt</p>
                       </div>
                       <div class="list_items-name">
                                    <a href=""> < 30 MM</a>
                                    <a href=""> TỪ 30 MM - 34 MM</a>
                                    <a href="">TỪ 35 MM - 39 MM</a>
                                    <a href=""> TỪ 40 MM - 43 MM</a>
                                    <a href=""> TRÊN 43 MM</a>
                       </div>
                   </div> 
                </div>
             <div class="list_product">
                    <!-- <div class="fillter_product">
                        <zz>Sắp xếp theo:</zz>
                        <span class="aa1 acv new_product" onclick="change(this)">Mới Nhất</span>
                        <span class="aa1 hot_product" onclick="change(this)">Hot</span>
                        <select>
                            <option>Giá Thấp Đến Cao</option>
                            <option>Giá Cao Đến Thấp</option>
                        </select>
                    </div> -->
                    <div class="abcuahaa" style="display:inline;">
                    @include('frontend.child.search')
                    </div>
                   
            </div>     
        </div>
    </div>
</div>
<!-- end danh sach san pham -->

<!-- ly ca phe -->
<!-- <div class="xjsha">
    <div class="container">
        <div class="list_cup">
            <div class="plate"></div>
            <div class="cup">
                <div class="top">
                    <div class="vapour">
                        <span style="--i:1;"></span>
                        <span style="--i:18;"></span>
                        <span style="--i:3;"></span>
                        <span style="--i:16;"></span>
                        <span style="--i:5;"></span>
                        <span style="--i:13;"></span>
                        <span style="--i:20;"></span>
                        <span style="--i:7;"></span>
                        <span style="--i:10;"></span>
                        <span style="--i:8;"></span>
                        <span style="--i:17;"></span>
                        <span style="--i:9;"></span>
                        <span style="--i:3;"></span>
                        <span style="--i:17;"></span>
                        <span style="--i:11;"></span>
                        <span style="--i:14;"></span>
                        <span style="--i:9;"></span>
                        <span style="--i:15;"></span>
                        <span style="--i:4;"></span>
                        <span style="--i:19;"></span>
                    </div>
                    <div class="circle">
                        <div class="tea"></div>
                    </div>
                </div>
                <div class="handle"></div>
            </div>
        </div>
        <div class="list_cup">
            <div class="plate"></div>
            <div class="cup">
                <div class="top">
                    <div class="vapour">
                        <span style="--i:1;"></span>
                        <span style="--i:18;"></span>
                        <span style="--i:3;"></span>
                        <span style="--i:16;"></span>
                        <span style="--i:5;"></span>
                        <span style="--i:13;"></span>
                        <span style="--i:20;"></span>
                        <span style="--i:7;"></span>
                        <span style="--i:10;"></span>
                        <span style="--i:8;"></span>
                        <span style="--i:17;"></span>
                        <span style="--i:11;"></span>
                        <span style="--i:14;"></span>
                        <span style="--i:9;"></span>
                        <span style="--i:15;"></span>
                        <span style="--i:4;"></span>
                        <span style="--i:19;"></span>
                    </div>
                    <div class="circle">
                        <div class="tea"></div>
                    </div>
                </div>
                <div class="handle"></div>
            </div>
        </div>
        <div class="list_cup">
            <div class="plate"></div>
            <div class="cup">
                <div class="top">
                    <div class="vapour">
                        <span style="--i:1;"></span>
                        <span style="--i:18;"></span>
                        <span style="--i:3;"></span>
                        <span style="--i:16;"></span>
                        <span style="--i:5;"></span>
                        <span style="--i:13;"></span>
                        <span style="--i:20;"></span>
                        <span style="--i:7;"></span>
                        <span style="--i:10;"></span>
                        <span style="--i:8;"></span>
                        <span style="--i:17;"></span>
                        <span style="--i:11;"></span>
                        <span style="--i:14;"></span>
                        <span style="--i:9;"></span>
                        <span style="--i:15;"></span>
                        <span style="--i:4;"></span>
                        <span style="--i:19;"></span>
                    </div>
                    <div class="circle">
                        <div class="tea"></div>
                    </div>
                </div>
                <div class="handle"></div>
            </div>
        </div> 
    </div>
</div> -->
<!-- end ly ca phe -->

<!-- kien thuc dong ho -->
<div class="post_new">
        <div class="container">
            <div class="main-news">
                    <div class="news-title">
                        <span>kiến thức đồng hồ</span>
                    </div>
                    <div class="news-body">
                        <div class="item">
                            <div class="image">
                                <a href=""><img src="{{ asset ('/image/default/tin1.jpg')}}"alt=""></a>
                            </div>
                            <div class="text">
                                <a href="">TẤT TẦN TẬT VỀ ĐỒNG HỒ SEIKO 5: HUYỂN THOẠI VỀ...</a>
                                <p> <i class="far fa-calendar-alt"></i>19/04/2021</p>
                                <span>Cùng với Orient SK Mặt Lửa, Casio F91, Poljot, Rado Silver Star, hai đại diện danh giá đến từ thương ... </span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                            <a href=""><img src="{{ asset ('/image/default/tin2.png')}}" alt=""></a>
                            </div>
                            <div class="text">
                                <a href="">OGIVAL TRÂU VÀNG PHÚ QUÝ - BÁU VẬT PHONG THỦY...</a>
                                <p> <i class="far fa-calendar-alt"></i>04/02/2021</p>
                                <span>Năm Tân Sửu sở hữu Ngưu Vàng là chuẩn nhất, đặc biệt là các bác tuổi Sửu lại càng tuyệt vời hơn. ... </span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                            <a href=""><img src="{{ asset ('/image/default/tin3.jpg')}}" alt=""></a>
                            </div>
                            <div class="text">
                                <a href="">[NEW] SRWATCH GALAXY “LIMITED”: NGỠ TƯỞNG SIÊU ...</a>
                                <p> <i class="far fa-calendar-alt"></i>02/02/2021</p>
                                <span>Nếu nhìn thoáng qua, rất nhiều anh em sẽ lầm tưởng đẩy là siêu phẩm đình đám đến từ Thụy Sĩ - HUBLOT ... </span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                            <a href=""><img src="{{ asset ('/image/default/tin3.jpg')}}" alt=""></a>
                            </div>
                            <div class="text">
                                <a href="">[NEW] SRWATCH GALAXY “LIMITED”: NGỠ TƯỞNG SIÊU ...</a>
                                <p> <i class="far fa-calendar-alt"></i>02/02/2021</p>
                                <span>Nếu nhìn thoáng qua, rất nhiều anh em sẽ lầm tưởng đẩy là siêu phẩm đình đám đến từ Thụy Sĩ - HUBLOT ... </span>
                            </div>
                        </div>
                    </div>
                   
            </div>
        </div>
</div>
<!-- end kien thuc dong ho -->
@endsection