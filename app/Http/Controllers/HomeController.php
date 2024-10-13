<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('home', compact('categories'));
    }

    public function showCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = $category->products;
        $categories = Category::all();

        return view('categories', compact('category', 'products', 'categories'));
    }
}
