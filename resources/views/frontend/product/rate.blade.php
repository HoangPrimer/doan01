<div class="rate_c">
    <div class="rate_c_left p-4">
        @for( $i=1 ; $i<= 5 ; $i++) @php if($i<=number_format($product->Rate->avg('r_star'))){ $color='color:
            #4737d6;';} else { $color=' color: #c6caca;' ; } @endphp
            <p data-index="{{$i}}"" class=" fa fa-star" style="{{$color}};  font-size: 20px;padding:5px;"></p>
            @endfor
            <p class="mt-2"> {{number_format($product->Rate->avg('r_star'),1)}}/5</p>
            <p class="mt-2"> {{count($product->Rate)}} Lượt đánh giá</p>
    </div>
    <div class="rate_c_center">
        @if(count($arrayRatings)>0)
        @foreach($arrayRatings as $key => $abc)
        <div class="main-item">
            <label for="">{{$key}} <small class="fa fa-star"></small></label>
            <div class="row_star">
                <div class="zero"
                    style="width:{{($abc['total'] / count($product->Rate) *100)}}%;height:100%;background-color: blue;border-radius:5px">
                </div>
            </div>
            <label
                class="text-primary fw-bold ">{{ number_format(($abc['total'] / count($product->Rate) *100)) }}%</label>
        </div>
        @endforeach
        @else
        <div class="main-item-1">
            <p>Sản Phẩm Chưa Có Đánh Giá</p>
        </div>
        <div class="main-item-1">
            <p>Hãy Là Người Đầu Tiên Đánh Giá Sản Phẩm Này</p>
        </div>
        <div class="main-item-1">
            <p>Cảm Ơn Bạn Rất Nhiều!!!</p>
        </div>
        @endif
    </div>
    <div class="rate_c_right p-3">
        <span class="fs-5 text-break text-center">Bạn đã trải nhiệm sản phẩm?</span>
        <p class="show_rate">Gửi Đánh Giá </p>
    </div>
</div>

<form class="form_rate">
    <div class="star">
        <input class="123" type="radio" name="rate" id="rate-5" value="5" required>
        <label for="rate-5" class="fa fa-star"></label>
        <input class="123" type="radio" name="rate" id="rate-4" value="4" required>
        <label for="rate-4" class="fa fa-star"></label>
        <input class="123" type="radio" name="rate" id="rate-3" value="3" required>
        <label for="rate-3" class="fa fa-star"></label>
        <input class="123" type="radio" name="rate" id="rate-2" value="2" required>
        <label for="rate-2" class="fa fa-star"></label>
        <input class="123" type="radio" name="rate" id="rate-1" value="1" required>
        <label for="rate-1" class="fa fa-star"></label>
    </div>
    <span class="error_star"></span>
    <div class="rate">
        <input name="id" class="id_rate" type="text" hidden value="{{$product->id}}">
        <textarea name="danhgia" placeholder="Vui lòng đăng nhập trước khi Nhập đánh giá...." required></textarea>
        <span class="error_text"></span>
        <a href="#" title="Thêm vào giỏ hàng" class="add_rate" data-url="{{route('product.rate',$product->id)}}">Gửi</a>
    </div>
</form>

@foreach($product->Rate as $rate)
<div class="content">
    <h5 class="m-0">{{$rate->User->name}}</h5>
    @for( $i=1 ; $i<= 5 ; $i++) @php if($i<=$rate->r_star){
        $color = 'color: #4737d6;';
        } else{
        $color = ' color: #c6caca;';
        }
        @endphp
        <m data-index="{{$i}}" class="fa fa-star my-2" style="{{$color}};font-size: 14px;"></m>
        @endfor
        <span>{{$rate->r_content}}</span>
        <small>{{$rate->created_at}}</small>
</div>
@endforeach