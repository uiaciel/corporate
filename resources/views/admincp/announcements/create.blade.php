@extends('layouts.admincp')
@section('content')
    <div class="container-fluid p-0">
            @include('admincp.error')
            <form action="{{ route('announcements.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2 mb-xl-3">
                    <div class="col-auto d-none d-sm-block">
                        <h3><strong>New Announcements</strong> </h3>
                    </div>
                    <div class="col-auto ms-auto text-end mt-n1">
                        <button type="submit" class="btn btn-md btn-primary">PUBLISH</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">TITLE <span class="text-danger">*</span></label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror">
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label fw-bold">CATEGORY <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" id="category" name="category" class="form-control @error('category') is-invalid @enderror">
                                        <button class="btn btn-outline-secondary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            Suggestions
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="#" onclick="fillInput('Announcement')">Announcement</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="fillInput('Pemanggilan')">Pemanggilan</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="fillInput('RUPS')">RUPS</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="fillInput('Pengumuman')">Pengumuman</a></li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <script>
                                    function fillInput(value) {
                                        document.getElementById('category').value = value;
                                    }
                                </script>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-2 fw-bold">PDF <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file @error('pdf') is-invalid @enderror" name="pdf" id="pdfFile" accept="application/pdf">
                                </div>
                                
                                <iframe id="pdfPreview" width="100%" height="500"></iframe>
                                
                               
                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">CONTENT</label>
                                    <textarea class="form-control tinymcefull" name="content" rows="3" id="tinymce"></textarea>
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
                                    <label for="" class="form-label fw-bold">DATE</label>
                                    <input type="date" id="date" name="datepublish"
                                        class="form-control @error('datepublish') is-invalid @enderror">
                                </div>

                                <div class="mb-3" hidden>
                                    <label for="" class="form-label">STATUS</label>
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
