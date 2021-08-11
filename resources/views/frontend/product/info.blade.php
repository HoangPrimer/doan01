<div class="d-flex flex-wrap mb-3">
    <h3 class="text-uppercase">đồng hồ {{$product->Trademark -> tr_name }} - {{$product->pro_code}}</h3>
</div>
@if(count($product->Rate) > 0)
<div class="d-flex flex-wrap my-3">
    @for( $i=1 ; $i<= 5 ; $i++) @php if($i<= number_format($product->Rate->avg('r_star'))){ $color='color: #4737d6;' ; } else { $color=' color: #c6caca;' ; } @endphp <sao data-index="{{$i}}" class="fa fa-star me-2" style="{{$color}};">
        </sao>
        @endfor
        <span class="ms-3 fs-5 text-primary">{{count($product->Rate)}} Lượt đánh giá</span>
</div>
@endif
<div class="d-flex flex-xl-column">

    @if( $product->pro_sale === 0 )
    <gia class="fs-3 text-danger ">{{number_format($product->pro_price)}} - VND </gia>

    @else
    <del class="fs-4">{{number_format($product->pro_price)}} - VND </del>
    <gia class="fs-3 text-danger">{{number_format($product->pro_sale)}} - VND </gia>

    @endif
</div>
<div class="d-block my-3">
    @if( $product->pro_amount === 0 )
    <p class="text-danger fs-5">Trạng Thái: Tạm Hết Hàng <i class="fas fa-times ms-3 "></i> </p>
    @else
    <p class="text-primary fs-5">Trạng Thái: Còn Hàng <i class="far fa-check-circle ms-3"></i></p>
    @endif
</div>
<div class="d-block mt-3">
    <div class="best__sale">
        <h3>khuyến mãi</h3>
        <p class="my-2">Trả góp 0%: Mua đồng hồ chỉ với 333.000đ.</p>
        <a class="my-2" href="">Xem chi tiết</a>
        <p class="my-2">Tặng gói Bảo hiểm Silver trị giá 2.000.000đ. </p>
        <a class="my-2" href="">Xem chi tiết</a>
    </div>
</div>
<div class="buy_now my-3">
    <a data-url="{{route('cart.add',$product->id)}}" class="buy-now">Mua Ngay</a>
</div>
<div class="info__item mt-3">
    <form action="">
        <h2>Tư Vấn Miễn Phí</h2>
        <input type="text" placeholder="Để lại số điện thoại ...">
        <button>Gửi</button>
    </form>
</div>
