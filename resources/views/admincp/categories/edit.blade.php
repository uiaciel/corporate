<!-- categories/edit.blade.php -->

@extends('layouts.admincp')

@section('content')
    <div class="container">
        <h2>Edit Category</h2>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}" required>
            </div>
            <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
