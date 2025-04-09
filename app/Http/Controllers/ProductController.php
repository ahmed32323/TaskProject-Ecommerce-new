<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
        ]);

        $product = Product::create($request->only('title', 'slug', 'price', 'description'));
        $product->categories()->attach($request->categories);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug,' . $product->id,
            'price' => 'required|numeric',
            'description' => 'required|string',
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
        ]);

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
