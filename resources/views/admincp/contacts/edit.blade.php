@extends('layouts.admincp')
@section('content')
<div class="container-fluid p-0">

    <div class="mb-3">
        <a type="button" href="{{ route('contacts.index') }}" class="btn btn-dark"><span
                class="fa fa-arrow-left"></span></a>

        <h1 class="h3 d-inline align-middle">Inbox Messages</h1></a>
    </div>

    <div class="card">
        <div class="row g-0">
            <div class="col-12 col-lg-5 col-xl-3 border-end list-group">



                @include('admincp.contacts.list')



                <hr class="d-block d-lg-none mt-1 mb-0">
            </div>
            <div class="col-12 col-lg-7 col-xl-9">
                <div class="py-2 px-4 border-bottom d-none d-lg-block">
                    <div class="d-flex align-items-center py-1">
                        <div class="position-relative">
                            <img src="https://placehold.co/600x400?text={{ ucfirst($contact->sender) }}"
                                class="rounded-circle me-1" alt="Sharon Lessman" width="40" height="40">
                        </div>
                        <div class="flex-grow-1 ps-3">
                            <strong>{{ $contact->sender }}</strong>
                            <div class="text-muted small"><em>{{ $contact->email }}</em></div>
                        </div>
                        <div>
                            {{-- <button class="btn btn-primary btn-lg me-1 px-3"><i class="fa fa-paper-plane"
                                    aria-hidden="true"></i></button> --}}

                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">

                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-lg me-1 px-3 d-none d-md-inline-block" type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteform{{ $contact->id }}">
                                    <i class="fa fa-trash" aria-hidden="true"></i></button>


                                <div class="modal fade" id="deleteform{{ $contact->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId">
                                                    <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                                    Are your sure delete this Inbox ?
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                           
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    CANCEL
                                                </button>
                                                <button type="submit" class="btn btn-danger">DELETE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>

                <div class="position-relative">
                    <div class="chat-messages p-4">

                        <div class="chat-message-left pb-4">

                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ms-3">
                                <div class="font-weight-bold mb-1 fw-bold">Subject : {{ $contact->subject }}</div>
                                {{ $contact->message }}
                                <br />
                                <div class="text-muted small text-nowrap mt-4">{{ $contact->created_at }}</div>

                            </div>

                        </div>

                    </div>
                </div>

                {{-- <div class="flex-grow-0 py-3 px-4 border-top">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Type your message">
                        <button class="btn btn-primary">Send</button>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
</div>
@endsection