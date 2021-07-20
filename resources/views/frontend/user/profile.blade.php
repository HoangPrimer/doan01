@extends('frontend/layout/layout')
@section('content')
<section id="login__register">  
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="info__profile">
                    @include('frontend.child.profile')
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>      
    </div>
</section>
@endsection
