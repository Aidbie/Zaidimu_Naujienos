<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\vartotojas;

class loginController extends Controller
{
    function index()
    {
        return view('login');
    }

    public function username()
    {
        return 'email';
    }
    function checklogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );


        if(Auth::attempt($user_data))
        {
            return redirect('/main/successlogin');
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }

    }

    function successlogin()
    {
        return view('successlogin');
    }

    function logout()
    {
        Auth::logout();
        return view('home');
    }

    protected function validateLogin(Request $request)
    {
        $messages = [
            'identity.required' => 'Email or username cannot be empty',
            'email.exists' => 'Email or username already registered',
            'username.exists' => 'Username is already registered',
            'password.required' => 'Password cannot be empty',
        ];

        $request->validate([
            'identity' => 'required|string',
            'password' => 'required|string',
            'email' => 'string|exists:users',
            'username' => 'string|exists:users',
        ], $messages);
    }
}

?>