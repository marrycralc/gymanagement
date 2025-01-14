<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController
{
    
    function welcomelogin()
    {
        return view('login');

    }

    function checkValidation(Request $request)
    {
        $request->validate([
             'email' => 'required|email',
            'password' => 'required|string|min:6'
        ]);
      
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            switch  (Auth::user()->user_role) {
                case 'admin':
                    return redirect()->to('admin');
                    break;
                case 'trainer':
                    return redirect()->to('trainer');
                    break;
                case 'Trainee':
                    return redirect()->to('Trainee');
                    break;
                default:
                    return redirect()->to('login');
                    break;
            }
      
    }
    else{
        return  Redirect::back()->withErrors(['msg' => 'Please check your credentials and try again.']);

    }
}
}