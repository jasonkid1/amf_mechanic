<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
   
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/star.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" style="position: relative;">
                                    <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width: 32px; height: 32px;  border-radius: 50%;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        @if(Auth::guard('web')->check())
                                            <a href="{{ route('user.profile') }}"><i class="glyphicon glyphicon-user"></i> My Profile</a>
                                                @if(Auth::user()->password == null)
                                                    <a href="{{ route('user.change-password') }}"><i class="glyphicon glyphicon-lock"></i> Update Password</a>
                                                @else
                                                    <a href="{{ route('user.change-password') }}"><i class="glyphicon glyphicon-lock"></i> Change Password</a>
                                                @endif
                                            <a href="{{ route('user.logout') }}"><i class="glyphicon glyphicon-sunglasses"></i> Logout</a>
                                        @else
                                            <a href="{{ route('mechanic.profile') }}"><i class="glyphicon glyphicon-user"></i>  My Profile</a>
                                                @if(Auth::user()->password == null)
                                                    <a href="{{ route('user.change-password') }}"><i class="glyphicon glyphicon-lock"></i> Update Password</a>
                                                @else
                                                    <a href="{{ route('user.change-password') }}"><i class="glyphicon glyphicon-lock"></i> Change Password</a>
                                                @endif
                                            <a href="{{ route('mechanic.logout') }}"><i class="glyphicon glyphicon-sunglasses"></i> Logout</a>
                                        @endif
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/style.js') }}"></script>
    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>

</body>
</html>
