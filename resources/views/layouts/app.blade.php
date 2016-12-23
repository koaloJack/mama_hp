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
                    <li><a href="#">About</a></li>
                    <li><a href="#">All Photos</a></li>
                    <li><a href="#">All Paintings</a></li>
                    <li><a href="#">Contact</a></li>

                </ul>

                <!-- Right Side Of Navbar -->

            </div>
        </div>
    </nav>

    @yield('content')

    @include('partials._footer')


    <!-- JavaScripts -->
    <script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
    <script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>

    <script>
    var grid = document.querySelector('.grid');

  var msnry = new Masonry( grid, {
  itemSelector: '.grid-item',
  columnWidth: '.grid-sizer',
  percentPosition: true
  });

  imagesLoaded( grid ).on( 'progress', function() {
  // layout Masonry after each image loads
  msnry.layout();
  });


    </script>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script src="{{ URL::asset('js/dropzone-config.js') }}"></script>

</body>
</html>
