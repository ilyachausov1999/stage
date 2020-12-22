
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <title>@yield('title')</title>
</head>

<body>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/home">Lms Name</a>
                </div>

        <ul class="nav navbar-nav navbar-right">

            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link"  style="color: lawngreen" href="/login"><span class="glyphicon glyphicon-log-in"></span> {{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" style="color: lawngreen" href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> {{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: lawngreen" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span class="glyphicon glyphicon-remove-sign"></span> {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" style="color: lawngreen; background: black" aria-labelledby="navbarDropdown" style = "background: #292929; border-radius: 10px;">
                        <a class="dropdown-item" style="color: lawngreen; background: black" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest

        </ul>

            </div>

</nav>
<div>
    @yield('content')
</div>
</body>
</html>
