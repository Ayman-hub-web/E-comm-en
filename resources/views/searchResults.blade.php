@extends('master')
@section('content')
    <h5 class="text-center">Search Results</h5>
    <div class="container" style="height:600px;">
        <div class="col-sm-4">
            <a href="#">Filter</a>
        </div>
        <div class="col-sm-4">
            <div style="margin:30px;">
            @if($data->count() > 0)
                @foreach($data as $dat)
                <div style="float:left;width:20%;">
                <img style="height:200px;" src="{{$dat->gallery}}">
                <h3>{{$dat->name}}</h3>
                <a href="{{route('product_detail', $dat->id)}}">Details</a>
                </div>
                @endforeach
            @else 
                <p style="color:red;">There are no results</p>
            @endif
            </diV>
        </div>
    </div>
@endsection