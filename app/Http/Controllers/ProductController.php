<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('categories')->get();
        $categories = Category::all();  // Fetch all categories
        return view('products.index', compact('products', 'categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->only('title', 'slug', 'price', 'description'));
        $product->categories()->attach($request->categories);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // update the product

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->only('title', 'slug', 'price', 'description'));
        $product->categories()->sync($request->categories);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
