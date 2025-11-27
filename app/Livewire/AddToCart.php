<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;

class AddToCart extends Component
{
    public $productId;
    public $showQuantitySelector = false; 
    public $quantity = 1;

    public function addToCart($quantity = null)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $qty = $quantity ? max(1, (int)$quantity) : max(1, (int)$this->quantity);

        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        $cartItem = CartItem::where('cart_id', $cart->id)
                            ->where('product_id', $this->productId)
                            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity', $qty);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $this->productId,
                'quantity' => $qty,
            ]);
        }

        $this->dispatch('cartUpdated');

        if ($this->showQuantitySelector) {
            $this->quantity = 1;
        }
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
