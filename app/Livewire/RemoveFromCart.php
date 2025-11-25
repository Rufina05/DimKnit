<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;

class RemoveFromCart extends Component
{
    public $productId;

    public function removeFromCart()
    {
        $user = Auth::user();
        if (!$user) return;

        $cart = Cart::where('user_id', $user->id)->first();
        if (!$cart) return;

        $item = CartItem::where('cart_id', $cart->id)
                        ->where('product_id', $this->productId)
                        ->first();

        if ($item) {
            $item->delete();
            // Redirect to refresh the cart page (route name is 'cart')
            return redirect()->route('cart');
        }
    }

    public function render()
    {
        return view('livewire.remove-from-cart');
    }
}
