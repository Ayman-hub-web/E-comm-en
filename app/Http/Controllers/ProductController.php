<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Session;

class ProductController extends Controller
{

    public function index(){
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function detail($id){
        $product = Product::where('id', $id)->first();
        return view('product_detail', compact('product'));
    }

    public function search(Request $request){
        $data = Product::where('name','LIKE','%'.$request->input('query').'%')
        ->get();
         return view('searchResults', compact('data'));
    }

    public function addToCart(Request $request){
        if($request->session()->has('user')){
            $user = session()->get('user');
            $user_id = $user['id'];
            $cart = new Cart();
            $cart->product_id = $request->product_id;
            $cart->user_id = $user_id;
            $cart->save();
            return redirect()->route('products');
        }else{
            return redirect()->route('login');
        }
        
    }

    static function cartItems(){
        if(Session::has('user')){
            $user_id = Session::get('user')['id'];
         return Cart::where('user_id', $user_id)->count();
        }

    }

    public function cartList(){
        if(Session::has('user')){
            $userId = Session::get('user')['id'];
            $products = DB::table('cart')
                ->join('products', 'cart.product_id', '=', 'products.id')
                ->where('cart.user_id', $userId)
                ->select('products.*')
                ->get();
            return view('cartList', compact('products'));
        }else{
            return redirect()->route('login');
        }
    }

    public function deleteItemCart($id){
        $userId = Session::get('user')['id'];
        $product = Cart::where('product_id', $id)->where('user_id', $userId)->first();
        if($product){
            $product->delete();
            return redirect()->route('products');
        }
    }

    public function sumCart(){
        if(Session::has('user')){
            $userId = Session::get('user')['id'];
            return $products = DB::table('cart')
                ->join('products', 'cart.product_id', '=', 'products.id')
                ->where('cart.user_id', $userId)
                ->sum('products.price');
        }else{
            return redirect()->route('login');
        }
    }

    public function orderNow(){
        if(Session::has('user')){
            $userId = Session::get('user')['id'];
            $amount = DB::table('cart')
                ->join('products', 'cart.product_id', '=', 'products.id')
                ->where('cart.user_id', $userId)
                ->sum('products.price');
                return view('orderNow', compact('amount'));
        }else{
            return redirect()->route('login');
        }
    }

    public function orderplace(Request $request){
        if(Session::has('user')){
            $userId = Session::get('user')['id'];
            $allCart = Cart::where('user_id', $userId)->get();
            foreach($allCart as $cart){
                $order = new Order();
                $order->user_id = $userId;
                $order->product_id = $cart->product_id;
                $order->status = "pending";
                $order->payment_method = $request->payment;
                $order->payment_status = "pending";
                $order->address = $request->address;
                $order->save();
                Cart::where('user_id', $userId)->delete();
            }
        }else{
            return redirect()->route('login');
        }
        return redirect()->route('products');
    }

    public function orderlist(){
        if(Session::has('user')){
            $userId = Session::get('user')['id'];
            $orders = DB::table('orders')
                ->join('products', 'orders.product_id', '=', 'products.id')
                ->where('orders.user_id', $userId)
                ->get();
                
            return view('orderlist', compact('orders'));
        }else{
            return redirect()->route('products');
        }
    }

    public function createProduct(){
        return view('createProduct');
    }

    public function storeProduct(ProductRequest $request){
        return $request;
    }
}
