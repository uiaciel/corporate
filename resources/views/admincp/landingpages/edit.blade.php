<!-- landingpages/edit.blade.php -->

@extends('layouts.admincp')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="mb-3">Edit Navigation</h2>
        <form action="{{ route('landingpages.update', $landingpage->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="key" class="form-label fw-bold">Key</label>
                <input type="text" class="form-control" id="key" name="key" value="{{ $landingpage->key }}" readonly>
            </div>
            <div class="mb-3">
                <label for="textarea" class="form-label fw-bold">CONTENT INDONESIA</label>
                <textarea class="form-control" name="value_id" id="editor" rows="20">{{ $landingpage->value_id }}</textarea>
            </div>

            <div class="mb-3">
                <label for="textarea" class="form-label fw-bold">CONTENT ENGLISH</label>
                <textarea class="form-control editor" name="value_en" id="editor2" rows="20">{{ $landingpage->value_en }}</textarea>
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label fw-bold">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ $landingpage->slug }}" readonly>
            </div>
            <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
            </div>
        </div>
    </div>
@endsection
