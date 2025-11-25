<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Category;
use App\Models\Size;
use App\Models\CartItem;

class Product extends Model
{
    protected $fillable = [
        'name_en', 'name_ro', 'name_ru', 'name_ee',
        'slug_en', 'slug_ro', 'slug_ru', 'slug_ee',
        'description_en', 'description_ro', 'description_ru', 'description_ee',
        'price', 
        'availability',
        'has_frame', 
        'removable_clothes', 
        'has_parts',
        'main_image', 
        'size_id', 
        'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }
}
