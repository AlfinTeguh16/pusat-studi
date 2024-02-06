<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(){
        return view ('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->only('nidn', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication passed
        return redirect()->intended('dashboard'); // Adjust the redirection as needed
    }

    // Authentication failed
    return back()->withErrors(['error' => 'Invalid NIDN or password']);

    }
}
