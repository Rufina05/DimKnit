<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use Livewire\Attributes\On;

class EditProduct extends Component
{
    use WithFileUploads;

    public $productId = null;
    public $categories;
    public $sizes;
    public $name_en, $name_ru, $name_ro, $name_ee;
    public $slug_en, $slug_ru, $slug_ro, $slug_ee;
    public $description_en, $description_ru, $description_ro, $description_ee;
    public $price, $category_id, $size_id, $main_image;
    public $currentImage = null; // Для отображения текущего изображения

    public function mount()
    {
        $this->categories = Category::all();
        $this->sizes = Size::all();
    }

    public function save()
    {
        // Валидация
        $this->validate([
            'name_en' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_ro' => 'required|string|max:255',
            'name_ee' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'main_image' => 'nullable|image|max:2048', // 2MB максимум
        ]);

        $product = Product::findOrFail($this->productId);
        
        // Обновляем данные на всех языках
        foreach (['en', 'ru', 'ro', 'ee'] as $lang) {
            $product->{'name_'.$lang} = $this->{'name_'.$lang};
            $product->{'slug_'.$lang} = $this->{'slug_'.$lang};
            $product->{'description_'.$lang} = $this->{'description_'.$lang};
        }
        
        $product->price = $this->price;
        $product->category_id = $this->category_id;
        
        if ($this->size_id) {
            $product->size_id = $this->size_id;
        }

        // Обработка изображения
        if ($this->main_image instanceof \Livewire\TemporaryUploadedFile) {
            // Удаляем старое изображение
            if ($product->main_image && \Storage::disk('public')->exists($product->main_image)) {
                \Storage::disk('public')->delete($product->main_image);
            }
            
            // Сохраняем новое
            $product->main_image = $this->main_image->store('products', 'public');
        }

        $product->save();

        // Отправляем событие для закрытия модалки
        $this->dispatch('close-modal');
        
        // Отправляем событие для обновления списка продуктов
        $this->dispatch('product-updated');
        
        // Flash сообщение
        session()->flash('success', __('text.product-updated-successfully'));
        
        // Сбрасываем форму
        $this->reset([
            'productId', 
            'name_en', 'name_ru', 'name_ro', 'name_ee',
            'slug_en', 'slug_ru', 'slug_ro', 'slug_ee',
            'description_en', 'description_ru', 'description_ro', 'description_ee',
            'price', 'category_id', 'size_id', 'main_image', 'currentImage'
        ]);
        return redirect()->back();
    }

    #[On('edit-product')]
    public function loadProduct($id)
    {
        $this->productId = $id;
        $product = Product::findOrFail($id);

        // Загружаем данные всех языков
        foreach (['en', 'ru', 'ro', 'ee'] as $lang) {
            $this->{'name_'.$lang} = $product->{'name_'.$lang};
            $this->{'slug_'.$lang} = $product->{'slug_'.$lang};
            $this->{'description_'.$lang} = $product->{'description_'.$lang};
        }

        $this->price = $product->price;
        $this->category_id = $product->category_id;
        $this->size_id = $product->size_id;
        
        // Сохраняем путь к текущему изображению
        $this->currentImage = $product->main_image;
        $this->main_image = null; // Сбрасываем загрузку нового изображения

        // Отправляем событие для открытия модалки
        $this->dispatch('open-modal');
    }

    public function closeModal()
    {
        $this->dispatch('close-modal');
        
        // Сбрасываем форму при закрытии
        $this->reset([
            'productId', 
            'name_en', 'name_ru', 'name_ro', 'name_ee',
            'slug_en', 'slug_ru', 'slug_ro', 'slug_ee',
            'description_en', 'description_ru', 'description_ro', 'description_ee',
            'price', 'category_id', 'size_id', 'main_image', 'currentImage'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.edit-product');
    }
}