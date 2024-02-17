@if ($errors->any())
<div class="alert alert-danger alert-outline-coloured alert-dismissible" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <div class="alert-message">
        <p><strong class="text-danger">Opps Error!</strong> Please Check Field below</p>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </div>
</div>
@endif
