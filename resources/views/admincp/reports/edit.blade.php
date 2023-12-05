@extends('layouts.admincp')
@section('content')
    <div class="container-fluid p-0">
        @auth
            <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2 mb-xl-3">
                    <div class="col-auto d-none d-sm-block">
                        <h3><strong>{{ __('admincp.report') }}</strong> </h3>
                    </div>
                    <div class="col-auto ms-auto text-end mt-n1">
                        <button type="submit" class="btn btn-md btn-primary">{{ __('admincp.publish') }}</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        {{-- <a href="{{ route('category.create') }}"
                    class="btn btn-light bg-white me-2">{{ __('admincp.addcategory') }}</a>
                <a href="{{ route('posts.index') }}" class="btn btn-primary">Daftar Post</a> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header bg-dark text-white">
                                {{ __('admincp.add') }} {{ __('admincp.report') }}
                            </div>
                            <div class="card-body row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/1665px-No-Image-Placeholder.svg.png"
                                            class="img-fluid">
                                        <input type="file" class="form-control" name="files" id="inputGroupFile01">
                                    </div>


                                </div>
                                <div class="col-md-8">


                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('admincp.title') }}</label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ $laporan->title }}">
                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                        @error('title')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ __('admincp.content') }}</label>
                                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="9">{{ $laporan->content }}</textarea>
                                    </div>
                                    @error('content')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bg-dark text-white">
                                {{ __('admincp.setting') }}
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Type</span>
                                        <select class="form-select  @error('id_category') is-invalid @enderror" name="category">
                                            <option value="{{ $laporan->category }}">{{ $laporan->category }}</option>
                                            <option value="Annual Report">Annual Report</option>
                                            <option value="Financial Report">Financial Report</option>

                                        </select>
                                    </div>
                                </div>
                                @error('category')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ __('admincp.date') }}</label>
                                    <input type="date" class="form-control @error('gmt_date') is-invalid @enderror"
                                        name="date_gmt" aria-describedby="helpId" placeholder=""
                                        value="{{ $laporan->date_gmt }}">
                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                </div>
                                @error('date_gmt')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="mb-3">
                                    <label for="" class="form-label">{{ __('admincp.status') }}</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                                        <option value="{{ $laporan->status }}">{{ $laporan->status }}</option>
                                        <option value="draf">Draf</option>
                                        <option value="publish">Publish</option>
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
        @endauth
    </div>
    </div>
@endsection
