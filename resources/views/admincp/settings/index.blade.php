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
            <div class="mb-3">
                <label for="description" class="form-label">Keywords</label>
                <textarea class="form-control" id="description" name="keywords" rows="3">{{ $setting->keywords }}</textarea>
            </div>

            <div class="mb-3">
                <label for="tagline" class="form-label">Domain</label>
                <input type="text" class="form-control" id="tagline" value="{{ $setting->url }}" name="url">
            </div>
            <div class="mb-3">
                <label for="tagline" class="form-label">Google Site Verification</label>
                <input type="text" class="form-control" id="tagline" value="{{ $setting->googlesiteverification }}" name="googlesiteverification">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Office Address</label>
                <textarea class="form-control" id="description" name="address" rows="3">{{ $setting->address }}</textarea>
            </div>

            <div class="mb-3">
                <label for="tagline" class="form-label">Email Address</label>
                <input type="text" class="form-control" id="tagline" value="{{ $setting->email }}" name="email">
            </div>
            <div class="mb-3">
                <label for="tagline" class="form-label">Phone</label>
                <input type="text" class="form-control" id="tagline" value="{{ $setting->phone }}" name="phone">
            </div>
            <div class="mb-3">
                <label for="tagline" class="form-label">Stock Code</label>
                <input type="text" class="form-control" id="tagline" value="{{ $setting->code }}" name="code">
            </div>

            <div class="mb-3">
                <label for="tagline" class="form-label">Whatsapp</label>
                <input type="text" class="form-control" id="tagline" value="{{ $setting->whatsapp }}" name="whatsapp">
            </div>

            <div class="mb-3">
                <label for="tagline" class="form-label">Instagram</label>
                <input type="text" class="form-control" id="tagline" value="{{ $setting->instagram }}" name="instagram">
            </div>

            <div class="mb-3">
                <label for="tagline" class="form-label">Twitter</label>
                <input type="text" class="form-control" id="tagline" value="{{ $setting->twitter }}" name="twitter">
            </div>

            <div class="mb-3">
                <label for="tagline" class="form-label">Facebook</label>
                <input type="text" class="form-control" id="tagline" value="{{ $setting->facebook }}" name="facebook">
            </div>

            <div class="mb-3">
                <label for="tagline" class="form-label">Linkedin</label>
                <input type="text" class="form-control" id="tagline" value="{{ $setting->linkedin }}" name="linkedin">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
