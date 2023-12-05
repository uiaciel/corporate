<!-- posts/create.blade.php -->

@extends('layouts.admincp')

@section('content')
    <div class="container">
        <h2>Create Post</h2>
        <form action="{{ route('careers.update', $career->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title_id" class="form-label">Title (ID)</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $career->title }}" required>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3">{{ $career->content }}</textarea>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Excerpt</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="excerpt" rows="3">{{ $career->excerpt }}</textarea>
            </div>
            <!-- Tambahkan input untuk title_en, slug_id, slug_en, category_id, content_id, content_en, excerpt_id, excerpt_en, datepublish, dan status -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
