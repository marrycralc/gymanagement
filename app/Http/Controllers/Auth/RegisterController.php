<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController
{
   function registerview()
   {
       return view('register');
   }
   function registeruser(Request $request)
   {
 // dd($request);
  $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'password_confirmation' => 'required|min:6',
        'user_role' => 'required|string|max:255',
        
    ]);

$user = new User();
$user->name = $data['name'];
$user->email = $data['email'];
$user->password = bcrypt($data['password']);
$user->user_role = $data['user_role'];
$user->save();

return redirect()->to('login');
   }
}
