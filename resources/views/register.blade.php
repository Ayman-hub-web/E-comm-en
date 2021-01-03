@extends('master')
@section('content')
    <div class="container custom-login">
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <form action="{{route('register')}}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="Name ">Name</label>
                        <input type="text" class="form-control" placeholder="Your Name" name="name">
                    </div>
                    @if ($errors->has('name'))
                    <div class="alert alert-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                    <div class="form-group">
                        <label for="Email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                    </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection