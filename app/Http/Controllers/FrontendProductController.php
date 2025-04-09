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
        $products = Product::with('categories')->paginate(9); // Paginate 9 per page
        $categories = Category::all();

        return view('frontend.products.index', compact('products', 'categories'));
    }



    public function show(Product $product)
    {
        return view('frontend.products.show', compact('product'));
    }
}
