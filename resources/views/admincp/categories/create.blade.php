<!-- categories/create.blade.php -->

@extends('layouts.admincp')

@section('content')
    <div class="container">
        <h2>Create Category</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" required>
            </div>
            <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
