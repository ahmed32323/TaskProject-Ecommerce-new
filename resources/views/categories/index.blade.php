@extends('layouts.master')

@section('title', 'Category List')

@section('content')
<h1>Categories</h1>

<!-- Add Category Button -->
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createCategoryModal">Add Category</button>

<!-- Category Table -->
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>
                    <!-- Edit Button -->
                    <button class="btn btn-warning btn-sm" onclick="editCategory({{ $category }})">
                        Edit
                    </button>

                    <!-- Delete Form -->
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Create Category Modal -->
<div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryModalLabel">Create Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create Category</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="editCategoryForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="editName">Name</label>
                        <input type="text" name="name" id="editName" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="editSlug">Slug</label>
                        <input type="text" name="slug" id="editSlug" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function editCategory(category) {
        $('#editCategoryModal').modal('show');
        $('#editCategoryForm').attr('action', '/categories/' + category.id);
        $('#editName').val(category.name);
        $('#editSlug').val(category.slug);
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

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
