@extends('layouts.app_grid')

{!! Form::open(['url' => route('totalPreview',$post->id)]) !!}
<meta name="csrf-token" content="{{ csrf_token() }}">
<input name="grid" id="saved-data" type="hidden" >

{{ Form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 20px')) }}

{!! Form::close() !!}

<a class="btn btn-default" id="save-grid" href="#">Save Grid</a>

@section('content')
<meta name="_token" content="{{ csrf_token() }}">
<div class="col-md-6">
  <div class="container-fluid">
    <div class="grid-stack">
      @foreach($images as $key=>$photo)
        <div class="grid-stack-item"  data-gs-x="{{$x[$key]}}" data-gs-y="{{$y[$key]}}"    data-gs-width="4" data-gs-height="2">
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
            };
            $('.grid-stack').gridstack(options);
            new function () {

                this.grid = $('.grid-stack').data('gridstack');

                this.saveGrid = function () {
                    this.serializedData = _.map($('.grid-stack > .grid-stack-item:visible'), function (el) {
                        el = $(el);
                        var node = el.data('_gridstack_node');
                        return {
                            x: node.x,
                            y: node.y,
                            width: node.width,
                            height: node.height
                        };
                    }, this);
                    $('#saved-data').val(JSON.stringify(this.serializedData, null, '    '));
                    return false;
                }.bind(this);

                $('#save-grid').click(this.saveGrid);

            };
        });

</script>



@endsection
