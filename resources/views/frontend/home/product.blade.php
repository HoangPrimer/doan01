<div class="album py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="d-flex justify-content-center align-items-center">
                <h2 class="fw-normal">SẢN PHẨM NỔI BẬT</h2>
            </div>
            <div class="product__hot-menu">
                <span class="item_btn " onclick="change__product('nam',this)">ĐỒNG HỒ NAM</span>
                <span class="item_btn " onclick="change__product('nu',this)">ĐỒNG HỒ NỮ</span>
            </div>
        </div>

        <div id="nam" class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-3">
            @if(count($product_male)>0)
            @foreach($product_male as $male)
            <div class="col ">
                <div class="card ">
                    <div class="overflow-hidden position-relative">
                        <a href="{{ route('product.index',['category'=> $male ->Category->c_slug , 'id' => $male ->id]) }}" title="Chi tiết sản phẩm" class="image-product">
                            <img class="img-fluid " src="{{$male->Image()->value('img_file_path')}}" alt="loading">
                        </a>
                        <span class="bg-danger text-light tragop">Trả góp 0 %</span>
                        @if($male->pro_sale !== 0)
                        <div class="sale">
                            -{{number_format(100-$male->pro_sale*100/$male->pro_price)}}%
                        </div>
                        @endif
                        @if($male->pro_hot === 1)
                        <div class="sale-1">
                            Hot
                        </div>
                        @endif
                    </div>
                    <div class="card-body text-center">
                        <a href="{{route('product.index',['category'=> $male ->Category->c_slug , 'id' => $male ->id])}}" title="Chi tiết sản phẩm" class="d-block ">
                            {{$male->Trademark->tr_name}} - {{$male->pro_code}} - {{$male->pro_gender}} - {{$male->pro_size}} -
                            {{$male->pro_machine_type}} - {{$male->pro_glass_material}} - {{$male->pro_rope_material}}
                        </a>
                        @if( $male->pro_sale === 0 )
                        <gia class="d-block text-danger ">{{number_format($male->pro_price)}} - VND </gia>
                        @else
                        <del class="d-block text-dark ">{{number_format($male->pro_price)}} - VND </del>
                        <gia class="d-block text-danger ">{{number_format($male->pro_sale)}} - VND </gia>
                        @endif
                        @for($i=1;$i<=5;$i++) <sao data-index="{{$i}}" class="fa fa-star mb-2" style="color:blue;">
                            </sao>
                            @endfor
                            <a href="#" title="Thêm vào giỏ hàng" class="shopping btn btn-success px-4 me-3 d-block" data-url="{{route('addtocart',$male->id)}}">
                                <i class="fas fa-cart-plus "></i>
                            </a>
                            <!-- @for( $i=1 ; $i<= 5 ; $i++) @php if($i<=number_format( DB::table('rates')->where('Product_id',$male->id)->avg('Star'))){ $color='color: #4737d6;' ; }
                                    else { $color=' color: #c6caca;' ; }
                                    @endphp
                                    <zz data-index="{{$i}}" class="fa fa-star" style="{{$color}}"></zz>
                                    @endfor -->
                    </div>
                </div>
            </div>
            @endforeach

            <div class="w-100 text-center mt-5 ">
                <a href="" class="all-product"> <i class="fas fa-arrow-right me-2"></i>Xem tất cả đồng hồ nam </a>
            </div>
            @endif
        </div>
        <div id="nu" class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-3 ">
            @if(count($product_female)>0)
            @foreach($product_female as $male)
            <div class="col">
                <div class="card ">
                    <div class="overflow-hidden position-relative">
                        <a href="{{ route('product.index',['category'=> $male ->Category->c_slug , 'id' => $male ->id]) }}" title="Chi tiết sản phẩm" class="image-product">
                            <img class="img-fluid " src="{{$male->Image()->value('img_file_path')}}" alt="loading">
                        </a>
                        <span class="bg-danger text-light tragop">Trả góp 0 %</span>
                        @if($male->pro_sale !== 0)
                        <div class="sale">
                            -{{number_format(100-$male->pro_sale*100/$male->pro_price)}}%
                        </div>
                        @endif
                        @if($male->pro_hot === 1)
                        <div class="sale-1">
                            Hot
                        </div>
                        @endif
                    </div>
                    <div class="card-body text-center">
                        <a href="{{route('product.index',['category'=> $male ->Category->c_slug , 'id' => $male ->id])}}" title="Chi tiết sản phẩm" class="d-block ">
                            {{$male->Trademark->tr_name}} - {{$male->pro_code}} - {{$male->pro_gender}} - {{$male->pro_size}} -
                            {{$male->pro_machine_type}} - {{$male->pro_glass_material}} - {{$male->pro_rope_material}}
                        </a>
                        @if( $male->pro_sale === 0 )
                        <gia class="d-block text-danger ">{{number_format($male->pro_price)}} - VND </gia>
                        @else
                        <del class="d-block text-dark ">{{number_format($male->pro_price)}} - VND </del>
                        <gia class="d-block text-danger ">{{number_format($male->pro_sale)}} - VND </gia>
                        @endif
                        @for($i=1;$i<=5;$i++) <sao data-index="{{$i}}" class="fa fa-star mb-2" style="color:blue;">
                            </sao>
                            @endfor
                            <a href="#" title="Thêm vào giỏ hàng" class="shopping btn btn-success px-4 d-block" data-url="{{route('addtocart',$male->id)}}">
                                <i class="fas fa-cart-plus "></i>
                            </a>
                            <!-- @for( $i=1 ; $i<= 5 ; $i++) @php if($i<=number_format( DB::table('rates')->where('Product_id',$male->id)->avg('Star'))){ $color='color: #4737d6;' ; }
                                    else { $color=' color: #c6caca;' ; }
                                    @endphp
                                    <zz data-index="{{$i}}" class="fa fa-star" style="{{$color}}"></zz>
                                    @endfor -->
                    </div>
                </div>
            </div>
            @endforeach
            <div class="w-100 text-center mt-5 ">
                <a href="" class="all-product"> <i class="fas fa-arrow-right me-2"></i>Xem tất cả đồng hồ nữ </a>
            </div>
            @endif
        </div>
    </div>
</div>