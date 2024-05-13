@extends('layouts.admincp')
@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>All</strong> Categories</h3>
            </div>
            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        CATEGORY
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label" for="inputEmail4">Category Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" placeholder="Category">
                                </div>
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        LIST CATEGORY
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Posts</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $index => $category)
                                        <tr>
                                            <td scope="row">{{ $index + 1 }}</td>
                                            <td>{{ $category->name }} </td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="/category/{{ $category->slug }}" class="btn btn-sm btn-success"
                                                        target="_blank">View</a>
                                                    <a href="" data-bs-toggle="modal"
                                                        data-bs-target="#editcetegory{{ $category->id }}"
                                                        class="btn btn-sm btn-primary">EDIT</a>
                                                    <form 
                                                        action="{{ route('categories.destroy', $category->id) }}"
                                                        method="POST">

                                                        @csrf
                                                        @method('DELETE')
                                                    
                                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteform{{ $category->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                        <div class="modal fade" id="deleteform{{ $category->id }}" tabindex="-1" data-bs-backdrop="static"
                                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">
                                                            <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                                            Delete Category
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body fw-bold">Are your sure delete this Category ?
                                                        <p class="lead mt-3">
                                                            {{ $category->name }}
                                                          </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            CANCEL
                                                        </button>
                                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                    
                                                    </form>
                                                </div>



                                            </td>
                                            <!-- Modal -->
                                            <div class="modal fade" id="editcetegory{{ $category->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-dark">
                                                            <h5 class="modal-title text-white" id="exampleModalLabel">Edit
                                                                Category</h5>
                                                            <button type="button" class="btn-close text-white"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('categories.update', $category->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">

                                                                <div class="row">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="inputEmail4">Category
                                                                            Name
                                                                        </label>
                                                                        <input type="text"
                                                                            class="form-control @error('name') is-invalid @enderror"
                                                                            name="name" value="{{ $category->name }}"
                                                                            placeholder="Category">
                                                                    </div>
                                                                    @error('name')
                                                                        <div class="alert alert-danger mt-2">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="submit"
                                                                    class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

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
