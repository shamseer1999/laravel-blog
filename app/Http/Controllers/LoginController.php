<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $email=request('email');
            $password=request('password');

            $auth_array=array(
                'email'=>$email,
                'password'=>$password
            );

            if(auth()->attempt($auth_array))
            {
                return redirect()->route('blogs');
            }
            else
            {
                return redirect()->route('do_login')->with('danger','Invalid Credentials');
            }
        }
        return view('login');
    }
}
