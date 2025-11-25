<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ComingSoon;

class ComingSoonImages extends Component
{
    public function render()
    {
        $images = ComingSoon::orderBy('id', 'desc')->take(4)->get();
        
        return view('livewire.coming-soon-images', [
            'images' => $images
        ]);
    }
}
