@extends('layouts.app')

@section('content')


<div class="preview-window">
  <div class="col-md-4">

  <div class="triangle">
    <h2>Gemälde</h2>
  </div>
</div>

<div class="col-md-8">

  <div class="canvas">

  <div class="grid">

  <div class="grid-sizer"></div>
  @foreach($input as $index => $value)
   @if( $index < 4)
        <div class="grid-item">
          <img src="{{route('image.singlepreview',$input[$index]->id)}}" >

        <figcaption>
             <h2 class"text">{{ $input[$index]->title}} <span>Lily</span></h2>
             <p class"text">{{ $input[$index]->body}}</p>
             <a class"text" href="{{route('blog.single',$input[$index]->id)}}">View more</a>
         </figcaption>
        </div>
   @endif
  @endforeach


    </div>
  </div>
</div>



  <p></p>
</div>

<div class="semi-jumbotron">
  <ul>
    <li><a href="#">Start</a></li>
    <li><a href="#">Gemälde</a></li>
    <li><a href="#">Fotos</a></li>
  </ul>

</div>



@endsection
