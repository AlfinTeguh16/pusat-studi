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

            $user = Auth::user();
            if ($user->level == '2') {
                return redirect()->route('viewAdmin');
            }
            return redirect()->route('userDashboard');
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
