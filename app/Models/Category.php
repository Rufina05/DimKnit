<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name_en',
        'name_ru',
        'name_ro',
        'name_ee',
        'slug_en',
        'slug_ru',
        'slug_ro',
        'slug_ee',
        'category_id',
    ];

    public function products():HasMany
    {
        return $this->hasMany(Product::class);
    }
    
    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'name_' . $locale} ?? $this->name_en;
    }

    public function getSlugAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'slug_' . $locale} ?? $this->slug_en;
    }
}
