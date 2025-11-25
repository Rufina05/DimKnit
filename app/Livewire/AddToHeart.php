<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Heart;
use App\Models\HeartItem;


class AddToHeart extends Component
{
    public $productId;

    public function addToHeart()
    {
        //user
        $user = Auth::user();

        //user's heart
        $heart = Heart::firstOrCreate([
            "user_id" => $user->id
        ]);

        // add item to heart 
        $item = HeartItem::where("heart_id", $heart->id)
            ->where("product_id", $this->productId)
            ->first();

        if (! $item) {
            HeartItem::create([
                "heart_id" => $heart->id,
                "product_id" => $this->productId,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.add-to-heart');
    }
}
