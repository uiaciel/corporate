@extends('layouts.admincp')
@section('content')
<div class="container-fluid p-0">
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Messages</h1>
    </div>

    <div class="card">
        <div class="row g-0">
            <div class="col-12 col-lg-5 col-xl-3 border-end list-group">

                @include('admincp.contacts.list')

                



                <hr class="d-block d-lg-none mt-1 mb-0">
            </div>

        </div>
    </div>
</div>
@endsection
