<!-- pages/index.blade.php -->

@extends('layouts.admincp')

@section('content')
    <div class="container-fluid p-0">
    <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Pages</strong> <a href="{{ route('pages.create') }}"
                        class="btn btn-sm btn-primary">Add New</a> </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mt-3" id="data">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>

                                        <th>Date Publish</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pages as $index => $page)
                                        <tr>
                                            <td scope="row">{{ $index + 1 }}</td>
                                            <td><a href="/{{ $page->slug_id }}" class="text-decoration-none" target="_blank">{{ $page->title_id }}</a>
                                                <p class="mt-2"><small class="fw-bold">English : <a href="/{{ $page->slug_en }}" target="_blank"> {{ $page->title_en }}</a></small></p>
                                            </td>
                                            <td>
                                                {{ $page->tanggal() }}
                                            </td>
                                            <td>{{ $page->category }}</td>

                                            <td>{{ Str::upper($page->status) }}</td>
                                            <td class="text-end">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('pages.edit', $page->id) }}"
                                                        class="btn btn-md btn-primary">Edit</a>
                                                    <form action="{{ route('pages.destroy', $page->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this page?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-md btn-danger">Delete</button>
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

    </div>
@endsection
