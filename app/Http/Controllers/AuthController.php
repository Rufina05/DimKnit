<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

     if (auth()->attempt($credentials)) {
        $req->session()->regenerate();
        return redirect()->route("home");
     }

     return back()->withErrors([
        "email" => "The provided credentials do not match our records."
     ]);
   }

   public function registerPost(Request $req)
   {
     $data = $req->validate([
        "name"=> ["required", "string"],
        "email"=> ["required", "email", "unique:users,email"],
        "password"=> ["required", "confirmed", "min:8"]
     ]);

     $data["password"] = Hash::make($data["password"]);

     User::create($data);

     return redirect()->route("login");
   }

   public function logout(Request $req)
   {
     auth()->logout();
     $req->session()->invalidate();
     $req->session()->regenerateToken();
     return redirect()->route("home");
   }

   public function account()
   {
     return view("user-account");
   }
}
