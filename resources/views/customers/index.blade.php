@extends('layouts.app')

@section( 'title', 'Customer Records ') ;
@section('content')
{{-- <a class="float-right btn btn-secondary" href="/posts/create"> Create Post</a> --}}

<h1> Customer </h1>
<h2> Create Customer </h2>

{!! Form::open(['action' => ['CustomersController@update', ''], 'method'=>'POST']) !!}
<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Name']) }}
</div>
<div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Email']) }}
</div>
<div class="form-group">
    {{ Form::label('active', 'Active') }}
    {{ Form::select('active',  [ '' => 'please Choose', '1' => 'active', '0' => 'inactive' ], ['class'=>'form-control', 'placeholder'=>'Email']) }}
</div>
<div class="form-group">
    {{ Form::label('sample', 'Sample') }}
    {{ Form::text('sample',  old('sample') , ['class'=>'form-control', 'placeholder'=>'Sample']) }}
</div>
{{-- {{ Form::hidden('author', $post->author ) }} --}}
{{ Form::submit('Submit', ['class' => 'btn btn-primary' ]) }}
{!! Form::close() !!}
<br>
<h2> Customers </h2>
<div class="row">
    <div class="col-6 ">
        <ul>
            @foreach ($activeCustomers as $customer)
            <li>
                {{$customer->name}} - {{ $customer->email}} : {{ ( $customer->active == 1 ? 'Active' : 'Inactive'  ) }}
            </li>
            @endforeach
        </ul>
    </div>
    <div class="col-6 ">
        <ul>
            @foreach ($inactiveCustomers as $customer)
            <li>
                {{$customer->name}} - {{ $customer->email}} : {{ ( $customer->active == 1 ? 'Active' : 'Inactive'  ) }}
            </li>
            @endforeach
        </ul>
    </div>
</div>

@endsection
