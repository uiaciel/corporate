@extends('layouts.admincp')

@section('content')
    <div class="container">
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
                                    <form method="POST" action="{{ route('settings.import') }}"
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
        <form action="{{ route('settings.update', $setting->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-2 mb-xl-3">
                <div class="col-auto d-none d-sm-block">
                    <h3><strong>Website Setting</strong> </h3>
                </div>

                <div class="col-auto ms-auto text-end mt-n1">

                    <button type="submit" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalId">
                        <i class="fa fa-file-import" aria-hidden="true"></i> Import
                    </button>
                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->

                </div>
            </div>


        <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="sitename" class="form-label fw-bold">Sitename</label>
                                <input type="text" class="form-control" id="sitename" value="{{ $setting->sitename }}" name="sitename" required>
                            </div>
                            <div class="mb-3">
                                <label for="tagline" class="form-label fw-bold">Tagline</label>
                                <input type="text" class="form-control" id="tagline" value="{{ $setting->tagline }}" name="tagline">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ $setting->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">Keywords</label>
                                <textarea class="form-control" id="description" name="keywords" rows="3">{{ $setting->keywords }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="tagline" class="form-label fw-bold">Domain</label>
                                <input type="text" class="form-control" id="tagline" value="{{ $setting->url }}" name="url">
                            </div>

                            <div class="mb-3">
                                <label for="tagline" class="form-label fw-bold">Google Site Verification</label>
                                <input type="text" class="form-control" id="tagline" value="{{ $setting->googlesiteverification }}" name="googlesiteverification">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">Office Address</label>
                                <textarea class="form-control" id="description" name="address" rows="3">{{ $setting->address }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="tagline" class="form-label fw-bold">Email Address</label>
                                <input type="text" class="form-control" id="tagline" value="{{ $setting->email }}" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="tagline" class="form-label fw-bold">Phone</label>
                                <input type="text" class="form-control" id="tagline" value="{{ $setting->phone }}" name="phone">
                            </div>
                            <div class="mb-3">
                                <label for="tagline" class="form-label fw-bold">Stock Code</label>
                                <input type="text" class="form-control" id="tagline" value="{{ $setting->code }}" name="code">
                            </div>


                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="tagline" class="form-label fw-bold">Whatsapp</label>
                                <input type="text" class="form-control" id="tagline" value="{{ $setting->whatsapp }}" name="whatsapp">
                            </div>

                            <div class="mb-3">
                                <label for="tagline" class="form-label fw-bold">Instagram</label>
                                <input type="text" class="form-control" id="tagline" value="{{ $setting->instagram }}" name="instagram">
                            </div>

                            <div class="mb-3">
                                <label for="tagline" class="form-label fw-bold">Twitter</label>
                                <input type="text" class="form-control" id="tagline" value="{{ $setting->twitter }}" name="twitter">
                            </div>

                            <div class="mb-3">
                                <label for="tagline" class="form-label fw-bold">Facebook</label>
                                <input type="text" class="form-control" id="tagline" value="{{ $setting->facebook }}" name="facebook">
                            </div>

                            <div class="mb-3">
                                <label for="tagline" class="form-label fw-bold">Linkedin</label>
                                <input type="text" class="form-control" id="tagline" value="{{ $setting->linkedin }}" name="linkedin">
                            </div>


                        </div>
                    </div>
                </div>

        </div>
    </form>
    </div>
@endsection
