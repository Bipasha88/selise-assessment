<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class AuthController extends Controller
{
    public function register(){
        if (Auth::check()){
            return back();
        }
        else
            return view("auth.register");
    }

    public function store(Request $request){
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);
        return redirect()->route('login');
    }

    public function login(){
        session(['link' => url()->previous()]);
        if (Auth::check()){
            if (session('link') == route("register"))
                return view("auth.login");
            else
                return back();
        }
        else
            return view("auth.login");
    }

    public function login_post(Request $request){
        $credentials = ['email' => $request->email, 'password' => $request->password];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (session('link') == route("viewCart"))
                return redirect(session('link'));
            else
                return redirect()->route('home');
        }
        else {
            return back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors(['invalid' => 'Wrong Email or Password']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
