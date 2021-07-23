<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset ('/bootstaps5/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset ('/css/frontend/layout.css') }}">
    <link rel="stylesheet" href="{{ asset ('/css/frontend/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset ('/css/frontend/index.css') }}">
    <link rel="stylesheet" href="{{ asset ('/css/frontend/category.css') }}">
    <link rel="stylesheet" href="{{ asset ('/css/frontend/product_details.css') }}">
    <link rel="stylesheet" href="{{ asset ('/css/frontend/login_register.css') }}">
    <link href="{{asset('/css/fontawesome-free-5.15.3-web/css/all.css' )}}" rel="stylesheet">
    <!--load all styles -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Xwatch VN</title>
</head>

<body>
    <a data-url="{{route('cart')}}" class="url_cart" hidden>aaaa</a>
    @if(session('message'))
    <div id="toast">
        <div class="toast toast--success">
            <div class="toast__icon">
                <i class="far fa-check-circle"></i>
            </div>
            <div class="toast__body">
                <p>{{ session('message') }}</p>
            </div>
            <div class="toast__close">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div>
    @endif
    @if(session('error'))
    <div id="toast">
        <div class="toast toast--error">
            <div class="toast__icon">
                <i class="far fa-check-circle"></i>
            </div>
            <div class="toast__body">
                {{ session('error') }}
            </div>
            <div class="toast__close">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div>
    @endif
    <!-- header -->
    <header id="header">
        @include('frontend.layout.header')
    </header>

    <!-- main -->
    <main>
        @yield('content')
    </main>

    <!-- footer -->
    <footer>
        @include('frontend.layout.footer')
    </footer>

    <!-- js -->
    <script src="/bootstaps5/js/bootstrap.js"></script>
    <script src="/js/frontend/xwatch.js"></script>
    <script src="/js/frontend/layout.js"></script>
    <script src="/js/frontend/index.js"></script>
    <script src="/js/frontend/shoppingcart.js"></script>
    <script src="/js/frontend/category_product.js"></script>
    <script src="/js/frontend/product_details.js"></script>

</body>

</html>
