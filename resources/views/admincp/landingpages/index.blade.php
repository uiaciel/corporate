<!-- landingpages/index.blade.php -->

@extends('layouts.admincp')

@section('content')
    <div class="container">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Navigation</strong> </h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                {{-- <a href="#" class="btn btn-light bg-white me-2">Invite a Friend</a> --}}
                <a href="{{ route('landingpages.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-hovered table-bordered">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>ID</th>
                            <th>Key</th>
        
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($landingpages as $landingpage)
                            <tr>
                                <td>{{ $landingpage->id }}</td>
                                <td>{{ $landingpage->key }}</td>
        
                                <td>{{ $landingpage->slug }}</td>
                                <td>{{ $landingpage->status }}</td>
                                <td>
        
                                    <div class="input-group mb-3">
                                        <a href="{{ route('landingpages.edit', $landingpage->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('landingpages.destroy', $landingpage->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
        
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                                        </form>
                                    </div>
        
        
        
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

       
    </div>

    @endsection
