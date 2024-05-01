<!-- landingpages/create.blade.php -->

@extends('layouts.admincp')

@section('content')
    <div class="container">

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
              <h1 class="display-5 fw-bold">Welcome {{ Auth::user()->name }},</h1>
              <p class="col-md-8 fs-4"> {{ $setting->sitename }}</p>


              <button class="btn btn-primary btn-lg" type="button">Backup Website</button>
            </div>
          </div>

    </div>


@endsection
