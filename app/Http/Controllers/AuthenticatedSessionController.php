<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function showForm(){
        return view('auth.login');
    }

    // login action
    public function login(Request $request){

        $request->validate([
            'login' => 'required|string',
            'mdp' => 'required|string'
            ]);


        $credentials = ['login' => $request->input('login'), 'password' => $request->input('mdp')];


        if (Auth::attempt($credentials) && Auth::user()->type!=null) {
            $request->session()->regenerate();

            $request->session()->flash('etat','connexion reussi');

            return redirect()->intended('/home');
        }
        Auth::logout();
        $request->session()->flash('etat','connexion impossible');
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }

    // logout action
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
