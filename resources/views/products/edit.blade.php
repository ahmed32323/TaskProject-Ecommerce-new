@extends('layouts.master')

@section('title', 'Edit Product')

@section('content')
<h1>Edit Product</h1>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $product->title }}" required>
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" class="form-control" value="{{ $product->slug }}" required>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="categories">Categories</label>
        <select name="categories[]" class="form-control" multiple>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->categories->contains($category) ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update Product</button>
</form>
@endsection
