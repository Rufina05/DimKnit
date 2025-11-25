<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $req)
    {
        $query = $req->input("q");
      
        // 1.Products
        $products = Product::where('name_en', 'LIKE', "%{$query}%")
            ->orWhere('name_ro', 'LIKE', "%{$query}%")
            ->orWhere('name_ru', 'LIKE', "%{$query}%")
            ->orWhere('name_ee', 'LIKE', "%{$query}%")
            ->get();

        // 2.Categories
        $categories = Category::where('name_en', 'LIKE', "%{$query}%")
            ->orWhere('name_ro', 'LIKE', "%{$query}%")
            ->orWhere('name_ru', 'LIKE', "%{$query}%")
            ->orWhere('name_ee', 'LIKE', "%{$query}%")
            ->get();
        return response()->json([
            "products"=>$products,
            "categories"=>$categories
        ]);
    }
}
