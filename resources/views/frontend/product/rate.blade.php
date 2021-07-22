<div class="rate_c">
    <div class="rate_c_left">
        @for( $i=1 ; $i<= 5 ; $i++) @php if($i<=$avgstar){ $color='color: #4737d6;' ; } else { $color=' color: #c6caca;' ; } @endphp
            <zzz data-index="{{$i}}" data-rating="{{$avgstar}}" class="fa fa-star" style="{{$color}};  font-size: 30px;padding:5px;"></zzz>
        @endfor
            <p>{{number_format($star,1)}}/5</p>
            <p> {{count($rate)}} Lượt đánh giá</p>
    </div>                   
    <div class="rate_c_center">
        @if(count($arrayRatings)>0)
        @foreach($arrayRatings as $key => $abc)
            <div class="main-item">
                <label for="">{{$key}} <small class="fa fa-star"></small></label>
                <div class="row_star">
                    <div class="zero" style="width:{{($abc['total'] / count($rate) *100)}}%;height:100%;background-color: #d4020d;"></div>
                </div>
                <label for="">{{ number_format(($abc['total'] / count($rate) *100))}}%</label>
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
    <div class="rate_c_right">
        <sa style="font-size: 18px;">Bạn đã trải nhiệm sản phẩm?</sa>
        <p  class="show_rate">Gửi Đánh Giá </p>
    </div>
</div>
                  
<form class="form_rate"  >
    <div class="star">  
    <input class="123" type="radio" name="rate" id="rate-5" value="5" required>
    <label for="rate-5" class="fa fa-star"></label> 
    <input  class="123" type="radio" name="rate" id="rate-4" value="4" required>
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
        <input name="id" class="id_rate" type="text" hidden value="{{$a->id}}">
        <textarea name="danhgia" id="" placeholder="Vui lòng đăng nhập trước khi Nhập đánh giá...." required></textarea>    
        <span class="error_text"></span>
             
        <a href="#" 
           title="Thêm vào giỏ hàng" 
            class="add_rate"
            data-url="{{route('product.rate',$a->id)}}"
        >
                            Gửi
        </a>
       
       
    </div>
</form>  

 @foreach($a-> Rate as $rate)
    <div class="content">
        <h4>{{$rate->User->name}}</h4>
    @for( $i=1 ; $i<= 5  ; $i++)
     @php
        if($i<= $rate->Star){
            $color  = 'color: #4737d6;';
        }
         else
        {
           $color  = ' color: #c6caca;';
        }
        @endphp
        <m data-index="{{$i}}" data-rating="{{$avgstar}}" class="fa fa-star" style ="{{$color}};font-size: 14px;"></m>
        @endfor
        <span>{{$rate->Content}}</span>
        <small>{{$rate->created_at}}</small>
    </div>
@endforeach  