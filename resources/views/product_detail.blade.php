@extends('master')
@section('content')
    
    <div class="container" style="margin-bottom:20px;">
        <div class="row">
            <div class="col-sm-6">
                <img src="{{$product->gallery}}" style="width:300px;height:300px;">
            </div>
            <div class="col-sm-6">
            <a href="{{route('products')}}">Go Back</a>
                <h1>Welcome to detail of {{$product->name}}</h1>
                <p>{{$product->description}}</p>
                <p><span style="font-weight:bold;">Price:</span> ${{$product->price}}</p>
                    <div class="d-flex flex-row">
                        <form action="{{route('addToCart')}}" method="post">
                    @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <button class="btn btn-primary">Add to Cart</button>
                    </form>
                    <button class="btn btn-success">Buy Now</button>
                    </div>
            </div>
        </div>
    </div>

    
@endsection