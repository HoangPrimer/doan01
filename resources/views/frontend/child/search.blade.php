@if(count($search)>0)
                 @foreach($search as $pd)
                <div class="items-product">
                    <div class="frame-inner">
                        <div class="image">
                          
                            <a href="{{route('prode',$pd->id)}}">
                            <img src="{{$pd->Image()->value('File_Path')}}" alt="loading">
                            </a>
            
                            <span>Trả góp 0 %</span>
                            @if($pd->GiaKM !== 0)
                            <div class="sale">
                               Sale
                            </div>
                            @endif
                            @if($pd->Hot === "Có")
                            <div class="sale-1">
                                Hot
                            </div>
                            @endif
                        </div>
                        <div class="price">
                            <a href="{{route('prode',$pd->id)}}">{{$pd->MaSP}} </a>
                            <span>{{$pd->ThuongHieu}} - {{$pd->GioiTinh}} - {{$pd->KichCo}} - {{$pd->ChatLieuKinh}} </span>
                         
                           @if( $pd->GiaKM === 0 )
                           <h3>{{number_format($pd->GiaBan)}} - VND </h3>
                           
                           @else
                            <p>{{number_format($pd->GiaBan)}} - VND </p>
                            <h3>{{number_format($pd->GiaKM)}} - VND </h3>
                           
                           @endif
                           <a href="#" 
                               title="Thêm vào giỏ hàng" 
                               class="shopping"
                               data-url="{{route('addtocart',$pd->id)}}"><i class="fas fa-cart-plus"></i></a>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
               @endforeach
                   
                    <div class="next-page">
                    {{$search->links()}}
                    </div>
                    @else
                        <div class="not" style="width:100%; min-height:1000px;float:left;text-align:center;display:flex;align-items: center;">
                            <p style="font-size: 30px; color:blue; margin:0 auto">Hiện tại chưa có sản phẩm</p>
                        </div>
                 
                    @endif