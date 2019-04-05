@extends('layouts.app')
@section('content')
<a href="/posts" class="btn btn-secondary"> Back </a>
<h3> {{ $post->title }} </h3>
<div>
    {!!$post->body!!}
</div>
<hr>
<small> Written on : {{ $post->created_at }}</small>
<hr>
<a href="/posts/{{ $post->id }}/edit" class="btn btn-primary"> Edit </a>
{!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=>'DELETE']) !!}
{{ Form::submit('Delete', ['class' => 'btn btn-danger' ]) }}
{!! Form::close() !!}
@endsection
