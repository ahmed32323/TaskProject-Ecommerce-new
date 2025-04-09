@extends('layouts.master')

@section('title', 'Product List')

@section('content')
<h1>Products</h1>

<!-- Add Product Button -->
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createProductModal">Add Product</button>

<!-- Products Table -->
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Slug</th>
            <th>Price</th>
            <th>Description</th>
            <th>Categories</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->title }}</td>
                <td>{{ $product->slug }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ Str::limit($product->description, 100) }}</td>
                <td>
                    @foreach($product->categories as $category)
                        {{ $category->name }}@if(!$loop->last), @endif
                    @endforeach
                </td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="editProduct({{ $product->toJson() }})">Edit</button>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Create Product Modal -->
<div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="createProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('products.store') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="createProductModalLabel">Create Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Categories</label>
                    <select name="categories[]" class="form-control" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create Product</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editProductForm" method="POST" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" id="editTitle" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" id="editSlug" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" id="editPrice" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" id="editDescription" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Categories</label>
                    <select name="categories[]" id="editCategories" class="form-control" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>
</div>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- JS for Edit Product Modal -->
<script>
    function editProduct(product) {
        const modal = new bootstrap.Modal(document.getElementById('editProductModal'));
        document.getElementById('editProductForm').action = '/products/' + product.id;
        document.getElementById('editTitle').value = product.title;
        document.getElementById('editSlug').value = product.slug;
        document.getElementById('editPrice').value = product.price;
        document.getElementById('editDescription').value = product.description;

        const categorySelect = document.getElementById('editCategories');
        const selectedIds = product.categories.map(c => c.id);
        [...categorySelect.options].forEach(option => {
            option.selected = selectedIds.includes(parseInt(option.value));
        });

        modal.show();
    }

    // SweetAlert Delete Confirmation
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const form = this.closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
