@extends('master')
@section('content')
    
    <div class="container" style="margin-bottom:20px;">
        <div class="row">
            <div class="col-md-9">
            <a class="btn btn-success" href="{{route('orderNow')}}">Order</a>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>${{$product->price}}</td>
                        <td>{{$product->description}}</td>
                        <td>
                        <form action="{{route('deleteItemCart', $product->id)}}" method="post">
                            @csrf 
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
@endsection