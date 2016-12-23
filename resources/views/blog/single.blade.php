@extends('layouts.app_grid')

@section('title',"| $post->title")

@section('content')
  <div class="row">
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
    <div class="col-md-6">
        <h1>{{$post->title}}</h1>
        <p>
          {{$post->body}}
        </p>
    </div>
  </div>

@stop
@section('javascript')

<script type="text/javascript" src='//cdnjs.cloudflare.com/ajax/libs/gridstack.js/0.2.5/gridstack.min.js'></script>

<script type="text/javascript">
    $(function () {
        var options = {
          staticGrid: true
        };
        $('.grid-stack').gridstack(options);



    });
</script>


@stop
