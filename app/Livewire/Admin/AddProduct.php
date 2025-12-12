<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class AddProduct extends Component
{
    use WithFileUploads;

    public $name_en, $name_ro, $name_ru, $name_ee;
    public $slug_en, $slug_ro, $slug_ru, $slug_ee;
    public $description_en, $description_ro, $description_ru, $description_ee;
    public $price, $category_id, $size_id;
    public $has_frame = false;
    public $is_available = true;
    public $has_parts = false;
    public $main_image;

    public $categories;
    public $sizes;

    public function mount()
    {
        $this->categories = Category::all();
        $this->sizes = Size::all();
    }

    protected function rules()
    {
        return [
            'name_en' => 'required|string|max:255',
            'name_ro' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_ee' => 'required|string|max:255',
            'slug_en' => 'required|string|max:255|unique:products,slug_en',
            'slug_ro' => 'required|string|max:255|unique:products,slug_ro',
            'slug_ru' => 'required|string|max:255|unique:products,slug_ru',
            'slug_ee' => 'required|string|max:255|unique:products,slug_ee',
            'description_en' => 'required|string',
            'description_ro' => 'required|string',
            'description_ru' => 'required|string',
            'description_ee' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'size_id' => 'required|exists:sizes,id',
            'main_image' => 'required|image|max:2048',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function generateSlugs()
    {
        $this->slug_en = Str::slug($this->name_en);
        $this->slug_ro = Str::slug($this->name_ro);
        $this->slug_ru = Str::slug($this->name_ru);
        $this->slug_ee = Str::slug($this->name_ee);
    }

    public function save()
    {
        $this->generateSlugs();
        $validatedData = $this->validate();

        $validatedData['main_image'] = $this->main_image->store('products', 'public');

        $validatedData['has_frame'] = $this->has_frame;
        $validatedData['availability'] = $this->is_available;
        $validatedData['has_parts'] = $this->has_parts;

        Product::create($validatedData);

        // Очистка формы
        $this->reset([
            'name_en','name_ro','name_ru','name_ee',
            'slug_en','slug_ro','slug_ru','slug_ee',
            'description_en','description_ro','description_ru','description_ee',
            'price','category_id','size_id','has_frame','is_available','has_parts','main_image'
        ]);

        session()->flash('success', __('text.product-created-success'));
    }

    public function render()
    {
        return view('livewire.admin.add-product');
    }
}
