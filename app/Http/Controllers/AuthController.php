<?php

namespace App\Http\Controllers;
use View, Input, Redirect;
// use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function register_view()
    {
        return view('auth.register');
    }
    public function login(Request $request)
    {
        // validate data 
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(\Illuminate\Support\Facades\Auth::attempt($request->only('email', 'password'))){
           return redirect('home');
        }
        return redirect('login')->withError('please enter valid email and password');
    }
    public function register(Request $request){
        // validations 
        $request->validate([
            'name'=> 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'password'=>\Illuminate\Support\Facades\Hash::make($request->password)
        ]);
        // login here 
        if(\Illuminate\Support\Facades\Auth::attempt($request->only('email', 'password'))){
            return redirect('home');
        }
        return redirect('register')->withError('Error');

    }

    public function home(){
        return view('welcome'); 
    }
    public function logout(){
    \Illuminate\Support\Facades\Session::flush();
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('');
    }
}
