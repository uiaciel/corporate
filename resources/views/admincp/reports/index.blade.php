@extends('layouts.admincp')
@section('content')
<div class="container-fluid p-0">
    <div class="row mb-2 mb-xl-3">
        <div class="d-flex justify-content-between">
            <h3 class="fw-bold">REPORTS</h3>
            <div>
                <a href="{{ route('reports.create') }}" class="btn btn-dark btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a>
                <!-- Modal trigger button -->
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalId">
                    Import
                </button>

            </div>
        </div>
        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">
                                    Import Data
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('reports.import') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Choose file</label>
                                        <input type="file" class="form-control" name="file" />
                                        <div id="fileHelpId" class="form-text">Format File : Xls, Xlsx, Csv</div>
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

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3 mt-3">Annual Reports</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-dark text-white fw-bold">
                                <tr>
                                    <th>NO</th>
                                    <th>TITLE</th>
                                    <th>DATE PUBLISH</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts->where('category', 'Annual Report') as $annual)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $annual->title }}</td>
                                    <td>{{ $annual->tanggal() }}</td>
                                    <td>{{ Str::upper($annual->status) }}</td>
                                    <td>
                                        <form onsubmit="return confirm('{{ __('admincp.areyousure') }}');"
                                            action="{{ route('reports.destroy', $annual->id) }}" method="POST">
                                            <a href="" data-bs-toggle="modal" data-bs-target="#edit{{ $annual->id }}"
                                                class="btn btn-md btn-primary"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-md btn-danger"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="edit{{ $annual->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit
                                                        Report</h5>
                                                    <button type="button" class="btn-close text-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('reports.update', $annual->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="mb-3">
                                                                    <img id="imgPreview"
                                                                        src="/storage/{{ $annual->image }}"
                                                                        alt="preview image" class="img-fluid">
                                                                </div>
                                                            </div>
                                                            <div class="col-8">
                                                                <div class="mb-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon1"><i class="fa fa-pencil"
                                                                                aria-hidden="true"></i></span>
                                                                        <input type="text"
                                                                            class="form-control @error('name') is-invalid @enderror"
                                                                            name="title" value="{{ $annual->title }}">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon1"><i class="fa fa-list"
                                                                                aria-hidden="true"></i></span>
                                                                        <select
                                                                            class="form-select  @error('id_category') is-invalid @enderror"
                                                                            name="category">
                                                                            <option value="{{ $annual->category }}">
                                                                                {{ $annual->category }}
                                                                            </option>
                                                                            <option value="Annual Report">Annual
                                                                                Report
                                                                            </option>
                                                                            <option value="Financial Report">
                                                                                Financial
                                                                                Report</option>
                                                                            <option value="Public Offering Prospectus">
                                                                                Public Offering Prospectus
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon1"><i class="fa fa-eye"
                                                                                aria-hidden="true"></i></span>
                                                                        <select
                                                                            class="form-select  @error('status') is-invalid @enderror"
                                                                            name="status">
                                                                            <option value="{{ $annual->status }}">
                                                                                {{ Str::upper($annual->status) }}
                                                                            </option>
                                                                            <option value="Publish">Publish
                                                                            </option>
                                                                            <option value="Draf">Draf</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon1"><i class="fa fa-calendar"
                                                                                aria-hidden="true"></i></span>
                                                                        <input type="date"
                                                                            class="form-control @error('gmt_date') is-invalid @enderror"
                                                                            name="datepublish"
                                                                            value="{{ $annual->datepublish }}"
                                                                            aria-describedby="helpId">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label fw-bold"
                                                                        for="inputEmail4">File
                                                                        PDF
                                                                    </label>
                                                                    <div class="mb-3">
                                                                        <input type="file" class="form-control"
                                                                            name="files" id="inputGroupFile01">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label fw-2 fw-bold">Cover
                                                                        IMAGE</label>
                                                                    <input type="file"
                                                                        class="form-control @error('images') is-invalid @enderror"
                                                                        name="images" id="images">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                        <button type="button" class="btn btn-dark text-white"
                                                    data-bs-dismiss="modal" aria-label="Close">Close</button>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                    </div>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <h3 class="mb-3 mt-5">Financial Reports</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark text-white fw-bold">
                            <tr>
                                <th>NO</th>
                                <th>TITLE</th>
                                <th>DATE PUBLISH</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts->where('category', 'Financial Report') as $financial)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $financial->title }}</td>
                                <td>{{ $financial->datepublish }}</td>
                                <td>{{ Str::upper($financial->status) }}</td>
                                <td>
                                    <form onsubmit="return confirm('{{ __('admincp.areyousure') }}');"
                                        action="{{ route('posts.destroy', $financial->id) }}" method="POST">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#edit{{ $financial->id }}"
                                            class="btn btn-md btn-primary"><i class="fa fa-pencil"
                                                aria-hidden="true"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-md btn-danger"><i class="fa fa-trash"
                                                aria-hidden="true"></i></i></button>
                                    </form>
                                </td>
                                <!-- Modal -->
                                <div class="modal fade" id="edit{{ $financial->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header bg-dark text-white">
                                                <h5 class="modal-title text-white" id="exampleModalLabel">Edit
                                                    Report</h5>
                                                <button type="button" class="btn-close text-white"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('reports.update', $financial->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="mb-3">
                                                                <img id="imgPreview"
                                                                    src="/storage/{{ $financial->image }}"
                                                                    alt="preview image" class="img-fluid">
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="mb-3">
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="basic-addon1"><i
                                                                            class="fa fa-pencil"
                                                                            aria-hidden="true"></i></span>
                                                                    <input type="text"
                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                        name="title" value="{{ $financial->title }}">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="basic-addon1"><i
                                                                            class="fa fa-list"
                                                                            aria-hidden="true"></i></span>
                                                                    <select
                                                                        class="form-select  @error('id_category') is-invalid @enderror"
                                                                        name="category">
                                                                        <option value="{{ $financial->category }}">
                                                                            {{ $financial->category }}
                                                                        </option>
                                                                        <option value="Financial Report">
                                                                            Financial
                                                                            Report</option>
                                                                        <option value="Annual Report">Annual
                                                                            Report
                                                                        </option>
                                                                        <option value="Public Offering Prospectus">
                                                                            Public Offering Prospectus
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="basic-addon1"><i
                                                                            class="fa fa-eye"
                                                                            aria-hidden="true"></i></span>
                                                                    <select
                                                                        class="form-select  @error('status') is-invalid @enderror"
                                                                        name="status">
                                                                        <option value="{{ $financial->status }}">
                                                                            {{ Str::upper($financial->status) }}
                                                                        </option>
                                                                        <option value="Publish">Publish
                                                                        </option>
                                                                        <option value="Draf">Draf</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="basic-addon1"><i
                                                                            class="fa fa-calendar"
                                                                            aria-hidden="true"></i></span>
                                                                    <input type="date"
                                                                        class="form-control @error('gmt_date') is-invalid @enderror"
                                                                        name="datepublish"
                                                                        value="{{ $financial->datepublish }}"
                                                                        aria-describedby="helpId">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label fw-bold" for="inputEmail4">File
                                                                    PDF
                                                                </label>
                                                                <div class="mb-3">
                                                                    <input type="file" class="form-control" name="files"
                                                                        id="inputGroupFile01">
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label class="form-label fw-2 fw-bold">Cover
                                                                    IMAGE</label>
                                                                <input type="file"
                                                                    class="form-control @error('images') is-invalid @enderror"
                                                                    name="images" id="images">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                    <button type="button" class="btn btn-dark text-white"
                                                    data-bs-dismiss="modal" aria-label="Close">Close</button>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                </div>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
            <h3 class="mb-3 mt-5">Public Offering Prospectus</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-dark text-white fw-bold">
                        <tr>
                            <th>NO</th>
                            <th>TITLE</th>
                            <th>DATE PUBLISH</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts->where('category', 'Public Offering Prospectus') as $offering)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $offering->title }}</td>
                            <td>{{ $offering->datepublish }}</td>
                            <td>{{ $offering->status }}</td>
                            <td>
                                <form onsubmit="return confirm('{{ __('admincp.areyousure') }}');"
                                    action="{{ route('posts.destroy', $offering->id) }}" method="POST">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#edit{{ $offering->id }}"
                                        class="btn btn-md btn-primary"><i class="fa fa-pencil"
                                            aria-hidden="true"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-md btn-danger"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </form>
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="edit{{ $offering->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header bg-dark">
                                            <h5 class="modal-title text-white" id="exampleModalLabel">Edit
                                                Category</h5>
                                            <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('reports.update', $offering->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="mb-3">
                                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/NO-Image-Placeholder.svg/1665px-NO-Image-Placeholder.svg.png"
                                                                class="img-fluid">
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="inputEmail4">Title
                                                            </label>
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                name="name" value="{{ $offering->title }}">
                                                        </div>
                                                        @error('name')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                        <div class="mb-3">
                                                            <div class="input-group">
                                                                <span class="input-group-text"
                                                                    id="basic-addon1">Type</span>
                                                                <select
                                                                    class="form-select  @error('id_category') is-invalid @enderror"
                                                                    name="category">
                                                                    <option value="{{ $offering->category }}">
                                                                        {{ $offering->category }}
                                                                    </option>
                                                                    <option value="Annual Report">Annual Report
                                                                    </option>
                                                                    <option value="Financial Report">Financial
                                                                        Report</option>
                                                                    <option value="Public Offering Prospectus">
                                                                        Public
                                                                        Offering Prospectus
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="input-group">
                                                                <span class="input-group-text"
                                                                    id="basic-addon1">Date</span>
                                                                <input type="date"
                                                                    class="form-control @error('gmt_date') is-invalid @enderror"
                                                                    name="datepublish"
                                                                    value="{{ $financial->datepublish }}"
                                                                    aria-describedby="helpId">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="inputEmail4">File PDF
                                                            </label>
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $financial->pdf }}"
                                                                    aria-label="Text input with checkbox" readonly>
                                                                <button class="btn btn-outline-secondary" type="button"
                                                                    id="button-addon2">X</button>
                                                            </div>
                                                            <div class="mb-3">
                                                                <input type="file" class="form-control" name="files"
                                                                    id="inputGroupFile01">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                <button type="button" class="btn btn-dark text-white"
                                                    data-bs-dismiss="modal" aria-label="Close">Close</button>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
            </div>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
