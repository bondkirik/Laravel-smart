<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Shop: @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/js/app.js" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">{{ __('My Shop') }}</a>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
                    <li class="nav-item @active('index')" >
                        <a class="nav-link" href="{{ route('index') }}">{{ __('Service') }}</a>
                    </li>
                    <li class="nav-item @active('categor*')">
                        <a class="nav-link" href="{{ route('categories') }}">{{ __('Categories') }}</a>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav navbar-right">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @endguest
                    @auth
                        @admin
                        <li><a class="nav-link" href="{{ route('home') }}">{{ __('Admin') }}</a></li>
                        @else
                        <li><a class="nav-link" href="{{ route('person.orders.index') }}">{{ __('My Orders') }}</a></li>
                        @endadmin
                        <li><a class="nav-link" href="{{ route('get-logout') }}">{{ __('Logout') }}</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
