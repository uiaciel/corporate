@extends('layouts.admincp')
@section('content')
<div class="container-fluid p-0">
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Messages</h1>
    </div>

    <div class="card">
        <div class="row g-0">
            <div class="col-12 col-lg-5 col-xl-3 border-end list-group">

                <div class="px-4 d-none d-md-block">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <input type="text" class="form-control my-3" placeholder="Search...">
                        </div>
                    </div>
                </div>

                @foreach ($contacts as $contactx )
                <a href="#" class="list-group-item list-group-item-action border-0">
                    {{-- <div class="badge bg-success float-end">5</div> --}}
                    <div class="d-flex align-items-start">
                        <img src="https://placehold.co/600x400?text={{ ucfirst($contactx->sender) }}" class="rounded-circle me-1" alt="Vanessa Tucker" width="40" height="40">
                        <div class="flex-grow-1 ms-3">
                            {{ $contactx->email }}
                            <div class="small"><span class="fas fa-circle chat-online"></span> {{ $contactx->status }}</div>
                        </div>
                    </div>
                </a>
                @endforeach



                <hr class="d-block d-lg-none mt-1 mb-0">
            </div>

        </div>
    </div>
</div>
@endsection
