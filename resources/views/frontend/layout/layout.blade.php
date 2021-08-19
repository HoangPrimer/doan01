<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/bootstaps5/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/frontend/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/frontend/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/frontend/index.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/frontend/category.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/frontend/product_details.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/frontend/login_register.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/frontend/profile.css') }}">
    <link href="{{ asset('/css/fontawesome-free-5.15.3-web/css/all.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://codeseven.github.io/toastr/build/toastr.min.css"> --}}

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Xwatch VN</title>
</head>

<body>
    <a data-url="{{ route('cart') }}" class="url_cart" hidden>aaaa</a>
    @if (session('toastr'))
    <script>
        var TYPE_MESSAGE = "{{ session('toastr.type') }}";
        var MESSAGE = "{{ session('toastr.message') }}";

    </script>
    @endif


    <!-- header -->
    <header id="header" class="sticky-top">
        @include('frontend.layout.header')
    </header>

    <!-- main -->
    <main id="main" style="background-color: rgb(241, 237, 237)">
        @yield('content')
    </main>

    <!-- footer -->
    <footer>
        @include('frontend.layout.footer')
    </footer>

    <!-- js -->

    <script src="/bootstaps5/js/bootstrap.js"></script>
    <script src="/js/frontend/profile_login.js"></script>
    <script src="/js/frontend/layout.js"></script>
    <script src="/js/frontend/index.js"></script>
    <script src="/js/frontend/shoppingcart.js"></script>
    <script src="/js/frontend/category_product.js"></script>
    <script src="/js/frontend/product_details.js"></script>
    <script src="/js/frontend/search.js"></script>
    <script src="https://codeseven.github.io/toastr/build/toastr.min.js"></script>
    <script>
        if (typeof TYPE_MESSAGE != "undefined") {
            switch (TYPE_MESSAGE) {
                case 'success':
                    toastr.success(MESSAGE);
                    break;
                case 'error':
                    toastr.error(MESSAGE);
                    break;
            }
        }

    </script>

    <script>
        // sap xep 
        $(document).on('change', '#sort_category_product', fillter);
        $(document).on('click', '.ckeck_product', fillter);

        function fillter() {
            let trademark = get_fillter_text('trademark');
            let may = get_fillter_text('may');
            let clday = get_fillter_text('clday');
            let price = $('#price:checked').val();
            let kichco = $('#kichco:checked').val();
            let id_category = $('.category_id').val();
            let key = $('#sort_category_product').val();

            $.ajax({
                url: "{{ route('category.sort') }}"
                , method: "GET"
                , dataType: 'json'
                , data: {
                    id: id_category
                    , key: key
                    , trademark: trademark
                    , price: price
                    , may: may
                    , clday: clday
                    , kichco: kichco
                , }
                , success: function(data) {
                    $('.category_product_list').html(data.abc);
                }
            , });
        };

        function fetch_data(page) {
            let trademark = get_fillter_text('trademark');
            let may = get_fillter_text('may');
            let clday = get_fillter_text('clday');
            let price = $('#price:checked').val();
            let kichco = $('#kichco:checked').val();
            let id_category = $('.category_id').val();
            let key = $('#sort_category_product').val();
            $.ajax({
                url: "{{ route('category.sort') }}"
                , method: "GET"
                , data: {
                    page: page
                    , key: key
                    , id: id_category
                    , trademark: trademark
                    , price: price
                    , may: may
                    , clday: clday
                    , kichco: kichco
                , }
                , success: function(data) {
                    $('.category_product_list').html(data.abc);
                }
            });

        };



        function get_fillter_text(text_id) {
            let fillterData = [];
            $('#' + text_id + ':checked').each(function() {
                fillterData.push($(this).val());
            });

            return fillterData;
        }


        $(document).on('click', '.page-link', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];

            fetch_data(page);

        });

    </script>

</body>

</html>
