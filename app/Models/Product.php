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

    // Отношения
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

    // Динамические атрибуты по текущей локали
    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'name_' . $locale} ?? $this->name_en;
    }

    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'description_' . $locale} ?? $this->description_en;
    }

    public function getSlugAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'slug_' . $locale} ?? $this->slug_en;
    }

    // Scope для поиска по slug текущей локали
    public function scopeWhereSlug($query, $slug)
    {
        $locale = app()->getLocale();
        $slugColumn = 'slug_' . $locale;
        return $query->where($slugColumn, $slug);
    }
}
