<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'
        integrity='sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=='
        crossorigin='anonymous' />

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
        border-bottom: 1px solid grey;
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

    .menu-guest {
        background-color: #1b3d79;
        padding: 5px 20px;
        display: flex;
        justify-content: space-between;
    }

    .link-brand {
        height: 100%;
        display: flex;
        align-items: center;
        color: #fff;
        text-decoration: none;
        font-size: 18px;
        font-weight: 600;
    }

    .img-logo {
        margin-right: 10px;
    }

    .list-menu-item {
        list-style: none;
        display: flex;
    }

    .menu-item {
        margin-right: 10px;
    }

    .menu-item:last-child {
        margin-right: 0px;
    }

    .menu-item a {
        color: #fff;
        text-decoration: none;
        font-size: 14px;
    }

    .icon-menu {
        margin-right: 5px;
    }
    </style>
</head>

<body>
    <nav class="menu-guest">
        <div class="menu-brand ">
            <a href="{{ url('guests.home') }}" class="link-brand">
                <img src="{{asset('images/carrefour-logomark.svg')}}" alt="logo-carrefour" class="img-logo">
                <span class="title-site">Carrefour</span>
            </a>
        </div>
        <div class="menu-right">
            <ul class="list-menu-item">
                <li class="menu-item">
                    <a href="#">
                        Serve aiuto? |
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        Volantini |
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        <i class="fa-solid fa-location-dot icon-menu"></i>
                        Punti vendita |
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        Servizi |
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        Carta Carrefour
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/admin') }}">Personal Area</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif
        <div id="root"></div>
    </div>


    {{-- JS --}}
    <script src="{{ asset('js/front-office.js') }}"></script>
</body>

</html>