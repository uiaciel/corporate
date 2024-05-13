<!-- posts/index.blade.php -->
@extends('layouts.admincp')
@section('content')
<div class="container-fluid p-0">
    <div class="row mb-2 mb-xl-3">
        <div class="d-flex justify-content-between">
        <div>
            <h2 class="fw-bold">Posts             <a href="{{ route('posts.create') }}" class="btn btn-sm btn-dark"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
            </h2>

        </div>
            <div>
                <a href="{{ route('categories.index') }}" class="btn btn-sm btn-dark"><i class="fa fa-list" aria-hidden="true"></i> Category</a>
                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalId">
                    <i class="fa fa-upload" aria-hidden="true"></i> Import
                </button>
                <a href="{{ route('posts.export') }}" class="btn btn-sm btn-success"><i class="fa fa-download" aria-hidden="true"></i> Export</a>

            </div>

        </div>
        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Upload Report Xls
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('posts.import') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Choose file</label>
                                <input type="file" class="form-control" name="file" />
                                <div id="fileHelpId" class="form-text">Help text</div>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    Upload
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>
    <div class="row mb-3">
        <div class="list-group">
            @forelse ($posts as $index => $post)
            <div class="list-group-item ">
                <h4 class="mb-1"><a href="/id/media/{{ $post->slug_id }}" target="_blank">{{ $post->title_id }}</a></h4>
                <small><a href="/en/media/{{ $post->slug_en }}" class="text-dark" target="_blank">{{
                        $post->title_en }}</a><br />{{ $post->tanggal() }}</small>
                <div class="d-flex w-100 justify-content-between mt-3">
                    <div><span class="badge bg-dark">{{ $post->category->name }}</span> <span
                            class="badge bg-primary">{{ $post->status }}</span>
                    </div>
                    <div class="btn-group btn-group-sm !spacing" role="group" aria-label="Basic example">
                        <a class="btn btn-dark btn-sm" href="{{ route('posts.edit', $post->id) }}" role="button"><i
                                class="fa fa-pencil" aria-hidden="true"></i> Edit</a>

                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <!-- Modal trigger button -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#del{{ $post->id }}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="del{{ $post->id }}" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">
                                                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                                Delete Post
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body fw-bold">Are your sure delete this Page ?
                                            <p class="lead mt-3">
                                                {{ $post->title_id }} <small>{{ $post->title_en }}</small>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                CANCEL
                                            </button>
                                            <button type="submit" class="btn btn-danger">DELETE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! $posts->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection
