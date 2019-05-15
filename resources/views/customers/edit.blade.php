@extends('layouts.app')

@section( 'title', 'Customer Records ') ;
@section('content')
{{-- <a class="float-right btn btn-secondary" href="/posts/create"> Create Post</a> --}}

<h1> Customer </h1>
<h2> Create Customer </h2>

{!! Form::open(['action' => ['CustomersController@update', $customer->id], 'method'=>'PUT']) !!}
@include('customers.form')

{!! Form::close() !!}
<br>
@endsection
