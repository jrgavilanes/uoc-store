<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            session()->forget('user');
            $data['user'] = [];
            $data['user']['type'] = "registered";
            $data['user']['id'] = $user->id;
            $data['user']['name'] = $user->name;
            $data['user']['email'] = $user->email;
            $data['user']['address'] = $user->address;
            $data['user']['guest_address'] = "";
            $data['user']['guest_email'] = "";
            session()->put('user', $data['user']);

            if (Auth::user()->is_admin) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('home');
            }
        }

        return redirect()->route('login')->with('error', 'wrong email or password')->withInput();
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('user');
        return redirect()->route('home');
    }
}
