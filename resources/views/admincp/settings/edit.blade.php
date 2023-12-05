@extends('layouts.admincp')

@section('content')
    <div class="container">
        <h2>Create Setting</h2>
        <form action="{{ route('settings.update', $setting->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="sitename" class="form-label">Sitename</label>
                <input type="text" class="form-control" id="sitename" value="{{ $setting->sitename }}" name="sitename" required>
            </div>
            <div class="mb-3">
                <label for="tagline" class="form-label">Tagline</label>
                <input type="text" class="form-control" id="tagline" value="{{ $setting->tagline }}" name="tagline">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $setting->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
