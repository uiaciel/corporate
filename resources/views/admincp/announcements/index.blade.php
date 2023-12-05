@extends('layouts.admincp')
@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Announcements</strong> </h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                {{-- <a href="#" class="btn btn-light bg-white me-2">Invite a Friend</a> --}}
                <a href="{{ route('announcements.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</a>
            </div>
        </div>

        <div class="row">
            <div class="row">
                @foreach ($announcements as $announcement)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-header px-4 pt-4">
                            <div class="card-actions float-end">
                                <div class="dropdown position-relative">
                                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="/announcement/{{ $announcement->slug }}">View</a>
                                        <a class="dropdown-item" href="{{ route('announcements.edit', $announcement->id) }}">Edit</a>
                                        <form onsubmit="return confirm('{{ __('admincp.areyousure') }}');"
                                                        action="{{ route('announcements.destroy', $announcement->id) }}" method="POST">

                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="dropdown-item">DELETE</button>


                                                    </form>
                                        {{-- <a class="dropdown-item" href="#">Delete</a> --}}
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title mb-0">{{ $announcement->title }}</h5>
                            <div class="badge bg-success my-2">{{ $announcement->status }}</div>
                        </div>
                        <img class="card-img-top" src="/storage/{{ $announcement->image }}" alt="Unsplash">

                        <div class="card-body px-4 pt-2">
                            <span>{{ $announcement->tanggal() }}</span>
                        </div>

                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        List Announcements
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Homepage</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($announcements as $index => $posts)
                                    <tr>
                                        <td scope="row">{{ $index + 1 }}</td>
                                        <td>{{ $posts->title }}</td>
                                        <td><span class="badge text-bg-primary">Yes</span>
                                        </td>
                                        <td>{{ Str::upper($posts->status) }}</td>
                                        <td>

                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('announcements.edit', $posts->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>

                                                <a href="/announcement/{{ $posts->slug }}"
                                                        class="btn btn-sm btn-success">VIEW</a>
                                                    <form onsubmit="return confirm('{{ __('admincp.areyousure') }}');"
                                                        action="{{ route('announcements.destroy', $posts->id) }}" method="POST">

                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger">DELETE</button>


                                                    </form>
                                            </div>




                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Post belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
