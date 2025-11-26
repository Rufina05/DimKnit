<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;

class PageController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        return view("home", ["categories" => $categories]);
    }

    public function catalog(Request $request)
    {
        $categoryId = $request->get('category');
        
        $query = Product::with(['category', 'size']);
        
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }
        
        $products = $query->get();
        $categories = Category::all();
        $sizes = Size::all();
        
        return view("catalog", ["products" => $products, "selectedCategory" => $categoryId, "categories" => $categories, "sizes" => $sizes]);
    }

    public function contacts()
    {
        return view("contacts");
    }
}
