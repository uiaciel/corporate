@extends('layouts.admincp')
@section('content')
    <div class="container-fluid p-0">
       @include('admincp.error')
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
                                <div class="col-md-3 ms-auto text-start mt-n1 mb-3">
                                    <h3>Add <strong>New Report</strong> </h3>
                                    <button type="submit" class="btn btn-sm btn-primary">PUBLISH</button>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="" class="form-label fw-bold" hidden>Status</label>
                                    <select class="form-control" name="status" hidden>
                                        <option value="Publish">Publish</option>
                                    
                                    </select>
                                    <label for="" class="form-label fw-2 fw-bold">Add to Announcement</label>
                                                    <select class="form-control" name="announcement">
                                                      
                                                        <option value="NO">NO</option>
                                                        <option value="YES">YES</option>
                                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="" class="form-label fw-bold fw-2">Add Category</label>
                                    <select class="form-control" name="category">
                                        <option value="Annual Report">Annual Report</option>
                                        <option value="Financial Report">Financial Report</option>
                                        <option value="Public Offering Prospectus">Public Offering Prospectus</option>
                                        <option value="Audit Committee Charter">Audit Committee Charter</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
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
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-2 fw-bold">TITLE</label>
                                            <input type="text" name="title"
                                                class="form-control @error('title') is-invalid @enderror">
                                        </div>
                                        
                                        
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold fw-2">File PDF</label>
                                            <input type="file" class="form-control @error('files') is-invalid @enderror" name="files" id="pdfFile" accept="application/pdf">
                                        </div>

                                        <iframe id="pdfPreview" width="100%" height="500"></iframe>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endauth
    </div>

    <script>
        $(document).ready(function(){
            $('#pdfFile').change(function(event){
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#pdfPreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                } else {
                    $('#pdfPreview').attr('src', '');
                }
            });
        });
    </script>

@endsection
