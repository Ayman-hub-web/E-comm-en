@extends('master')
@section('content')
    <h1>Welcome to our Product Page</h1>
    <div class="container" style="height:600px;">
    <div>
        @if(session()->has('success'))
            <p class="text-success">{{session()->get('success')}}</p>
        @endif
    </div>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
        @foreach($products as $product)
            <div class="item {{$product->id == 1? 'active' : ''}}">
            <a href="{{route('product_detail', $product->id)}}">Details</a>
            <img style="height:400px;important;" src="{{$product->gallery}}">
                <div class="carousel-caption" style="background:grey;opacity: 0.5;">
                    <h3>{{$product->name}}</h3>
                    <p>{{$product->description}}</p>
                </div>
            </div>
        @endforeach
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        <div style="margin:30px;">
            @foreach($products as $product)
            <div style="float:left;width:20%;">
            <img style="height:100px;" src="{{$product->gallery}}">
            <h3>{{$product->name}}</h3>
            <a href="{{route('product_detail', $product->id)}}">Details</a>
            </div>
            @endforeach
            </diV>
    </div>
@endsection