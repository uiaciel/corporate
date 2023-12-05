<!-- posts/show.blade.php -->

@extends('layouts.admincp')

@section('content')
    <div class="container">
        <h2>{{ $post->title_id }}</h2>
        <p>Category: {{ $post->category->name }}</p>
        <p>Date Publish: {{ $post->datepublish }}</p>

        <div class="mb-4">
            <img src="{{ asset('path/to/your/image.jpg') }}" alt="{{ $post->title_id }}" class="img-fluid">
        </div>

        <div>
            <p>{{ $post->content_id }}</p>
        </div>

        <div>
            <p>Excerpt: {{ $post->excerpt_id }}</p>
        </div>

        <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
    </div>
@endsection
