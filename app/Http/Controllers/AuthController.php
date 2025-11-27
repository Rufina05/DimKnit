<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   public function login()
   {
    return view("auth.login");
   } 

   public function register()
   {
    return view("auth.register");
   }

   public function loginPost(Request $req)
   {
     $credentials = $req->validate([
        "email"=> ["required", "email"],
        "password"=> ["required"]
     ]);

     if (Auth::attempt($credentials)) {
        $req->session()->regenerate();
        return redirect()->intended(route('home'));
     }

     return back()->withErrors([
        "email" => "The provided credentials do not match our records."
     ])->onlyInput('email');
   }

   public function registerPost(Request $req)
   {
     $data = $req->validate([
        "name"=> ["required", "string", "max:255"],
        "email"=> ["required", "email", "unique:users"],
        "password"=> ["required", "confirmed", "min:8"]
     ]);

     $data["password"] = Hash::make($data["password"]);

     User::create($data);

     return redirect()->route("login")->with('success', 'Registration successful! Please login.');
   }

   public function logout(Request $req)
   {
     Auth::logout();
     $req->session()->invalidate();
     $req->session()->regenerateToken();
     return redirect()->route("home");
   }

   public function account()
   {
     return view("user-account");
   }
}
