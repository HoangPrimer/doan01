@extends('frontend.layout.layout')
@section('content')
<!-- chi tiet san pham -->

<section id="shopping_cart">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="shopping_cart" data-url="{{ route('delcart')}}">
                    @include('frontend.cart.cartcomponent')
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ennd chi tiet san pham  -->


@endsection