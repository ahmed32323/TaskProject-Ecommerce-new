@extends('layouts.master')

@section('title', 'Add Product')

@section('content')
<h1>Add New Product</h1>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="categories">Categories</label>
        <select name="categories[]" class="form-control" multiple>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Add Product</button>
</form>
@endsection
