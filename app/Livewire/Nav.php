<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class Nav extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.nav', ["categories" => $categories]);
    }
}
