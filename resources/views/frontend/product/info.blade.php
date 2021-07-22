<div class="info__item">
                        <h2>đồng hồ {{$a->MaSP}}</h2>
                    </div>
                    @if(count($rate) > 0)
                    <div class="info__item">
                    @for( $i=1 ; $i<= 5 ; $i++)
                        @php if($i<=$avgstar){ $color='color: #4737d6;' ; }
                        else { $color=' color: #c6caca;' ; }
                        @endphp 
                        <zz data-index="{{$i}}" data-rating="{{$avgstar}}" class="fa fa-star" style="{{$color}};  font-size: 20px;padding:2px;"></zz>
                    @endfor
                        <span  >{{count($rate)}} Lượt đánh giá</span>
                    </div>
                    @endif
                    <div class="info__item">

                        @if( $a->GiaKM === 0 )
                        <gia>{{number_format($a->GiaBan)}} - VND </gia>

                        @else
                        <del>{{number_format($a->GiaBan)}} - VND </del>
                        <gia>{{number_format($a->GiaKM)}} - VND </gia>

                        @endif
                    </div>
                    <div class="info__item">
                        @if( $a->SoLuong === 0 )
                        <p>Trạng Thái: Hết hàng </p>
                        @else
                        <p>Trạng Thái: Còn Hàng </p>
                        @endif
                    </div>
                    <div class="info__item">
                        <div class="best__sale">
                            <h3>khuyến mãi</h3>
                            <p>Trả góp 0%: Mua đồng hồ chỉ với 333.000đ.</p>
                            <a href="">Xem chi tiết</a>
                            <p>Tặng gói Bảo hiểm Silver trị giá 2.000.000đ. </p>
                            <a href="">Xem chi tiết</a>
                        </div>
                    </div>
                    <div class="info__item">
                        <div  class="buy_now">
                            <a href="{{route('buy_now',$a->id)}}">Mua Ngay</a>
                        </div>
                    </div>
                    <div class="info__item">
                        <form action="">
                            <h2>Tư Vấn Miễn Phí</h2>
                            <input type="text" placeholder="Để lại số điện thoại ...">
                            <button>Gửi</button>
                        </form>
                    </div>