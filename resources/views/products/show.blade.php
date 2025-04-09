@extends('layouts.master')

@section('title', 'Product Details')

@section('content')
<h1 class="mb-4">{{ $product->title }}</h1>
<p><strong>Slug:</strong> {{ $product->slug }}</p>
<p><strong>Price:</strong> ${{ $product->price }}</p>
<p><strong>Description:</strong> {{ $product->description }}</p>
<p><strong>Categories:</strong>
    @foreach($product->categories as $category)
        {{ $category->name }}@if(!$loop->last), @endif
    @endforeach
</p>
<a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Products</a>
@endsection
