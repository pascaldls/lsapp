@extends('layouts.app')

@section( 'title', 'Customer Records ') ;
@section('content')
<h2> Customers </h2>


@foreach ($customers as $customer)
<div class="row">
    <div class="col col-sm-1"> {{$customer->id}} </div>
    <div class="col col-sm-3">
        <a href="/customers/{{$customer->id}}">
            {{$customer->name}}
        </a>
    </div>
    <div class="col col-sm-3"> {{$customer->email}} </div>
    <div class="col col-sm-3"> {{$customer->company->name}} </div>
    <div class="col col-sm-1"> {{$customer->active}} </div>
</div>
@endforeach

<p><a class="btn btn-primary" href="/customers/create"> Create Customers </a></p>
<div class="row">
    <div class="col-6 ">
        <ul>
            @foreach ($activeCustomers as $customer)
            <li>
                {{$customer->name}} - {{ $customer->email}} : {{ ( $customer->active == 1 ? 'Active' : 'Inactive'  ) }}
                | {{$customer->company->name}}
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

<div class="row">
    <div class="col-12">
        @foreach ( $companies as $company)
        <h3> {{$company->name}} </h3>
        <ul>
            @foreach ( $company->customers as $customer )
            <li> {{$customer->name}} - {{ $customer->email}} : {{ ( $customer->active == 1 ? 'Active' : 'Inactive'  ) }}
                | {{$customer->company->name}} </li>
            @endforeach
        </ul>
        @endforeach
    </div>
</div>

@endsection
