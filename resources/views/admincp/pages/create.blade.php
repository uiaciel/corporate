@extends('layouts.admincp')
@section('content')
    <div class="container-fluid p-0">
        @auth
            @if (session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card border-0 shadow rounded">

                            <div class="card-body row">
                                <div class="col-md-6 ms-auto text-start mt-n1">
                                    <h3>Add <strong>New Page</strong> </h3>
                                    <button type="submit" class="btn btn-sm btn-primary">PUBLISH</button>
                                    <button type="reset" class="btn btn-sm btn-warning">RESET</button>

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
                                    <input type="date" id="date"
                                        class="form-control date" name="datepublish"
                                        aria-describedby="helpId" placeholder="">

                                </div>



                                <div class="col-md-3">
                                    <label for="" class="form-label fw-bold">Add to Category</label>
                                    <select class="form-control" name="category">
                                        <option value="About Us">About US</option>
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
                                <div class="mb-3">
                                    <label for="" class="form-label fs-4 fw-bold">Judul</label>
                                    <input type="text" name="title_id"
                                        class="form-control">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label fs-4 fw-bold">Konten</label>
                                    <textarea class="form-control tinymcefull" id="tinymce" name="content_id" rows="10"></textarea>

                                </div>

                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label fs-4 fw-bold">FILE PDF</label>
                                    <input class="form-control form-control-sm" id="formFileSm" name="pdf_id" type="file">
                                  </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label fs-4 fw-bold">Title</label>
                                    <input type="text" name="title_en"
                                        class="form-control">


                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label fs-4 fw-bold">Content</label>
                                    <textarea class="form-control tinymcefull" name="content_en" rows="10"></textarea>

                                </div>

                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label fs-4 fw-bold">File PDF</label>
                                    <input class="form-control form-control-sm" id="formFileSm" name="pdf_en" type="file">
                                  </div>

                            </div>
                        </div>
                    </div>

                </div>
            </form>
        @endauth
    </div>

@endsection
