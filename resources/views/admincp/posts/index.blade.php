<!-- posts/index.blade.php -->

@extends('layouts.admincp')

@section('content')

<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>All</strong> Posts <a href="{{ route('posts.create') }}"
                    class="btn btn-sm btn-primary">Add New</a></h3>
        </div>
        <div class="col-auto ms-auto text-end mt-n1">
            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary">Create Category</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-striped table-hover" id="data">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>

                                    <th>Category</th>

                                    <th>Date Publish</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $index => $post)
                                    <tr>
                                        <td scope="row">{{ $index + 1 }}</td>
                                        <td><a href="/id/media/{{ $post->slug_id }}" class="text-decoration-none" target="_blank">{{ $post->title_id }}</a>
                                        <p class="mt-2"><small class="fw-bold">English : <a href="/en/media/{{ $post->slug_en }}" target="_blank"> {{ $post->title_en }}</a></small></p></td>

                                        <td>{{ $post->category->name }}</td>


                                        <td>{{ $post->datepublish }}</td>
                                        <td>{{ Str::upper($post->status) }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('posts.edit', $post->id) }}"
                                                    class="btn btn-md btn-primary">Edit</a>
                                                <a href="/media/{{ $post->slug }}" target="_blank"
                                                    class="btn btn-md btn-success">View</a>

                                                <form onsubmit="return confirm('Are you sure you want to delete this post?');"
                                                    action="{{ route('posts.destroy', $post->id) }}" method="POST">

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-md btn-danger">Delete</button>
                                                </form>

                                            </div>


                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Post belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
