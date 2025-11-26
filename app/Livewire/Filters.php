<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;    


class Filters extends Component
{
    public $categories;
    public $sizes;

    public $categoryIds = [];
    public $sizeIds = [];
    public $availability = false;
    public $has_frame = false;
    public $removable_clothes = false;
    public $has_parts = false;

    protected $queryString = [
        'categoryIds' => ['except' => []],
        'sizeIds' => ['except' => []],
        'availability' => ['except' => false],
        'has_frame' => ['except' => false],
        'removable_clothes' => ['except' => false],
        'has_parts' => ['except' => false],
    ];

    public function updated($propertyName)
    {
        $this->dispatch('filtersUpdated', [
            'categoryIds' => $this->categoryIds,
            'sizeIds' => $this->sizeIds,
            'availability' => $this->availability,
            'has_frame' => $this->has_frame,
            'removable_clothes' => $this->removable_clothes,
            'has_parts' => $this->has_parts,
        ]);
    }
    public function mount($categories = null, $sizes = null, $selectedCategory = null)
    {
        $this->categories = $categories ?? Category::all();
        $this->sizes = $sizes ?? Size::all();
        
        if ($selectedCategory) {
            $this->categoryIds = [$selectedCategory];
        }
    }

    public function getFilteredProductsProperty()
    {
        $query = Product::query();

        if (!empty($this->categoryIds)) {
            $query->whereIn('category_id', $this->categoryIds);
        }
        if (!empty($this->sizeIds)) {
            $query->whereIn('size_id', $this->sizeIds);
        }
        if ($this->availability) {
            $query->where('availability', true);
        }
        if ($this->has_frame) {
            $query->where('has_frame', true);
        }
        if ($this->removable_clothes) {
            $query->where('removable_clothes', true);
        }
        if ($this->has_parts) {
            $query->where('has_parts', true);
        }

        return $query->with(['category','size'])->get();
    }

    public function render()
    {
        return view('livewire.filters');
    }
    public function resetFilters()
    {
        $this->categoryIds = [];
        $this->sizeIds = [];
        $this->availability = false;
        $this->has_frame = false;
        $this->removable_clothes = false;
        $this->has_parts = false;

        $this->dispatch('filtersUpdated', [
            'categoryIds' => [],
            'sizeIds' => [],
            'availability' => false,
            'has_frame' => false,
            'removable_clothes' => false,
            'has_parts' => false,
        ]);

        return redirect()->route('catalog');
    }
}
