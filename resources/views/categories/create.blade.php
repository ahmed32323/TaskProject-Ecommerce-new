@extends('layouts.master')

@section('title', 'Add Category')

@section('content')
<h1>Add New Category</h1>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Add Category</button>
</form>
@endsection
