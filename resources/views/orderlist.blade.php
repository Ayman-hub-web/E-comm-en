@extends('master')
@section('content')
    
    <div class="container" style="margin-bottom:20px;">
    <h1>Order list</h1>
    @foreach($orders as $order)
        <div class="row">
            <div class="col-md-4">
            <img src="{{$order->gallery}}" style="width:150px;height:100px;">      
            </div>
            <div class="col-md-8">
                <h2>Name: {{$order->name}}</h2>
                <h5>Delevery Status: {{$order->status}}</h5>
                <h5>Address: {{$order->address}}</h5>
                <h5>Description: {{$order->description}}</h5>
                <h5>Payment Status: {{$order->payment_status}}</h5>
                <h5>Payment Method: {{$order->payment_method}}</h5>
            </div>
        </div>

    @endforeach
    </div>

    
@endsection