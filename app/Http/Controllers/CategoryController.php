<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $locale = app()->getLocale();
        $column = 'slug_' . $locale;

        $category = Category::where($column, $slug)->firstOrFail();

        return redirect()->route('catalog', ['category' => $category->id]);
    }
}
