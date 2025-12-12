<?php

namespace App\Livewire;

use Livewire\Component;

class HeartSuccessModal extends Component
{
    // Этот компонент теперь только рендерит view
    // Вся логика управления модалкой в Alpine.js
    
    public function render()
    {
        return view('livewire.heart-success-modal');
    }
}