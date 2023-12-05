@extends('layouts.admincp')
@section('content')
    <div class="container-fluid p-0">

            <form action="{{ route('announcements.update', $announcement->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-2 mb-xl-3">
                    <div class="col-auto d-none d-sm-block">
                        <h3><strong>New Announcements</strong> </h3>
                    </div>
                    <div class="col-auto ms-auto text-end mt-n1">
                        <button type="submit" class="btn btn-md btn-primary">PUBLISH</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">TITLE</label>
                                    <input type="text" name="title" value="{{ $announcement->title }}"
                                        class="form-control ">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">CATEGORY</label>
                                    <input type="text" name="category" value="{{ $announcement->category }}"
                                        class="form-control ">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">PDF</label>
                                    <div class="ratio ratio-1x1">

                                        <iframe src=
                                        "/storage/{{ $announcement->pdf }}">
                                                </iframe>

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">CONTENT</label>
                                    <textarea class="form-control tinymcefull" name="content" rows="10">{{ $announcement->content }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-dark text-white"> SETTING
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold" id="date">HOMEPAGE</label>
                                    <select class="form-select form-select-lg" name="homepage">
                                        <option value="{{ $announcement->homepage }}">{{ $announcement->homepage }}</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold" id="date">DATE</label>
                                    <input type="date" value="{{ $announcement->datepublish }}" name="datepublish"
                                        class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-2 fw-bold">PDF</label>
                                    <input type="file" class="form-control"
                                        name="pdf" id="files" multiple>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label fw-2 fw-bold">Cover IMAGE</label>
                                    <input type="file" class="form-control @error('images') is-invalid @enderror"
                                        name="images" id="images" multiple>
                                </div>
                                <div class="mb-3">
                                    <img id="imgPreview" src="/storage/{{ $announcement->image }}" alt="preview image"
                                        class="img-fluid">
                                </div>
                                <div class="mb-3" hidden>
                                    <label for="" class="form-label">{{ __('admincp.status') }}</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                                        <option value="publish">Publish</option>
                                        <option value="draf">Draf</option>
                                    </select>
                                </div>
                                @error('status')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

        </form>

    </div>

    <script>
        document.getElementById('date').valueAsDate = new Date();
    </script>
@endsection
