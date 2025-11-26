<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Heart;
use App\Models\HeartItem;

class RemoveFromHeart extends Component
{
    public $productId;

    public function removeFromHeart()
    {
        $user = Auth::user();
        if (!$user) return;

        $heart = Heart::where('user_id', $user->id)->first();
        if (!$heart) return;

        $item = HeartItem::where('heart_id', $heart->id)
                        ->where('product_id', $this->productId)
                        ->first();

        if ($item) {
            $item->delete();

            return redirect()->route('heart');
        }
    }
    public function render()
    {
        return view('livewire.remove-from-heart');
    }
}
