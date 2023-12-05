<!-- posts/create.blade.php -->

@extends('layouts.admincp')
@section('content')
    <div class="container-fluid p-0">
        @auth
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="row">
                    <div class="col-xl-12">
                        <div class="card border-0 shadow rounded">

                            <div class="card-body row">
                                <div class="col-md-6 ms-auto text-start mt-n1">
                                    <h3>Add <strong>New Posts</strong> </h3>
                                    <button type="submit" class="btn btn-sm btn-primary">PUBLISH</button>
                                    <button type="reset" class="btn btn-sm btn-warning">RESET</button>

                                </div>

                                <div class="mb-3" hidden>
                                    <label for="" class="form-label fw-bold">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="Publish">Publish</option>
                                        <option value="Draf">Draf</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="form-label fw-bold">Date Publish</label>
                                    <input type="date" value="{{ $post->datepublish }}" class="form-control date" name="datepublish">

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
                            <div class="card-header">
                                Indonesia
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">Judul</label>
                                    <input type="text" name="title_id" value="{{ $post->title_id }}"
                                        class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">Konten</label>
                                    <textarea class="form-control tinymcefull" name="content_id" rows="10">{{ $post->content_id }}</textarea>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                English
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">Title</label>
                                    <input type="text" name="title_en" value="{{ $post->title_en }}"
                                        class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">Content</label>
                                    <textarea class="form-control tinymcefull" name="content_en" rows="10">{{ $post->content_en }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </form>
        @endauth
    </div>

    <script>
        $(document).ready(function() {
            $("#sidebar").addClass("collapsed");
        });
    </script>
@endsection
