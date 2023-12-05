<!-- landingpages/create.blade.php -->

@extends('layouts.admincp')

@section('content')
    <div class="container">
        <h2>Create Landingpage</h2>
        <form action="{{ route('landingpages.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="key" class="form-label">KEY</label>
                <input type="text" class="form-control" id="key" name="key" required>
            </div>

            <div class="mb-3">
                <label for="textarea" class="form-label">CONTENT INDONESIA</label>
                <textarea class="form-control" name="value_id" id="editor" rows="5"></textarea>
            </div>

            <div class="mb-3">
                <label for="textarea" class="form-label">CONTENT ENGLISH</label>
                <textarea class="form-control editor" name="value_en" id="editor2" rows="5"></textarea>
            </div>

            <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
