<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="{{ asset ('/bootstaps5/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{asset('css/backend/backend.css')}}">
    <link href="{{asset('css/fontawesome-free-5.15.3-web/css/all.css')}}" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
</head>

<body>
    <a id="url_list_category" data-url="{{route('list_category')}}" hidden>location</a>
    <a id="url_list_trademark" data-url="{{route('list_trademark')}}" hidden>location</a>
    <a id="url_list_product" data-url="{{route('a.list_product')}}" hidden>location</a>

    @include('backend.layout.header')
    <div class="container-fluid  ">
        <div class="row">
            <!-- start  header -->
            @include('backend.layout.sidebar')
            <!-- end header  -->

            <!-- start main -->
            <main class="col-md-9 ms-sm-auto col-lg-10 py-3">
                @yield('content')
            </main>
            <!-- end   main -->
        </div>
    </div>
    <script>
        let location_href = window.location.href;
        let menuItem = $('.abc');
        for (let i = 0; i < menuItem.length; i++) {
            if (menuItem[i].href === location_href) {
                $(menuItem[i]).parent('.dropdown-container').parent('.nav-item').find('.dropdown-btn').css('color', 'red');
                $(menuItem[i]).css('color', 'red');
            }
        }
    </script>
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/js/backend/layout.js"></script>
    <script type="text/javascript" src="/js/backend/category.js"></script>
    <script type="text/javascript" src="/js/backend/trademark.js"></script>
    <script type="text/javascript" src="/js/backend/product.js"></script>
    <script type="text/javascript" src="/js/backend/order.js"></script>
    <script src="/bootstaps5/js/bootstrap.js"></script>
</body>

</html>