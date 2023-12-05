@extends('layouts.admincp')

@section('content')
    <div class="container">

        <form action="{{ route('settings.update', $setting->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-2 mb-xl-3">
                <div class="col-auto d-none d-sm-block">
                    <h3><strong>Website Setting</strong> </h3>
                </div>

                <div class="col-auto ms-auto text-end mt-n1">

                    <button type="submit" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
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
