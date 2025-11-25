<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::where('slug_en', $slug)->with('category')->firstOrFail();

        return view('products.show', ['product' => $product]);



    }
}
