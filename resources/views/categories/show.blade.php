@extends('layouts.master')

@section('title', 'Category Details')

@section('content')
<h1>{{ $category->name }}</h1>
<p><strong>Slug:</strong> {{ $category->slug }}</p>
<p><strong>Products:</strong>
    @foreach($category->products as $product)
        {{ $product->title }}@if(!$loop->last), @endif
    @endforeach
</p>
<a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
@endsection
