<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->where('deleted_at', null)->firstOrFail();
        $categories = Category::all();

        return view('products', compact('product', 'categories'));
    }
}
