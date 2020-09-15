<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ url('css/style.css') }}">

    </head>
    <body class="antialiased">
        <div class="container ">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <a class="navbar-brand" href="/">Online Support Platform</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                 <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/home') }}" class="nav-link"> Dashboard</a>
                 </li>
                @else
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>

                    @if (Route::has('register'))
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                    @endif
                @endauth
            </div>
            @endif
        </ul>
    </div>
    </nav>
</div>
    <div class="container">
        @yield('content')
        @include('inc.messages')
    </div>
    </body>
</html>
