<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class DeleteProduct extends Component
{
    public $productId;

    public function deleteProduct()
{
    $user = Auth::user();

    // Если пользователь не авторизован — редирект на логин
    if (!$user) {
        return redirect()->route('login');
    }

    // Если пользователь авторизован, но не админ — 403
    if (!$user->is_admin) {
        return redirect()->route('account')->with('error', __('text.access-denied'));
    }

    $product = Product::find($this->productId);

    if ($product) {
        $product->delete();

        session()->flash('success', __('text.product-deleted-success'));

        return redirect()->route('catalog');
    }
}

    public function render()
    {
        return view('livewire.admin.delete-product');
    }
}
