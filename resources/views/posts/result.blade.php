<!DOCTYPE html>
<html lang="en">
<head>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Responsive grid demo</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('/dist/gridstack.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('/dist/gridstack-extra.css') }}"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/gridstack.js/0.2.5/gridstack.min.css" />

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.0/jquery-ui.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('/dist/gridstack.js') }}"/>

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
<body>

  <div class="col-md-6">
  <div class="container-fluid">
    <div class="grid-stack">
      @foreach($images as $key=>$photo)
        <div class="grid-stack-item"  data-gs-x="{{$grid[$key]->x}}" data-gs-y="{{$grid[$key]->y}}"    data-gs-width="{{$grid[$key]->width}}" data-gs-height="{{$grid[$key]->height}}">
          <div class="grid-stack-item-content"><img src="{{route('getImages',$photo->image)}}" width="100%" height="100%" /></div>
        </div>
      @endforeach
    </div>
  </div>
</div>
    <script type="text/javascript" src='//cdnjs.cloudflare.com/ajax/libs/gridstack.js/0.2.5/gridstack.min.js'></script>

    <script type="text/javascript">
        $(function () {
            var options = {
              staticGrid: true
            };
            $('.grid-stack').gridstack(options);



        });
    </script>
</body>
</html>
