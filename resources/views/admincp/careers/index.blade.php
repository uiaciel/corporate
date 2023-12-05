<!-- careers/index.blade.php -->

@extends('layouts.admincp')

@section('content')
    <div class="container">
        <h2>Pages</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title (ID)</th>
                    <th>Slug (ID)</th>
                    <th>Content</th>
                    <th>Excerpt</th>
                    <th>Date Publish</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($careers as $career)
                    <tr>
                        <td>{{ $career->id }}</td>
                        <td>{{ $career->title }}</td>
                        <td>{{ $career->slug }}</td>
                        <td>{{ $career->content }}</td>
                        <td>{{ $career->excerpt }}</td>
                        <td>{{ $career->datepublish }}</td>
                        <td>{{ $career->status }}</td>
                        <td>
                            <a href="{{ route('careers.edit', $career->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('careers.destroy', $career->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                            </form>                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete(careerId) {
            if (confirm('Are you sure you want to delete this career?')) {
                window.location.href = '/careers/delete/' + careerId;
            }
        }
    </script>
@endsection
