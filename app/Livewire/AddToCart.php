<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;

class AddToCart extends Component
{
    public $productId;
    public $showQuantitySelector = false; // Показывать ли счётчик
    public $quantity = 1;

    // Добавление в корзину, quantity может быть передан из Alpine.js
    public function addToCart($quantity = null)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        // Если передано значение из Alpine.js — используем его
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

        // Если счётчик отображается на странице товара — можно сбросить
        if ($this->showQuantitySelector) {
            $this->quantity = 1;
        }
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
