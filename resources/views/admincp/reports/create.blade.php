@extends('layouts.admincp')
@section('content')
    <div class="container-fluid p-0">
        @auth
            <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2 mb-xl-3">
                    <div class="col-auto d-none d-sm-block">
                        <h3><strong>REPORTS</strong> </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card border-0 shadow rounded">
                            <div class="card-body row">
                                <div class="col-md-6 ms-auto text-start mt-n1">
                                    <h3>Add <strong>New Report</strong> </h3>
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
                                    <label for="" class="form-label fw-bold fw-2">Add Category</label>
                                    <select class="form-control" name="category">
                                        <option value="Annual Report">Annual Report</option>
                                        <option value="Financial Report">Financial Report</option>
                                        <option value="Public Offering Prospectus">Public Offering Prospectus</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="form-label fw-bold fw-2">Date Publish</label>
                                    <input type="date" id="date"
                                        class="form-control date" name="datepublish"
                                        aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-2 fw-bold">TITLE</label>
                                            <input type="text" name="title"
                                                class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label fw-2 fw-bold">Cover</label>
                                            <input type="file" class="form-control @error('images') is-invalid @enderror"
                                                name="images" id="images" multiple>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold fw-2">File PDF</label>
                                            <input type="file" class="form-control" name="files" id="inputGroupFile01">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img id="imgPreview" src="https://via.placeholder.com/600x800.png" alt="preview image"
                                        class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endauth
    </div>
    </div>
@endsection
