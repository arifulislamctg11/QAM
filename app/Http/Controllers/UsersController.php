<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class UsersController extends Controller
{
   public function index(){
    $users = User::all();
    // dd($users);
    return view('users.users')->with('users',$users);
   }

   public function useredit($id){
   $user= User::findOrFail($id);
   return view('users.useredit')->with('user',$user);
   }

   public function userupdate(Request $request, $id){
    $user= User::find($id);
    $user->name = $request->input('name');
    // $user->role = $request->input('role');
    $user->email = $request->input('email');
    // $user->email = $request->input('password');
    $user->update();
    return redirect('users')->with('status','User has been updated successfully !');
    }


}
