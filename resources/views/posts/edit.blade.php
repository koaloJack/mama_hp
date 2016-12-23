@extends('layouts.app')


@section('content')


</div>
    <div class="row">
      {!! Form::model($post, ['route'=>['posts.update',$post->id],"method"=>'PUT'])!!}
        <div class="col-md-8">
            {{ Form::label('title', 'Title:')  }}
            {{ Form::text('title', null, ["class" => 'form-control input-lg'])  }}

            {{ Form::label('slug', 'Slug:', ["class"=>'form-spacing-top'])  }}
            {{ Form::text('slug', null, ["class" => 'form-control'])  }}


            {{ Form::label('body', 'Body:', ["class"=>'form-spacing-top'])  }}
            {{ Form::textarea('body', null, ["class" => 'form-control'])}}
          </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Create At:</dt>
                    <dd>{{date('M j, Y H: i', strtotime($post->created_at))}}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last updated:</dt>
                    <dd>{{date('M j, Y H: i', strtotime($post->updated_at))}}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {{Form::submit('Save Changes',["class"=>"btn btn-success btn-block"]) }}
                    </div>
                    <div class="col-sm-6">
                      {{ Html::linkRoute('posts.show','Cancel',array($post->id), array("class"=>"btn btn-primary btn-block"))}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close()!!}


    <div class="container">
          @foreach($images as $key=>$image)

          @if(Storage::disk('local')->has( $image->image ) )
          <div class="row">

                      <div class="col-md-4" name="paintings">
                        <figure>


                           <img class="img-responsive" src="{{route('getImages',$image->image)}}" width="100%" height="100%" />

                             <figcaption>
                    			        <h2 class"text">{{ $image->title}} <span>Lily</span></h2>
                    			        <p class"text">{{ $image->body}}</p>
                    			        <a class"text" href="{{route('blog.single', $image->id)}}">View more</a>
                              </figcaption>

                         </figure>

                    </div>
                    <div class="col-md-4" name="paintings">
                      {!! Form::open(array('route' => ['image.delete',$post->id],'files'=>true)) !!}

                        {{Form::submit('Delete Image',["class"=>"btn btn-success btn-block"]) }}

                      {!! Form::close()!!}

                    </div>

                  </div>

          @endif


          @endforeach
    </div>



@endsection
