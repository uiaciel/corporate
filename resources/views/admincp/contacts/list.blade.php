@foreach ($contacts as $contactx )
                <a href="{{ route('contacts.edit', $contactx->id) }}" class="list-group-item list-group-item-action border-0">
                    {{-- <div class="badge bg-success float-end">5</div> --}}
                    <div class="d-flex align-items-start">
                        <img src="https://placehold.co/600x400?text={{ substr($contactx->sender, 0, 1) }}" class="rounded-circle me-1" alt="Vanessa Tucker" width="40" height="40">
                        <div class="flex-grow-1 ms-3">
                            {{ $contactx->email }}
                            <div class="small"><span class="fa fa-calendar"></span> {{ $contactx->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                </a>
                @endforeach