@extends('layouts.app')

@section('content')


<div class="container">
        <div class="row">
            <div class="col-md-12">
              
            </div>
        </div>
    </div>

<a href="{{route('adjustImages',$id) }}" class="btn-default"> Preview</a>


<script type="text/javascript" src="{{ URL::asset('js/dropzone.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('js/dz_upload.js') }}"></script>
@endsection
