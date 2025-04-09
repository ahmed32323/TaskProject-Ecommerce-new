<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->get();
        $categories = Category::all();  // Get all categories from the database
        return view('frontend.products.index', compact('products', 'categories'));
    }


    public function show(Product $product)
    {
        return view('frontend.products.show', compact('product'));
    }
}
