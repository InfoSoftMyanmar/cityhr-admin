<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use  App\Models\Users;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function authenticate(Request $request){

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        //$credentials = request(['email', 'password']);

        //if (Users::where(['email' => $request->input('email'), 'password' => $request->input('password')])->exists()) {
            return redirect()->intended('dashboard');
       // }

        // if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'active' => 1])) {
        //     return redirect()->intended('dashboard');
        // }

        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('dashboard');
        //     //return redirect('dashboard');
        // // Retrive Input
        // }
        return redirect('/')->with('error', 'Oppes! You have entered invalid credentials');
    }
}
