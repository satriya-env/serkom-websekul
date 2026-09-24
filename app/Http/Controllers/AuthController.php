<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        $username = Auth::user()->username;
        return view('admin.dashboard', compact('username'));
    }
    //
    public function pageLogin(){
        return view('login');
    }

    public function login(Request $request){
        $token = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($token, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()
            ->withErrors(['username' => 'Username atau Password salah'])
            ->onlyInput('username');

    
    }
    
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
