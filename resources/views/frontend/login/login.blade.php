@extends('frontend/layout/layout')
@section('content')
<section id="login__register">  
    <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 col-md-12">
                <div class="login__register">
                   @include('frontend.child.login_register')
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>      
    </div>
</section>
@endsection