<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ComingSoon;

class AddComingSoon extends Component
{
    use WithFileUploads;

    public $coming_image;
    public $successMessage = '';

    protected $rules = [
        'coming_image' => 'required|image|max:5120', 
    ];

    public function save()
    {
        $this->validate();

        $filename = time() . '_' . $this->coming_image->getClientOriginalName();

        $this->coming_image->storeAs('comingsoon', $filename, 'public');

        ComingSoon::create([
            'coming_image' => $filename,
        ]);

        $this->reset('coming_image');

        $this->successMessage = __('text.image-success');
    }

    public function render()
    {
        return view('livewire.admin.add-coming-soon');
    }
}
