@extends('layouts.app')
@section('content')
<h1> Create Posts </h1>
{!! Form::open(['action' => ['PostsController@update', $post->id], 'method'=>'PUT']) !!}
<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', $post->title, ['class'=>'form-control', 'placeholder'=>'Title']) }}
</div>
<div class="form-group">
    {{ Form::label('title', 'Body') }}
    {{ Form::textarea('body', $post->body, ['class'=>'form-control', 'placeholder'=>'Body Text']) }}
</div>
{{ Form::hidden('author', $post->author ) }}
{{ Form::submit('Submit', ['class' => 'btn btn-primary' ]) }}
{!! Form::close() !!}
<script>
    CKEDITOR.replace('body');

</script>
@endsection
