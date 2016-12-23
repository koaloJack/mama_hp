@extends('layouts.app')

@section('title','| All Posts')

@section('content');


    <div class="row">
      <div class="col-md-10">
        <h1>All Posts</h1>

      </div>
      <div class="col-md-2">
        <a href="{{route('posts.create')}}" class="btn btn-lg btn-primary btn-block btn-h1-spacing">Create New Post</a>
      </div>
      <hr>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead>
             <th>#</th>
             <th> Title </th>
             <th> Body  </th>
             <th> Created at </th>

             <tbody>

                @foreach ($posts  as $post)
                <tr>
                  <th> {{ $post-> id}} </th>
                  <th> {{ $post-> title}} </th>
                  <th> {{substr($post->body,0,10)}} {{strlen($post->body) > 10 ? "..." : ""}}</th>
                  <th> {{ date('M j, Y', strtotime($post-> created_at))}} </th>
                  <td>

                    <a href="{{route('posts.show',$post->id)}}" class="btn btn-default">View</a>
                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-default">Edit</a>
                  </td>
                  <td>
                    {!!  Form::open(['route' => ['posts.destroy', $post->id],"method"=>'DELETE'])!!}
                    {!! Form::submit('Delete',["class"=>'btn btn-danger btn-block'])!!}
                    {!! Form::close()!!}

                  </td>
                </tr>
                @endforeach


             </tbody>
          </thead>

        </table>

        <div class="text-center">
          {!! $posts->links();!!}
        </div>
      </div>
    </div>





@stop
