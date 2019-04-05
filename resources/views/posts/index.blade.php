@extends('layouts.app')
@section('content')
<a class="float-right btn btn-secondary" href="/posts/create"> Create Post</a>
<h1> Posts </h1>
@if(count($posts)) @foreach ($posts as $post)
    <div class="card">
        <div class="card-body">
            <h3> <a href="/posts/{{ $post->id }}"> {{ $post->title }} </a> </h3>
            <small> Written on : {{ $post->created_at }}</small>
        </div>
    </div>
@endforeach
<br>
{{ $posts->links() }}
@else
No post
@endif
@endsection
