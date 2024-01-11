<!-- pages/index.blade.php -->
@extends('layouts.admincp')
@section('content')
<div class="container-fluid p-0">
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h3><strong>Pages</strong> <a href="{{ route('pages.create') }}" class="btn btn-sm btn-dark">Add New</a>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Status</th>
                                <th class="d-none d-md-table-cell">Kategori</th>
                                <th class="d-none d-md-table-cell">Date Publish</th>

                                <th>Action</th>
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
        <div class="col-md-12">
            {!! $pages->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection
