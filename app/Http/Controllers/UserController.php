<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Session;

class UserController extends Controller
{
    public function login(Request $request){
        $user =  User::where('email' , $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return "Password or Email not correct";
        }
        $request->session()->put('user', $user);
        return redirect()->route('products');
    }

    public function logout(){
        if(session()->has('user')){
            session()->forget('user');
            return redirect()->route('login');
        }
        return redirect()->route('login'); 
    }

    public function getRegister(){
        if(!Session::has('user')){
            return view('register');
        }else{
            return redirect()->back();
        }

    }

    public function register(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
         ]);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('login');
    }
}
