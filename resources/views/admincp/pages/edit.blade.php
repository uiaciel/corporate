@extends('layouts.admincp')
@section('content')
<div class="container-fluid p-0">
    @auth
    <form action="{{ route('pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xl-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body row">
                        <div class="col-md-6 ms-auto text-start mt-n1 mb-3">
                            <h3>Edit <strong>Page</strong> </h3>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <button type="submit" class="btn btn-sm btn-primary">PUBLISH</button>
                                    <a name="" id="" target="_blank" class="btn btn-sm btn-success"
                                        href="/{{ $page->slug_en }}" role="button"><i class="fa fa-eye"
                                            aria-hidden="true"></i> VIEW</a>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3" hidden>
                            <label for="" class="form-label fw-bold">Status</label>
                            <select class="form-control" name="status">
                                <option value="Publish">Publish</option>
                                <option value="draf">Draf</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label fw-bold">Date Publish</label>
                            <input type="date" id="date" class="form-control date" name="datepublish"
                                aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label fw-bold">Add to Category</label>
                            <select class="form-control" name="category">
                                <option value="{{ $page->category }}">{{ $page->category }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4 fs-4 fw-bold border-start border-5 border-danger ps-2">Indonesia</h4>
                        <div class="mb-3">
                            <label for="" class="form-label fs-4 fw-bold">Judul</label>
                            <input type="text" name="title_id" value="{{ $page->title_id }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-4 fw-bold">Konten</label>
                            <textarea class="form-control tinymcefull" id="tinymce" name="content_id"
                                rows="10">{{ $page->content_id }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label fs-4 fw-bold">FILE PDF</label>
                            <input class="form-control form-control-sm" id="formFileSm" name="pdf_id" type="file">
                        </div>
                        <div class="mb-3">
                            <ul>
                                <li><a href="/storage/{{ $page->pdf_id }}"><i class="fa fa-file-pdf-o"
                                            aria-hidden="true"></i> {{ $page->pdf_id }}</a>
                                            @if($page->pdf_id != null)
                                            <span><a href="#"
                                            class="text-danger" data-bs-toggle="modal" data-bs-target="#pdf_id"><i
                                                class="fa fa-trash text-danger" aria-hidden="true"></i></a></span></li>
                                                @endif



                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4 fs-4 fw-bold border-start border-5 border-primary ps-2">English</h4>
                        <div class="mb-3">
                            <label for="" class="form-label fs-4 fw-bold">Title</label>
                            <input type="text" name="title_en" value="{{ $page->title_en }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-4 fw-bold">Content</label>
                            <textarea class="form-control tinymcefull" name="content_en"
                                rows="10">{{ $page->content_en }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label fs-4 fw-bold">File PDF</label>
                            <input class="form-control form-control-sm" id="formFileSm" name="pdf_en" type="file">
                        </div>
                        <div class="mb-3">
                            <ul>
                                <li><a href="/storage/{{ $page->pdf_en }}"><i class="fa fa-file-pdf-o"
                                    aria-hidden="true"></i> {{ $page->pdf_en }}</a>

                                    @if($page->pdf_en != null)
                                    <span><a href="#"
                                    class="text-danger" data-bs-toggle="modal" data-bs-target="#pdf_en"><i
                                        class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>
                                    @endif

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="pdf_id" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-danger" id="modalTitleId">
                        <i class="fa fa-warning" aria-hidden="true"></i> Delete File
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="alert p-3 alert-warning">
                        Do you want delete this PDF file? The file will be deleted from the server storage</div>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('pages.deletefile', $page->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <input value="pdf_id" name="checkfile" hidden>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Back
                    </button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pdf_en" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-danger" id="modalTitleId">
                        <i class="fa fa-warning" aria-hidden="true"></i> Delete File
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="alert p-3 alert-warning">
                        Do you want delete this PDF file? The file will be deleted from the server storage</div>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('pages.deletefile', $page->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <input value="pdf_en" name="checkfile" hidden>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Back
                    </button>

                </div>
            </div>
        </div>
    </div>

    @endauth
</div>
@endsection
