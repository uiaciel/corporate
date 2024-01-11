<!-- posts/create.blade.php -->
@extends('layouts.admincp')
@section('content')
<div class="container-fluid p-0">
    @if ($errors->any())
    <div class="alert alert-danger alert-outline-coloured alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div class="alert-message">
            <p><strong class="text-danger">Opps Error!</strong> Please Check Field below</p>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </div>
    </div>
    @endif
    @auth
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body row">
                        <div class="col-md-6 ms-auto text-start mt-n1 mb-3">
                            <h3>Add <strong>New Posts</strong> </h3>
                            <button type="submit" class="btn btn-sm btn-dark">PUBLISH</button>
                        </div>
                        <div hidden>
                            <label for="" class="form-label fw-bold">Status</label>
                            <select class="form-control" name="status">
                                <option value="Publish">Publish</option>
                                <option value="Draf">Draf</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="" class="form-label fw-bold">Date Publish</label>
                            <input type="date" id="date" class="form-control date" name="datepublish">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label fw-bold">Add to Category</label>
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4 border-start border-5 border-danger ps-2">Indonesia</h4>
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">Judul</label>
                            <input type="text" name="title_id" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">Konten</label>
                            <textarea class="form-control tinymcefull" name="content_id" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4 border-start border-5 border-primary ps-2">English</h4>
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">Title</label>
                            <input type="text" name="title_en" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">Content</label>
                            <textarea class="form-control tinymcefull" name="content_en" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endauth
</div>
@endsection
