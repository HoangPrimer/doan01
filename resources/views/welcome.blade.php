<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>

            <div class="links">
                <a href="https://laravel.com/docs">Docs</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://blog.laravel.com">Blog</a>
                <a href="https://nova.laravel.com">Nova</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://vapor.laravel.com">Vapor</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>
    </div>
</body>

</html>
$a = $kichco[0]; switch ($a) { case '1': $product->where('pro_size', '
< ', ' 30 ');
        break;
    case ' 2 ':
        $product->whereBetween(' pro_size ', [30, 34]);
        break;
    case ' 3 ':
        $product->whereBetween(' pro_size ', [35, 39]);
        break;
    case ' 4 ':
        $product->whereBetween(' pro_size ', [40, 43]);
        break;
    case ' 5 ':
        $product->where(' pro_size ', '>', '43'); break; } if (!empty($kichco[1])) { $a = $kichco[1]; switch ($a) { case '1': $product->orwhere('pro_size', '
    < ', ' 30 ');
            break;
        case ' 2 ':
            $product->orwhereBetween(' pro_size ', [30, 34]);
            break;
        case ' 3 ':
            $product->orwhereBetween(' pro_size ', [35, 39]);
            break;
        case ' 4 ':
            $product->orwhereBetween(' pro_size ', [40, 43]);
            break;
        case ' 5 ':
            $product->orwhere(' pro_size ', '>', '43'); break; } $product->where('pro_category_id', $id)->where('pro_status', '1'); if (!empty($kichco[2])) { $a = $kichco[2]; switch ($a) { case '1': $product->orwhere('pro_size', '
        < ', ' 30 ');
                break;
            case ' 2 ':
                $product->orwhereBetween(' pro_size ', [30, 34]);
                break;
            case ' 3 ':
                $product->orwhereBetween(' pro_size ', [35, 39]);
                break;
            case ' 4 ':
                $product->orwhereBetween(' pro_size ', [40, 43]);
                break;
            case ' 5 ':
                $product->orwhere(' pro_size ', '>', '43'); break; } $product->where('pro_category_id', $id)->where('pro_status', '1'); if (!empty($kichco[3])) { $a = $kichco[3]; switch ($a) { case '1': $product->orwhere('pro_size', '
            < ', ' 30 ');
                    break;
                case ' 2 ':
                    $product->orwhereBetween(' pro_size ', [30, 34]);
                    break;
                case ' 3 ':
                    $product->orwhereBetween(' pro_size ', [35, 39]);
                    break;
                case ' 4 ':
                    $product->orwhereBetween(' pro_size ', [40, 43]);
                    break;
                case ' 5 ':
                    $product->orwhere(' pro_size ', '>', '43'); break; } $product->where('pro_category_id', $id)->where('pro_status', '1'); if (!empty($kichco[4])) { $a = $kichco[4]; switch ($a) { case '1': $product->orwhere('pro_size', '
                < ', ' 30 ');
                        break;
                    case ' 2 ':
                        $product->orwhereBetween(' pro_size ', [30, 34]);
                        break;
                    case ' 3 ':
                        $product->orwhereBetween(' pro_size ', [35, 39]);
                        break;
                    case ' 4 ':
                        $product->orwhereBetween(' pro_size ', [40, 43]);
                        break;
                    case ' 5 ':
                        $product->orwhere(' pro_size ', '>', '43'); break; } $product->where('pro_category_id', $id)->where('pro_status', '1'); } } } }