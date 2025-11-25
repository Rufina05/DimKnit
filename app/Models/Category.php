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
}
