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
        $categories = Category::with("products")->get();
        $sizes = Size::all();
        $selectedCategory = $request->query('category');
        $products = Product::all();

        return view("catalog", [
            "categories" => $categories,
            "sizes" => $sizes,
            "selectedCategory" => $selectedCategory,
            "products" => $products
        ]);
    }

    public function contacts()
    {
        return view("contacts");
    }
}
