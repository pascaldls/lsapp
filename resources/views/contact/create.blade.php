@extends('layouts.app')

@section( 'title', 'Contact Us ') ;
@section('content')
{{-- <a class="float-right btn btn-secondary" href="/posts/create"> Create Post</a> --}}

<h1> Contact Us </h1>

{!! Form::open(['action' => ['ContactController@store', ''], 'method'=>'POST']) !!}
<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Name']) }}
</div>
<div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Email']) }}
</div>
<div class="form-group">
    {{ Form::label('message', 'Message') }}
    {{ Form::textarea( 'message', old('message'), ['class'=>'form-control', 'placeholder'=>'Message']) }}
</div>
{{ Form::submit('Submit', ['class' => 'btn btn-primary' ]) }}
{!! Form::close() !!}

<br>
@endsection
