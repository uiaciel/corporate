<!-- pages/index.blade.php -->
@extends('layouts.admincp')
@section('content')
<div class="container-fluid p-0">
    <div class="row mb-2 mb-xl-3">
        <div class="d-flex justify-content-between">
            <h2 class="fw-bold">Pages</h2>
            <div>
                <a href="{{ route('pages.create') }}" class="btn btn-sm btn-dark"> <i class="fa fa-plus" aria-hidden="true"></i>Add New</a>
                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalId">
                    <i class="fa fa-upload" aria-hidden="true"></i> Import
                </button>
                <a href="{{ route('pages.export') }}" class="btn btn-sm btn-success"><i class="fa fa-download" aria-hidden="true"></i> Export</a>
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
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('pages.import') }}"
                                enctype="multipart/form-data">
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
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">

                  
                    <table class="table table-hover table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="fw-bold">Title</th>
                                <th class="fw-bold">Status</th>
                                <th class="d-none d-md-table-cell fw-bold">Category</th>
                                <th class="d-none d-md-table-cell fw-bold">Date Publish</th>

                                <th class="fw-bold">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pages as $index => $page)
                            <tr>
                                <td>{{ $page->title_id }}</td>
                                <td>
                                    @if ($page->status == "Publish")
                                    <span class="badge bg-success">{{ $page->status }}</span>
                                    @else
                                    <span class="badge bg-warning">{{ $page->status }}</span>
                                    @endif
                                    </td>
                                <td class="d-none d-md-table-cell">{{ $page->category }}</td>
                                <td class="d-none d-md-table-cell">{{ $page->datepublish }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm !spacing" role="group" aria-label="Basic example">
                                        <a

                                            class="btn btn-dark btn-sm"
                                            href="{{ route('pages.edit', $page->id) }}"
                                            role="button"
                                            ><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a
                                        >


                                    <form action="{{ route('pages.destroy', $page->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <!-- Modal trigger button -->
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteform{{ $page->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                        <!-- Modal Body -->
                                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                        <div class="modal fade" id="deleteform{{ $page->id }}" tabindex="-1" data-bs-backdrop="static"
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
                                                            {{ $page->title_id }} <small>{{ $page->title_en }}</small>
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

                            </tr>
                            @empty
                            @endforelse


                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            {!! $pages->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection
