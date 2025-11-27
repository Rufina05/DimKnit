<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductsCatalog extends Component
{
    public $products;
    public $filters = [];
    public $selectedCategory = null;

    protected $listeners = ['filtersUpdated' => 'updateFilters'];

    public function mount($products, $selectedCategory = null)
    {
        $this->products = $products;
        $this->selectedCategory = $selectedCategory;
        
        if ($selectedCategory) {
            $this->filters['categoryIds'] = [$selectedCategory];
        }
    }

    public function updateFilters($filters)
    {
        $this->filters = $filters;
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $query = Product::query();

        if (!empty($this->filters['categoryIds'])) {
            $query->whereIn('category_id', $this->filters['categoryIds']);
        }
        if (!empty($this->filters['sizeIds'])) {
            $query->whereIn('size_id', $this->filters['sizeIds']);
        }
        if (!empty($this->filters['availability'])) {
            $query->where('availability', true);
        }
        if (!empty($this->filters['has_frame'])) {
            $query->where('has_frame', true);
        }
        if (!empty($this->filters['removable_clothes'])) {
            $query->where('removable_clothes', true);
        }
        if (!empty($this->filters['has_parts'])) {
            $query->where('has_parts', true);
        }

        $this->products = $query->with(['category','size'])->get();
    }

    public function render()
    {
        return view('livewire.products-catalog', [
            'products' => $this->products
        ]);
    }
}
