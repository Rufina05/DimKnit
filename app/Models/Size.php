<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Product;

class Size extends Model
{
    protected $fillable = [
        'name_en',
        'name_ro',
        'name_ru',
        'name_ee'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'name_' . $locale} ?? $this->name_en;
    }
}