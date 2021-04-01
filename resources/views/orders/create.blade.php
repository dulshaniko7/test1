@extends('layouts.app')

@section('content')
<h1>Create Orders</h1>

<form action="{{ route('orders.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Order Date</label>
        <input type="date" class="form-control" name="orderDate">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Status</label>
        <select class="form-control" name="status">
            <option value="shipped">Shipped</option>
            <option value="process">In Process</option>
            <option value="hold">On hold</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Comments</label>
        <input type="text" class="form-control" name="comments">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Customer</label>
        <select class="form-control" name="customerNumber">
            @foreach($cus as $c)
            <option value='{{$c->customerNumber}}'>{{$c->customerNumber}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Employee</label>
        <select class="form-control" name="employeeNumber">
            @foreach($emps as $e)
            <option value="{{$e->employeeNumber}}">{{$e->employeeNumber}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
