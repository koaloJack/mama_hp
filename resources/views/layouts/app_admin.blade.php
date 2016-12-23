<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Aclonica|Bungee+Inline|Cabin+Sketch|Ceviche+One|Freckle+Face|Frijole|Gochi+Hand|Just+Another+Hand|Marck+Script|Syncopate" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet"  type="text/css" href="{{ URL::asset('css/styles.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('/dist/gridstack.min.css') }}"/>

    <link rel="stylesheet"  type="text/css" href="{{ URL::asset('style/dropzone.css') }}" />
<!--
    <link rel="stylesheet" href="{{ URL::asset('/dist/gridstack.css') }}"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/gridstack.js/0.2.5/gridstack.min.css" />

    <link rel="stylesheet" href="{{ URL::asset('/dist/gridstack-extra.css') }}"/>
    <script src="{{ URL::asset('/dist/gridstack.js') }}"/>
-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.0/jquery-ui.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js"></script>
    <script type="text/javascript" src='//cdnjs.cloudflare.com/ajax/libs/gridstack.js/0.2.5/gridstack.min.js'></script>

    <style type="text/css">
        .grid-stack {
            background: white;
        }

        .grid-stack-item-content {
            color: white;
            text-align: center;
            background-color: #18bc9c;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" id="LogoItem" href="{{ url('/') }}">
                    Home
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav" id="navItems">
                    <li><a href="{{ url('/home') }}">Login</a></li>
                    <li><a href="{{ route('posts.create')}}">Create Posts</a></li>
                    <li><a href="{{ route('posts.index')}}">Overview</a></li>

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    @include('partials._footer')


    <!-- JavaScripts -->
    <link rel="stylesheet"  type="text/css" href="{{ URL::asset('js/dropzone.js') }}" />
    <link rel="stylesheet"  type="text/css" href="{{ URL::asset('js/dropzone-config.js') }}" />



</body>
</html>
