<a href="{{route('shopping')}}" class="alink-dark position-relative">
    <i class="fas fa-shopping-cart fs-2"></i>
    @if(session('cart'))
        <span class="top-right bg-blue">{{count($cart)}}</span>
    @else
        <span class="top-right bg-blue">0</span>
    @endif
</a>