<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

class AddToCart extends Component
{
    public $productId;
    public $showQuantitySelector = false; 
    public $quantity = 1;

    public function mount($productId, $showQuantitySelector = false)
    {
        $this->productId = $productId;
        $this->showQuantitySelector = $showQuantitySelector;
    }

    public function addToCart($quantity = null)
    {
        $user = Auth::user();
        
        if (!$user) {
            session()->flash('error', __('text.please-login-to-add-to-cart'));
            return redirect()->route('login');
        }

        // Получаем количество
        $qty = $quantity ? max(1, (int)$quantity) : 1;

        // Получаем продукт
        $product = Product::find($this->productId);
        
        if (!$product) {
            session()->flash('error', __('text.product-not-found'));
            return;
        }

        // Получаем или создаём корзину
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        // Проверяем, есть ли товар в корзине
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $this->productId)
            ->first();

        if ($cartItem) {
            // Увеличиваем количество
            $cartItem->increment('quantity', $qty);
        } else {
            // Создаём новую запись
            CartItem::create([
                'cart_id'    => $cart->id,
                'product_id' => $this->productId,
                'quantity'   => $qty,
            ]);
        }

        // Получаем название продукта с учётом локали
        $locale = app()->getLocale();
        $nameField = 'name_' . $locale;
        $productName = $product->$nameField ?? $product->name_en ?? 'Product';

        // Формируем сообщение
        $message = $productName . ' ' . __('text.added-to-cart-successfully');

        // Отправляем событие для показа модалки успеха
        $this->dispatch('cart-success', message: $message);

        // Обновляем счётчик корзины в header
        $this->dispatch('cartUpdated');

        // Сбрасываем количество если показан селектор
        if ($this->showQuantitySelector) {
            $this->quantity = 1;
        }
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}