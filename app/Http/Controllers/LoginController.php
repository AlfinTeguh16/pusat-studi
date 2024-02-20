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
        // Jika passed
        return redirect()->route('showMetaData');
    }

    // Jika failed
    return back()->withErrors(['error' => 'Invalid NIDN or password']);

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
