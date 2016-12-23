@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1> Create new Post</h1>
        <hr>
        {!! Form::open(array('route' => 'posts.store','files'=>true)) !!}
            {{ Form::label('gt','Gallery type')}}

            {{ Form::select('gallerytype', ['painting', 'photo'],array('class'=>'form-control')) }}

            {{ Form::label('title','Title')}}
            {{ Form::text('title','type something awesome',array('class'=>'form-control','required'=>'','maxlength'=>'255') ) }}

            {{ Form::label('slug','Slug')}}
            {{ Form::text('slug',null,array('class'=>'form-control','required'=>'','maxlength'=>'255','minlength'=>5) )  }}

            {{ Form::label('body','Post Body') }}
            {{ Form::textarea('body','type something awesome',array('class'=>'form-control')) }}



            {{ Form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 20px')) }}

            {!! Form::close() !!}





      </div>
   </div>
</div>

@endsection
