@extends('layouts.app')

@section( 'title', 'Customer : ' . $customer->name ) ;
@section('content')
{{-- <a class="float-right btn btn-secondary" href="/posts/create"> Create Post</a> --}}

<h1> Customer </h1>

<a href="/customers/{{$customer->id}}/edit" class="btn btn-primary"> Edit </a>

{!! Form::open(['action' => ['CustomersController@destroy', $customer->id], 'method'=>'DELETE']) !!}
{{ Form::submit('Delete', ['class' => 'btn btn-danger' ]) }}
{!! Form::close() !!}

<div class="row">
    <div class="col col-sm-12">
        <p> <strong>Name </strong> {{ $customer-> name }}
        </p>
        <p> <strong>Email </strong> {{ $customer-> email }} </p>
        <p> <strong>Active </strong> {{ $customer-> active }} </p>
        <p> <strong>Company </strong> {{ $customer-> company -> name  }} </p>
    </div>
</div>

@endsection
