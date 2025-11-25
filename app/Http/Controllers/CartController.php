<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $cart = Cart::with("cartItems.product")->firstOrCreate([
            "user_id" => $user->id
        ]);

        return view("cart.index", ["cart"=>$cart]);
    }

    
}
