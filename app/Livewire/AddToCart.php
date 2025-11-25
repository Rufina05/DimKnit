<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;

class AddToCart extends Component
{
    public $productId;
    public $quantity = 1;
    public $showQuantitySelector = false; // Новый параметр

    public function increment()
    {
        $this->quantity++;
    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $this->productId)
            ->first();

        if ($item) {
            // Если селектор количества показан, добавляем выбранное количество
            // Иначе добавляем только 1
            $item->increment('quantity', $this->showQuantitySelector ? $this->quantity : 1);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $this->productId,
                'quantity' => $this->showQuantitySelector ? $this->quantity : 1
            ]);
        }

        $this->dispatch('cartUpdated');
        
        // Reset quantity after adding
        if ($this->showQuantitySelector) {
            $this->quantity = 1;
        }
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
