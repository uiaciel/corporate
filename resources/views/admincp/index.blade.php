<!-- landingpages/create.blade.php -->

@extends('layouts.admincp')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="p-5 mb-4 rounded-3">
            <div class="container-fluid py-5">
              <h1 class="display-5 fw-bold">Welcome {{ Auth::user()->name }},</h1>
              <p class="col-md-8 fs-4"> {{ $setting->sitename }}</p>


              {{-- <button class="btn btn-primary btn-lg" type="button">Backup Website</button> --}}
            </div>
          </div>

        </div>
        {{-- <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <img src="https://dummyimage.com/180x120/dbdbdb/787878.png&text=Image+cap" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div> --}}
      </div>

    </div>


@endsection
