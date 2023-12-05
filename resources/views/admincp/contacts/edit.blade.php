@extends('layouts.admincp')
@section('content')
<div class="container-fluid p-0">

    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Inbox Messages</h1></a>
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
                <a href="{{ route('contacts.edit', $contactx->id) }}" class="list-group-item list-group-item-action border-0">
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
            <div class="col-12 col-lg-7 col-xl-9">
                <div class="py-2 px-4 border-bottom d-none d-lg-block">
                    <div class="d-flex align-items-center py-1">
                        <div class="position-relative">
                            <img src="https://placehold.co/600x400?text={{ ucfirst($contact->sender) }}" class="rounded-circle me-1" alt="Sharon Lessman" width="40" height="40">
                        </div>
                        <div class="flex-grow-1 ps-3">
                            <strong>{{ $contact->sender }}</strong>
                            <div class="text-muted small"><em>{{ $contact->status }}</em></div>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-lg me-1 px-3"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            <button class="btn btn-danger btn-lg me-1 px-3 d-none d-md-inline-block"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>

                <div class="position-relative">
                    <div class="chat-messages p-4">

                        <div class="chat-message-left pb-4">

                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ms-3">
                                <div class="font-weight-bold mb-1 fw-bold">Subject : {{ $contact->subject }}</div>
                                {{ $contact->message }}
                                <br/>
                                <div class="text-muted small text-nowrap mt-4">{{ $contact->created_at }}</div>

                            </div>

                        </div>

                    </div>
                </div>

                <div class="flex-grow-0 py-3 px-4 border-top">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Type your message">
                        <button class="btn btn-primary">Send</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
