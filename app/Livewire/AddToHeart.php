<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Heart;
use App\Models\HeartItem;
use App\Models\Product;

class AddToHeart extends Component
{
    public $productId;

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function addToHeart()
    {
        $user = Auth::user();

        if (!$user) {
            session()->flash('error', __('text.please-login-to-add-to-favorites'));
            return redirect()->route('login'); 
        }

        // Получаем продукт
        $product = Product::find($this->productId);
        
        if (!$product) {
            session()->flash('error', __('text.product-not-found'));
            return;
        }

        // Получаем или создаём избранное
        $heart = Heart::firstOrCreate(['user_id' => $user->id]);

        // Проверяем, есть ли уже товар в избранном
        $item = HeartItem::where('heart_id', $heart->id)
            ->where('product_id', $this->productId)
            ->first();

        if ($item) {
            // Товар уже в избранном - удаляем
            $item->delete();
            
            // Получаем название с учётом локали
            $locale = app()->getLocale();
            $nameField = 'name_' . $locale;
            $productName = $product->$nameField ?? $product->name_en ?? 'Product';
            
            $message = $productName . ' ' . __('text.removed-from-favorites');
            
            // Отправляем событие для модалки (опционально)
            $this->dispatch('favorite-removed', message: $message);
            
        } else {
            // Добавляем в избранное
            HeartItem::create([
                'heart_id' => $heart->id,
                'product_id' => $this->productId,
            ]);
            
            // Получаем название с учётом локали
            $locale = app()->getLocale();
            $nameField = 'name_' . $locale;
            $productName = $product->$nameField ?? $product->name_en ?? 'Product';
            
            $message = $productName . ' ' . __('text.added-to-favorites-successfully');
            
            // Отправляем событие для модалки
            $this->dispatch('favorite-success', message: $message);
        }

        // Обновляем счётчик избранного в header (если есть)
        $this->dispatch('heartUpdated');
    }

    public function render()
    {
        $user = Auth::user();
        $isInHeart = false;

        if ($user) {
            $heart = Heart::where('user_id', $user->id)->first();
            if ($heart) {
                $isInHeart = HeartItem::where('heart_id', $heart->id)
                    ->where('product_id', $this->productId)
                    ->exists();
            }
        }

        return view('livewire.add-to-heart', [
            'isInHeart' => $isInHeart
        ]);
    }
}