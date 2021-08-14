<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="{{ asset('/bootstaps5/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/backend.css') }}">
    <link href="{{ asset('css/fontawesome-free-5.15.3-web/css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://codeseven.github.io/toastr/build/toastr.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>




</head>

<body>
    <a id="url_list_category" data-url="{{ route('list_category') }}" hidden>location</a>
    <a id="url_list_trademark" data-url="{{ route('list_trademark') }}" hidden>location</a>
    <a id="url_list_product" data-url="{{ route('a.list_product') }}" hidden>location</a>

    @if (session('toastr'))
        <script>
            var TYPE_MESSAGE = "{{ session('toastr.type') }}";
            var MESSAGE = "{{ session('toastr.message') }}";
        </script>
    @endif

    @include('backend.layout.header')
    <div class="container-fluid  ">
        <div class="row">
            <!-- start  header -->
            @include('backend.layout.sidebar')
            <!-- end header  -->

            <!-- start main -->
            <main class="col-md-9 ms-sm-auto col-lg-10 p-3">
                @yield('content')
            </main>
            <!-- end   main -->
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl  bd-example-modal-lg  " id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered  modal-fullscreen-lg-down  modal-xl">
            <div class="modal-content">

            </div>
        </div>
    </div>



    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="/js/backend/layout.js"></script>
    <script type="text/javascript" src="/js/backend/home.js"></script>
    <script type="text/javascript" src="/js/backend/category.js"></script>
    <script type="text/javascript" src="/js/backend/trademark.js"></script>
    <script type="text/javascript" src="/js/backend/product.js"></script>
    <script type="text/javascript" src="/js/backend/order.js"></script>
    <script type="text/javascript" src="/js/backend/user.js"></script>
    <script type="text/javascript" src="/js/backend/admin.js"></script>
    <script type="text/javascript" src="/js/backend/profile.js"></script>
    <script src="/bootstaps5/js/bootstrap.js"></script>
    <script src="https://codeseven.github.io/toastr/build/toastr.min.js"></script>
</body>

</html>
