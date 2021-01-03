<?php 
  use App\Http\Controllers\ProductController;
  $totalItems = ProductController::cartItems();
?>
<!-- -->

<!-- -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="{{route('products')}}">Home</a></li>
        <li><a href="{{route('orderlist')}}">Orders</a></li>
        @if(session()->has('user'))
        <li><a href="{{route('logout')}}">logout</a></li>
        @else
        <li><a href="{{route('login')}}">login</a></li>
        <li><a href="{{route('getregister')}}">register</a></li>
        @endif
      </ul>
      <form action="{{route('search')}}" class="navbar-form navbar-left" method="post">
      @csrf
        <div class="form-group">
          <input type="text" name="query" class="form-control" placeholder="Search" style="width:600px;">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li>
          @if($totalItems > 0)
          <a href="{{route('cartList')}}">Cart({{$totalItems}})</a>
          @endif
        </li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>