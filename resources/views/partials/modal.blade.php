<div id="modal-overlay" class="modal-overlay" style="display: none;">
    <div id="buy-tickets-modal" class="modal">
        <div class="mb-4">
            <span class="fs-2 close-modal" id="close-modal">&times;</span>
            <h2 class="">Buy Tickets</h2>
        </div>
        <form action="{{ route('purchase') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">Enter Name</label>
                <input id="name" class="form-control" name="name" type="text" value="{{ old('name') }}">
                @error('name')
                    <small class="danger-message text-danger mt-1">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="email">Enter Email (Optional)</label>
                <input id="email" class="form-control" name="email" type="text" value="{{ old('email') }}">
                @error('email')
                    <small class="danger-message text-danger mt-1">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="phoneNumber">Enter Phone Number</label>
                <input id="phoneNumber" class="form-control" name="phoneNumber" type="text" value="{{ old('phoneNumber') }}">
                @error('phoneNumber')
                    <small class="danger-message text-danger mt-1">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Enter Tickets Quantity</label>
                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <input id="adult-ticket-checkbox" class="form-check-input mt-0" type="checkbox" name="tickets[adult]" @checked(old('tickets.adult'))>
                        <label class="form-label ms-2 mb-0" for="adult-ticket-checkbox">Adult</label>
                    </div>
                    <input type="number" class="form-control" name="quantities[adult]" value="{{ old('quantities.adult') }}">
                    @error('quantities.adult')
                        <small class="text-danger mt-1">{{ $message }}</small>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <input id="kids-ticket-checkbox" class="form-check-input mt-0" type="checkbox" name="tickets[kids]" @checked(old('tickets.kids'))>
                        <label class="form-label ms-2 mb-0" for="kids-ticket-checkbox">Kids</label>
                    </div>
                    <input type="number" class="form-control" name="quantities[kids]" value="{{ old('quantities.kids') }}">
                    @error('quantities.kids')
                        <small class="text-danger mt-1">{{ $message }}</small>
                    @enderror
                </div>

                <div class="input-group">
                    <div class="input-group-text">
                        <input id="educators-ticket-checkbox" class="form-check-input mt-0" type="checkbox" name="tickets[educators]" @checked(old('tickets.educators'))>
                        <label class="form-label ms-2 mb-0" for="educators-ticket-checkbox">Educators</label>
                    </div>
                    <input type="number" class="form-control" name="quantities[educators]" value="{{ old('quantities.educators') }}">
                    @error('quantities.educators')
                        <small class="text-danger mt-1">{{ $message }}</small>
                    @enderror
                </div>
                @error('tickets')
                    <small class="text-danger mt-1">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Enter Date</label>
                <input class="form-control" name="date" type="date" value="{{ old('date') }}">
                @error('date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button class="modal-button collapse-button" type="button" data-bs-toggle="collapse" data-bs-target="#table-collapse">
                Show Hours of Operations
            </button>
            <div class="collapse" id="table-collapse">
                <div class="table-wrapper">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Day</th>
                                <th scope="col">Hours</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (HOURS_OF_OPERATIONS as $day => $hour)
                                <tr>
                                    <td>{{ $day }}</td>
                                    <td>{{ $hour }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <button class="modal-button mt-4" type="submit">Buy Tickets</button>
        </form>
    </div>
</div>

@push('scripts')
    @if(session('openModal'))
        <script>
            $(document).ready(function() {
                $("#modal-overlay, #buy-tickets-modal").show();
            });
        </script>
    @endif
@endpush
