@extends('layouts.app')

@section('content')

<h1>Orders Page</h1>

<table class="table">
    <thead>
    <tr>
        <th scope="col">OrderNumber</th>
        <th scope="col">Order Date</th>
        <th scope="col">status</th>
        <th scope="col">Comments</th>
        <th scope="col">Customer No</th>
        <th scope="col">Employee No</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $o)
    <tr>
        <td>{{$o->orderNumber}}</td>
        <td>{{$o->orderDate}}</td>
        <td>{{$o->status}}</td>
        <td>{{$o->comments}}</td>
        <td>{{$o->customerNumber}}</td>
        <td>{{$o->employeeNumber}}</td>
        <td><a href="{{ route('orders.del', $o->orderNumber)}}">Delete</td>
    </tr>


    </tbody>
    @endforeach
</table>
















@endsection
