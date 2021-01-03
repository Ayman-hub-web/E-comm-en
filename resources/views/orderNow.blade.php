@extends('master')
@section('content')
    
    <div class="container" style="margin-bottom:20px;">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Amount</td>
                            <td>{{$amount}}</td>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <td>$0</td>
                        </tr>
                        <tr>
                            <td>Delivery</td>
                            <td>$10</td>
                        </tr>
                        <tr>
                        <td>Total Amount</td>
                        <td>{{$totalAmount = $amount + 10}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <form action="{{route('orderplace')}}" method="post">
                @csrf
                <input type="hidden" name="totalAmount" value="{{$totalAmount}}">
                    <div class="form-group">
                    <textarea name="address" class="form-control" cols="40" rows="2" placeholder="Your Address"></textarea>
                    </div>
                    <div class="radio">
                        <label>Payment methods</label>
                        <div class="form-group">
                            <input type="radio" name="payment" value="cach"><span>Online Payment</span>
                        </di>
                        <div class="form-group">
                            <input type="radio" name="payment" value="cach"><span>EMI Payment</span>
                            </di>
                        <div class="form-group">
                            <input type="radio" name="payment" value="cach"><span>Payment on Delivery</span>
                        </div>
                    </div>
                    <button class="btn btn-primary">Order Now</button>
                </form>
            </div>
        </div>
    </div>

    
@endsection